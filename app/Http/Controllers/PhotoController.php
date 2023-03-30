<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
   public function create()
   {
     return view('admin.photo.create');
   }


   public function store()
   {
      // dd('storephoot', request()->all());
      $reqfile = request()->file('user_photo');
      $path = $reqfile ->store('public/avatarz');

      // delete any old photos 
      if (Storage::exists(auth()->user()->dp)){
         Storage::delete(auth()->user()->dp);
      }
      
      request()->user()->dp = $path;
      if(request()->user()->save()) return back()->with('success', 'Operation Successful');
      // Storage::putFile('photos', new File($reqfile), 'public');


      // Storage::
   //   return view('admin.photo.create');

   }
}
