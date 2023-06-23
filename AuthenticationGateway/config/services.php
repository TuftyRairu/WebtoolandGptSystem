<?php

return [
    'webtools' => [
        'base_uri' => env('WEBTOOLS_SERVICE_BASE_URL'),
        'secret' => env('WEBTOOLS_SERVICE_SECRET')
    ],
    'payment' => [
        'base_uri' => env('PAYMENT_SERVICE_BASE_URL'),
        'secret' => env('PAYMENT_SERVICE_SECRET')
    ],
    'gpt' => [
        'base_uri' => env('GPT_SERVICE_BASE_URL'),
        'secret' => env('GPT_SERVICE_SECRET')
    ],
];