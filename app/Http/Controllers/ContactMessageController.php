<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      //   dd('list mesages');
      $contactMessages = ContactMessage::all();
      return view('admin.contactmessages.index', compact('contactMessages'));
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
      $request['phone'] = str_replace([' ', '(', ')'], '',$request->phone);//trim spaces and '()' from number
      return ContactMessage::create(request()->all()) ? back()->with('success', 'Message Sent') : back()->with('danger', 'Oops! Try again');
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\ContactMessage  $contactMessage
    * @return \Illuminate\Http\Response
    */
   public function show(ContactMessage $contactMessage)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\ContactMessage  $contactMessage
    * @return \Illuminate\Http\Response
    */
   public function edit(ContactMessage $contactMessage)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\ContactMessage  $contactMessage
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, ContactMessage $contactMessage)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\ContactMessage  $contactMessage
    * @return \Illuminate\Http\Response
    */
   public function destroy(ContactMessage $contactMessage)
   {
      $message = $contactMessage;

      return ($deleted  = $message->delete())
         ? back()->with('success', "message from $message->name deleted Successfully")
         : back()->with('warning', 'Oops! Something went wrong. Please Try again');
   }
}
