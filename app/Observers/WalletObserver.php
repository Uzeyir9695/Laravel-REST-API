<?php

namespace App\Observers;

use App\Jobs\Mailjob;
use App\Models\Wallet;
use Illuminate\Support\Facades\Log;

class WalletObserver
{
    /**
     * Handle the Wallet "created" event.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return void
     */
    public function creating(Wallet $wallet)
    {
        
        Log::info('Wallet is creating'. ' '.$wallet->name);

    }
    public function created(Wallet $wallet)
    { 
        Log::info('Wallet is created'. ' '. $wallet->name);
    }

    /**
     * Handle the Wallet "updated" event.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return void
     */
    public function updated(Wallet $wallet)
    {
        //
    }

    /**
     * Handle the Wallet "deleted" event.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return void
     */
    public function deleted(Wallet $wallet)
    {
        //
    }

    /**
     * Handle the Wallet "restored" event.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return void
     */
    public function restoring(Wallet $wallet)
    {
        //
    }
    public function restored(Wallet $wallet)
    {
        
    }

    /**
     * Handle the Wallet "force deleted" event.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return void
     */
    public function forceDeleted(Wallet $wallet)
    {
        // midi aba gateste
    }
}

