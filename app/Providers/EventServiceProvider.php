<?php

namespace App\Providers;

use App\Models\Student;
use App\Models\StudentParent;
use App\Observers\StudentObserver;
use App\Observers\StudentParentObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        /*Registered::class => [
          SendEmailVerificationNotification::class,
        ],*/
    ];

    public function boot()
    {

    }
}
