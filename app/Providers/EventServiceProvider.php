<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification; 
use App\Listeners\CreateClienteForRegisteredUser;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class, 
            CreateClienteForRegisteredUser::class, 
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}