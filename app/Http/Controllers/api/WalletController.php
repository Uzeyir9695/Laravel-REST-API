<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\WalletResource;
use App\Models\Currency;
use App\Models\User;
use App\Models\Wallet;
use App\Http\Requests\WalletRequest;
use App\Models\Exchange;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WalletRequest $request, Wallet $wallet)
    {   
        $user_id = auth('api')->user()->id;
        $mastercard = in_array($request->mastercard, Wallet::select('mastercard')->pluck('mastercard')->all());
        $user =  User::findOrFail($user_id);
        $currencies = collect($user->currency)->pluck('currency');

        // Check if the user has wallet with this currency
        if( !in_array($request->currency, $currencies->all()) && !$mastercard ){
            $currency = Currency::create([
                'user_id' => $user_id,
                'currency' => Str::upper($request->currency),
            ]);
            // Sum up users amount and print total amount
            $currentAmount = Wallet::where('currency_id', $currency->id)->value('amount'); // Available amount
            $addedAmount = Exchange::where('currency', $request->currency)->value('amount'); // Added amount
            $totalAmount = $currentAmount + $addedAmount;

           $create =  $wallet->create([
                'user_id' => $user_id,
                'currency_id' => $currency->id,
                'amount' => $totalAmount,
                'name' => auth('api')->user()->name,
                'mastercard' => $request->mastercard,
                'active' => $request->active,
            ]);
            
            return response()->json(['Wallet Created Successfully!'], 200 );
            
        } else { 
            return response()->json(['Error', 'Invalid MasterCard or Currency!'], 406);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
