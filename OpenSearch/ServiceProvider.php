<?php

namespace OpenSearch;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use OpenSearch\Contracts\ClientInterface;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * register
     */
    public function register(){}

    public function boot()
    {
        $this->app->bind(ClientInterface::class, function ($app) {
            return new Client($app['config']);
        });
    }
}
