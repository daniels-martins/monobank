<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      // dd('ddl');
      // return view('admin.profile');
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
   public function store(Request $request)
   {
      //
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
   public function edit()
   {

      return view('admin.profile.edit');
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
      // return 'update this user profile';
      // foreach ($request->all() as $key => $val) {
      // }
      $userFormData = $request->except('_token', '_method', 'email');
      // dd($userFormData);
      // update the user profile using fresh data
      // if (is_null(auth()->user()->profile()))
      //    auth()->user()->profile()->create([]);
      // dd(auth()->user());
      auth()->user()->profile->nok_name = $userFormData['nok_name'];
      auth()->user()->profile->save();
      // dd(auth()->user()->profile->nok_name);
      if (auth()->user()->profile()->update($userFormData))
         return back()->with('success', 'Profile updated');
      return back()->with('error', 'Profile update failed');
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
