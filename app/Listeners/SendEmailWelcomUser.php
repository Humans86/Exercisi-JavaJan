<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailWelcomUser
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
     * @param  \App\Events\UserCreated  $event
     * @return void
     */
    private $event;

    public function handle(UserCreated $event)
    {
       $data['title'] = "Benvingut " .$event->user->name;

       $this->event = $event;

        Mail::send('emails.contacte',$data, function($message){
         $message->to($this->event->user->email, $this->event->user->name)
         ->subject('Gràcies per formar part de la família ciclista de Gurb '.$this->event->user->name);
        });
        
    }
}
