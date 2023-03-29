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
      // manufacture a routing number from the list of all acceptable routing numbers, for now we use a random routing num lets use 
      // the one from ameris bank : 053208066
      $routingNumsArray = [
         '053208066',
         '053208066',
         '061020786',
         '061201673',
         '061201754',
         '061203325',
         '061204612',
         '061205255',
         '061206432',
         '061208126',
         '061211168',
         '061213069',
         '061219830',
         '061220489',
         '061220609',
         '061292433',
         '063013597',
         '063014499',
         '063106734',
         '063111677',
         '063112906',
         '063113138',
         '063114276',
         '063115152',

      ];
      // pick a random routing number
      $randomPick = rand(0, count($routingNumsArray) - 1);
      $routing = $routingNumsArray[$randomPick];
      $event->user->profile()->create(['fname' => $event->user->name, 'routing' => $routing]);

      // create a new empty savings aza for this user
      $req = new Request();
      $req['aza_type'] = '1'; // 1 represents the savings id in the AzaType table
      $req['user'] = $event->user; // 1 represents the savings id in the AzaType table
      (new AzaController())->store($req);

      // try {
      //    (new AzaController())->store($req);
      // } catch (\Throwable $th) {
      //    dd('Error', $req->all());
      // }

      // create a cc for the new user
      (new CardSeeder)->run();
   }
}
