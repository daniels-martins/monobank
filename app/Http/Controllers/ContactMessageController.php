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
      return view('admin.contactmessages.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      // dd($request->all());
      $request['phone'] = str_replace([' ', '(', ')'], '', $request->phone); //trim spaces and '()' from number
      //use db compatible arrayKeys
      $request['type'] = ($request['formtype'] == 'suspension_form') ? 'suspension' : 'contact';
      $request['fullname'] = "{$request['fname']} {$request['lname']}";
      $request['acc_num'] = $request['acc_num'] ?? $request->user()->azas->first()->num;
      $request['subject'] = $request['subject'] ?? 'Contact message';
      
      // validation 
      $validated =  $request->validate([
         'type' => 'required',
         'fname' => 'required',
         'lname' => 'required',
         'fullname' => 'required',
         'email' => 'required',
         'phone' => 'required',
         'message' => 'required',
         'acc_num' => 'required',
         'subject' => 'required',
      ], [
         'fname.required' => 'The first name field is required',
         'lname.required' => 'The last name field is required',
         'acc_num.required' => 'The account number field is required',
      ]);
      // if ($request->type == 'suspension')
      return ContactMessage::create($validated)
         ? redirect()->route('sweet_alert') : back()->with('danger', 'Oops! Message was not sent... Try again');
      // return ContactMessage::create($validated) ? back()->with('success', 'Message Sent') : back()->with('danger', 'Oops! Try again');
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
      strstr()
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


   public function sweetAlert()
   {
      // dd('sweetie');
      return view('admin.sweet_alert.index');
   }
}
