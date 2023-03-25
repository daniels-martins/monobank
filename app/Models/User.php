<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // relationships

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
    
    public function azas()
    {
        return $this->hasMany(Aza::class);
    }
    
    public function profile()
    {
        return $this->hasOne(Profile::class);
        // return $this->hasOne(Profile::class, 'email', 'email');
    }
    
    public function trx()
    {
        return $this->hasMany(Trx::class);
    }


   //  helpers

   /**
    * Returns the savings account balance
    */
   public function azaBalSavings()
   {
      // aza_type_id = 1 signifies savings account
      $savingsBalance  = $this->azas()->where('aza_type_id', 1)->first()->balance;
      return number_format($savingsBalance);
   }
}
