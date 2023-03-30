<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


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

   /**
    * only for viewing the list of all transactions (debit or credit) for the authUser
    */
   public function trx()
   {
      // return $this->hasMany(Payment::class, 'sender_id', 'id');
      return Payment::where('sender_id', $this->id)->orWhere('receiver_id', $this->id)->get();
      // return Payment::where('sender_id', $this->id)->orWhere('receiver_id', $this->id)->sum('amount');
   }

      /**
    * only for viewing the list of all transactions (debit or credit) for the authUser
    */
    public function trxQuery()
    {
       // return $this->hasMany(Payment::class, 'sender_id', 'id');
       return Payment::where('sender_id', $this->id)->orWhere('receiver_id', $this->id);
       // return Payment::where('sender_id', $this->id)->orWhere('receiver_id', $this->id)->sum('amount');
    }

  /**
    * returns the model collection of debit transactions for a given period of time, when time is not specified, 
    * it returns the alltime collection of debit transactions
    */
   public function trxAsSender()
   {
      return $this->hasMany(Payment::class, 'sender_id', 'id');
   }

   /**
    * returns the model collection of credit transactions for a given period of time, when time is not specified, 
    * it returns the alltime collection of credit transactions
    */
   public function trxAsReceiver()
   {
      return $this->hasMany(Payment::class, 'receiver_id', 'id');
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


   /**
    * returns the total credit transactions for a given period of time, when time is not specified, 
    * it returns the alltime value of total credit transactions
    */
   public function totalCredit($time = null)
   {
      if ($time) {
         return match ($time) {
            'today' => $this->trxAsReceiver()->where('type', 'credit')
               ->whereDate('created_at', Carbon::today())
               ->sum('amount'),
            'yesterday' => $this->trxAsReceiver()->where('type', 'credit')
               ->whereDate('created_at', Carbon::yesterday())
               ->sum('amount'),
         };
      } else {
         $sumOfCreditTrxForUser = $this->trxAsReceiver()->where('type', 'credit')->sum('amount');
         return number_format($sumOfCreditTrxForUser);
      }

      // confirmation
      // Payment::where('type', 'credit')->sum('amount')

   }

   /**
    * returns the total debit transactions for a given period of time, when time is not specified, 
    * it returns the alltime value of total debit transactions
    */
   public function totalDebit($time = null)
   {
      if ($time) {
         return match ($time) {
            'today' => $this->trxAsSender()->where('type', 'debit')
               ->whereDate('created_at', Carbon::today())
               ->sum('amount'),
            'yesterday' => $this->trxAsSender()->where('type', 'debit')
               ->whereDate('created_at', Carbon::yesterday())
               ->sum('amount'),
         };
      } else {
         $sumOfDebitTrxForUser = $this->trxAsSender()->where('type', 'debit')->sum('amount');
         return number_format($sumOfDebitTrxForUser);
      }
   }

   /**
    * returns the total transactions for a given period of time, when time is not specified, it returns the alltime value of total transactions
    */
   public function totalTrx($time = null)
   {
      return $this->totalCredit($time) + $this->totalDebit($time);
   }


   public function presentPhoto()
   {
      return str_replace('public', '/storage', $this->dp);
   }
}
