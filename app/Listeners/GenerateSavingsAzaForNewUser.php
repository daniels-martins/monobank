<?php

namespace App\Listeners;

use stdClass;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\AzaController;
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
        // create a new empty profile using for this user
        /**
         * We will just create an empty profile for this user
         * later he will fill out the rest from his profile page
         * 
         */
        $req = new Request();
        $req->azatype = 'savings';

        (new AzaController())->store($req);
    }
}
