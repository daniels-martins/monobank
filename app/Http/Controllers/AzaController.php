<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Aza;

use App\Models\AzaType;
use App\Models\Profile;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnSelf;

class AzaController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return (request()->caller == 'xxx-admin') ? view('admin.xxxadmin.accounts.index') : view('admin.accounts.index');
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $aza_types = AzaType::all();
      return view('admin.accounts.create', compact('aza_types'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      /*
        |--------------------------------------------------------------------------
        |  Lara validation
        |--------------------------------------------------------------------------
        */

      $request->validate(
         // Rules
         ['aza_type' => 'required'],
         // messages
         [
            'aza_type.required' => 'No Account Type was specified'
         ]
      );

      /*
        |--------------------------------------------------------------------------
        |  Manual validation
        |--------------------------------------------------------------------------
        |
        | no user should have multiple accounts of same type
        |
        */

      //wtep1 :  obtain the account_type_id from the account_type field given in the request
      $aza_typeName = AzaType::find($request->aza_type)->name;
      // dd('storemethodz'); //breakpoint

      // step2: check for duplicates 

      // for old members
      if (auth()->user()) {
         $user_has_account_type = Auth::user()->azas()->where('aza_type_id', $request->aza_type)->first();
         if ($user_has_account_type)
            return back()->with('danger', 'Error! User already has a ' . ucfirst($aza_typeName) . ' account');
      } else {
         $user_has_account_type = $request->user->azas()->where('aza_type_id', $request->aza_type)->first();
         if ($user_has_account_type)
            return back()->with('danger', 'Error! User already has a ' . ucfirst($aza_typeName) . ' account');
      }


      /*
        |--------------------------------------------------------------------------
        |  Account Creation Process
        |--------------------------------------------------------------------------
        | No user should have multiple accounts of same type
        */
      // step 1: generate aza num. 
      $fresh_aza_no = self::generateAzaNum();


      // step 2:profile info is from the user, hence link a profile to authUser
      // breakpoint
      // for old members
      if (auth()->user()) {
         $user_profile_link_created = auth()->user()->profile()->create([
            'fname' => auth()->user()->name,
            'user_email' => auth()->user()->email
         ]);
      }
      // for new members
      else {
         $user_profile_link_created = $request->user->profile()->create([
            'fname' => $request->user->name,
            'user_email' => $request->user->email
         ]);
      }
      // breakpoint

      //step 3: link a user to the new aza
      // NB: balance and status have default values from the db

      if ($user_profile_link_created) {
         $new_aza = auth()->user() ?
            auth()->user()->azas()->create(['num' => $fresh_aza_no, 'aza_type_id' => $request->aza_type])
            : $request->user->azas()->create(['num' => $fresh_aza_no, 'aza_type_id' => $request->aza_type]);

         return $new_aza
            ?  back()->with('success', $new_aza->getType() . ' Account Created Successfully')
            :  back()->with('danger', 'Oops! Please Try Again...');
      } else {
         return back()->with('danger', 'Error! User Profile could not be Created..');
      }
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Aza  $aza
    * @return \Illuminate\Http\Response
    */
   public function show(Aza $account)
   {
      $aza = $account;

      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Aza  $aza
    * @return \Illuminate\Http\Response
    */
   public function edit(Aza $account)
   {
      $aza = $account;
      $azaStatus = ['active' => 'active', 'inactive' => 'inactive', 'on hold' => 'held', 'suspended' => 'suspended'];
      return view('admin.accounts.edit', compact('aza', 'azaStatus'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Aza  $aza
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Aza $account)
   {
      $aza = $account;
      // we're only allowed to edit d status of an account,hence we extract only the status
      if ($updated = $aza->update(['status' => ($request->status ?? $aza->status), 'is_blocked' => ($request->is_blocked ?? $aza->is_blocked)]))
         return ($aza->wasChanged(['status', 'is_blocked']))
            ? back()->with('success', "Account Updated Successfully")
            : back()->with('warning', 'Oops! Something went wrong. Please Try again');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Aza  $aza
    * @return \Illuminate\Http\Response
    */
   public function destroy(Aza $account)
   {
      $aza = $account;

      if ($aza->balance <= 0) {
         return ($deleted  = $aza->delete())
            ? back()->with('success', "$aza->num deleted Successfully")
            : back()->with('warning', 'Oops! Something went wrong. Please Try again');
      } else {
         back()->with('warning', 'Oops! Account Removal Failed : Account has funds in it');
      }
   }




   // Helpers
   public static function generateAzaNum(): string
   {
      $first_number = rand(0, 2);
      $other_9_digits = rand(111111111, 999999999);
      return $aza_num = $first_number . $other_9_digits;
   }










   // ====================================================================================

   /**
    * View the profile for this account.
    *
    * @param  \App\Models\Aza  $aza
    * @return \Illuminate\Http\Response
    */
   public function profile(Aza $aza, Request $request)
   {
   }



   /**
    * Update the profile for this account.
    *
    * @param  \App\Models\Aza  $aza
    * @return \Illuminate\Http\Response
    */
   public function profile_update(Aza $aza, Request $request)
   {
   }
}
