<?php

namespace App\Http\Controllers;

use App\Mail\AcknowledgePotentialClient;
use App\Mail\ResumeContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResumeController extends Controller
{
   /**
    * Handle the incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function __invoke(Request $request)
   {
      $requestData = $request->all();
      // dd($requestData['fullname'], $requestData);
      try {
         // mail to developer
         Mail::to('meetdaniels@gmail.com')->send(new ResumeContactEmail($requestData));
         // mail to client
         Mail::to($requestData['email'])->send(new AcknowledgePotentialClient($requestData));
      } catch (\Throwable $th) {
         return 'Error! Email Could not be Sent Try again';
      }
      return 'Email sent successfully';
   }
}
