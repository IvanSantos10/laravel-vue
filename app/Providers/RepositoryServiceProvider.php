<?php

namespace financeiro\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\financeiro\Repositories\BankRepository::class, \financeiro\Repositories\BankRepositoryEloquent::class);
        $this->app->bind(\financeiro\Repositories\BankAccountRepository::class, \financeiro\Repositories\BankAccountRepositoryEloquent::class);
        //:end-bindings:
    }
}
