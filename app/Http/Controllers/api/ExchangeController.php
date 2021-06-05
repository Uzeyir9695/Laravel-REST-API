<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExchangeRequest;
use App\Models\Amount;
use App\Models\Currency;
use App\Models\Exchange;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ExchangeController extends Controller
{
    public function exchange(ExchangeRequest $request, Wallet $wallet)
    {   //dd($request->all());
        // Check if the MasterCard is valid 
        if( !in_array($request->mastercard, Wallet::select('mastercard')->pluck('mastercard')->all()) ){
            return response()->json(['Error', 'Invalid MasterCard!'], 404 );
        }
        // Get IDs
        $user_id = $wallet->where('mastercard', $request->mastercard)->value('user_id');
        $sentTo = User::findOrFail($user_id)->name;
        $wallet_id = $wallet->where('mastercard', $request->mastercard)->where('active', 1)->value('id');
        $currency_id = $wallet->where('mastercard', $request->mastercard)->value('currency_id');
        $currency = Currency::findOrFail($currency_id)->currency;

        // Check if the wallet is an active
        $is_active = $wallet->where('mastercard', $request->mastercard)->value('active') !== 1;
        if( $is_active ){
            return response()->json(['Error', 'Wallet is not an active!'], 451);
        }

        // Check if the user has wallet with this currency
        $has_currency = $wallet->find($wallet_id)->currency->currency == $request->currency;
        if( !$has_currency ){
            return response()->json(['Error', 'No such a currency for this MasterCard!'], 404);
        }

        // Check if the user sends amount to him/herself or another
        $is_self = $user_id  == auth('api')->user()->id;
        $amount = $request->amount;
        // Commission after exchange
        if( !$is_self ) {
            $commission = $amount * 1 / 100;
            $wallet->where('mastercard', $request->mastercard)->decrement('amount', $commission);
        }

        Exchange::create([
            'user_id' => $user_id,
            'wallet_id' => $wallet_id,
            'currency' => $request->currency,
            'amount' => $request->amount,
            'mastercard' => $request->mastercard
        ]);

        Transaction::create([
            'currency' => $currency,
            'sentBy' =>  auth('api')->user()->name, 
            'sentTo' => $sentTo,
            'sentOn' => Carbon::now(),
            'status' => 'confirmed',
        ]);
    
        $wallet->where('mastercard', $request->mastercard)->increment('amount', $request->amount);

        return response()->json(['Success', 'Amount sent Successfully!'], 200 );

        
        
    }
}
