<?php

namespace App\Listeners;

use App\Events\Usercreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmail
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
     * @param  \App\Events\Usercreated  $event
     * @return void
     */
    public function handle(Usercreated $event)
    {
        //
        print_r($event->email);
    }
}
