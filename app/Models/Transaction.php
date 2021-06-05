<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['currency', 'sentBy', 'sentTo', 'sentOn', 'status'];
    use HasFactory;
}
