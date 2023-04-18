<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class AcknowledgePotentialClient extends Mailable
{
   use Queueable, SerializesModels;

   public $client;
   /**
    * Create a new message instance.
    *
    * @return void
    */
   public function __construct($client)
   {
      $this->client = $client;
   }

   /**
    * Get the message envelope.
    *
    * @return \Illuminate\Mail\Mailables\Envelope
    */
   public function envelope()
   {
      return new Envelope(
         from: new Address('info@marxon.com.ng', 'Marxon Inc'),
         replyTo: [
            new Address('info@marxon.com.ng', 'Marxon Inc'),
        ],
         subject: $this->client['fullname'] . ', Welcome to Marxon Inc',
      );
   }

   /**
    * Get the message content definition.
    *
    * @return \Illuminate\Mail\Mailables\Content
    */
   public function content()
   {
      return new Content(
         markdown: 'mail.acknowledge-potential-client',
      );
   }

   /**
    * Get the attachments for the message.
    *
    * @return array
    */
   public function attachments()
   {
      return [];
   }
}
