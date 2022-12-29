<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [  //to register event with listener 
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],      
        'App\Events\Usercreated'=> [
            'App\Listeners\SendEmail'
        ],
        'App\Events\UserRegistered'=> [
            'App\Listeners\UserRegisterListener'
          ]
    ];
 
    protected $observers = [        //to register observers  (observers are used to group all of your 
        Company::class => [CompanyRegisterObserver::class],  //                              listeners into a single class.)
    ];                                          //observers can also be registered in boot method below
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
