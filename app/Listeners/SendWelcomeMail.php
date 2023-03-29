<?php

namespace App\Listeners;

use App\Mail\WelcomeNewUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeMail
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
    public function handle($event)
    {
      // dd('about to send mail');
      Mail::to($event->user)->send(new WelcomeNewUser($event->user->name));

    }
}
