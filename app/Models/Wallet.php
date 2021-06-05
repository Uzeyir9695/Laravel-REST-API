<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'currency_id', 'amount', 'name', 'mastercard', 'active'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function currency() 
    {
        return $this->belongsTo(Currency::class);
    }

    public function exchange() 
    {
        return $this->hasMany(Exchange::class);
    }

    public function amount() 
    {
        return $this->hasMany(Amount::class);
    }
}
