<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{

   public function edit(Request $request)
   {
      // dd('ddd');
      return view('admin.password.edit');
   }


   public function update(Request $request)
   {
      // dd(request()->all());
      $request->validate([
         'current_password' => ['required', 'current_password'],
         'password' => ['required', 'confirmed', Password::min(8)],
      ]);
      auth()->user()->password = Hash::make($request->password);

      return auth()->user()->save()
         ? back()->with('success', 'Password Changed Successfully')
         : back()->with('danger', 'Error... Operation Failed');
      // dd(request()->all());
   }
}
