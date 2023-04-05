<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
   /**
    * Handle the incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function __invoke(Request $request)
   {
      // Get the current time in US Central Time
      $now = Carbon::now('America/New_York');

      // Get the current hour
      $hour = $now->hour;

      $greeting = '';
      // Greet the user based on the current hour
      if ($hour >= 5 && $hour < 12) {
         //  'time : <br>' . $now . '<br>';
         $greeting = 'Good Morning,';
      } else if ($hour >= 12 && $hour < 18) {
         //  'time : <br>' . $now . '<br>';
         $greeting = 'Good Afternoon,';
      } else {
         //  'time : <br>' . $now . '<br>';
         $greeting = 'Good Evening,';
      }

      return view('admin.new_dashboard', compact('greeting'));
   }
}
