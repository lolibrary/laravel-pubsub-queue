<?php

namespace Lolibrary\PubSub;

use Illuminate\Support\ServiceProvider;
use Lolibrary\PubSub\Connectors\PubSubConnector;

class PubSubQueueServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['queue']->addConnector('pubsub', function () {
            return new PubSubConnector;
        });
    }
}
