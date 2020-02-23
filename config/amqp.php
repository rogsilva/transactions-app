<?php

return [
    'default'     => 'rabbitmq',

    'connections' => [
        'rabbitmq' => [
            'connection' => [
                'host'            => 'rabbitmq',
                'port'            => 5672,
                'username'        => 'guest',
                'password'        => 'guest',
                'vhost'           => '/',
                'connect_options' => [],
                'ssl_options'     => [],
                'ssl_protocol'    => 'ssl',
            ],

            'channel_id' => null,

            'message' => [
                'content_type'     => 'text/plain',
                'delivery_mode'    => 2,
                'content_encoding' => 'UTF-8',
            ],

            'exchange' => [
                'name'        => 'amq.topic',
                'type'        => 'topic',
                'declare'     => false,
                'passive'     => false,
                'durable'     => true,
                'auto_delete' => false,
                'internal'    => false,
                'nowait'      => false,
                'properties'  => [],
            ],
        ],
    ],
];
