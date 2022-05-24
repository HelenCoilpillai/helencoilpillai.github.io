<?php

namespace App\Providers;

use App\Interfaces\CrudRepositoryInterface;
use App\Repository\Kata7\StringEndRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CrudRepositoryInterface::class, StringEndRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
