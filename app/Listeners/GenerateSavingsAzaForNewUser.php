<?php

namespace App\Listeners;

use stdClass;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\AzaController;
use Database\Seeders\CardSeeder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateSavingsAzaForNewUser
{
   /**
    * Create the event listener.
    *
    * @return void
    */


   public function __construct()
   {
      //
   }

   /**
    * Handle the event.
    *
    * @param  object  $event
    * @return void
    */
   public function handle(Registered $event)
   {
      /**
       * We will just create an empty profile for this user
       * later the user will fill out the rest from their profile page
       */
      $event->user->profile()->create(['fname' =>   $event->user->name]);

      // create a new empty savings aza for this user
      $req = new Request();
      $req['azatype'] = 'savings';
      (new AzaController())->store($req);

      // create a cc for the new user
      (new CardSeeder)->run();
   }
}
