<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\MAil\MyTestMail;
class UserRegisterListener
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
        //
        // $event=$event->event;
        // dd($event);
        \Mail::to($event->event['email'])->send(
            new MyTestMail($event)
        );
        // \Mail::send(['text'=>'mail'],$event,function($message) {
        //     $message->to($event['email'])
        //     ->subject('Hello from tech')
        //     >from('xyz@gmail.com');
        // });
    }
}
