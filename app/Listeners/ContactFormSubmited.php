<?php

namespace App\Listeners;

use App\Mail\ContactMail;

use Illuminate\Support\Facades\Mail;
use App\Listeners\ContactFormSubmited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class ContactFormSubmited
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle( ContactFormSubmited  $event): void
    {
        //
        Mail::to($event->request->email)->send(new ContactMail($event->request));

       // dd($event->request->email);
    }
}
