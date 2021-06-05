<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wallets() {
        return $this->hasMany(Wallet::class);
    }

    public function currency() {
        return $this->hasMany(Currency::class);
    }

    public function amount() 
    {
        return $this->hasMany(Amount::class);
    }
    
    public function exchange() 
    {
        return $this->hasMany(Exchange::class);
    }

    // For comment
    public function comments() {
  
        return $this->hasMany(Comment::class);
     
    }

    public function blog() {
  
        return $this->hasMany(Blog::class);
     
    }

    public function role()
    {
        return $this->belongsToMany(Role::class,  'role_user', 'user_id', 'role_id');
    }

}
