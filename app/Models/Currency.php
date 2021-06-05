<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $fillable = ['currency', 'user_id'];
    
    public function wallet() {
        return $this->hasOne(Wallet::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
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
