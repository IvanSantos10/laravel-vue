<?php

namespace financeiro\Providers;

use financeiro\Events\BankCreatedEvent;
use financeiro\Events\BankStoredEvent;
use financeiro\Listeners\BankActionListener;
use financeiro\Listeners\BankLogoUpload;
use financeiro\Listeners\BankLogoUploadListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        BankStoredEvent::class => [
            BankLogoUploadListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
