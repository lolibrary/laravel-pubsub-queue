<?php

namespace Lolibrary\PubSub\Connectors;

use Google\Cloud\PubSub\PubSubClient;
use Lolibrary\PubSub\PubSubQueue;
use Illuminate\Queue\Connectors\ConnectorInterface;

class PubSubConnector implements ConnectorInterface
{
    /**
     * Default queue name.
     *
     * @var string
     */
    protected $default = 'default';

    /**
     * Establish a queue connection.
     *
     * @param  array $config
     * @return \Illuminate\Contracts\Queue\Queue
     */
    public function connect(array $config)
    {
        $config = collect($config)->mapWithKeys(function ($value, $key) {
            return [camel_case($key) => $value];
        })->all();

        $queue = $config['queue'] ?? $this->default;

        return new PubSubQueue(new PubSubClient($config), $queue);
    }
}
