<?php

namespace App\Providers;

use Apixu\ApixuInterface;
use Apixu\Factory;
use Illuminate\Support\ServiceProvider;

class ApixuServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ApixuInterface::class, function () {
            return Factory::create(env('APIXUKEY'));
        });
    }
}
