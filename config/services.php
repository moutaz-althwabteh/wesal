<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'github' => [
        'client_id' => '0181d327aec600c5403b',
        'client_secret' => '7da4ebb9b5216711470e0469c00cae6c038c155b',
        'redirect' => 'http://localhost:8000/auth/github/callback',
    ],
    'facebook' => [
        'client_id' => '1812733392373996',
        'client_secret' => '661eaadc2c372d3847068c331b1b8f31',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    'twitter' => [
        'client_id' => 'h0zvfZKG0msfktd6d2LfRcaZm',
        'client_secret' => 'Ms6Z3OwBUB8gqizatgFf5j2yEstxIKQjGni83rdtjKyNUW5AHS',
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],
    //sms
    'nexmo' => [
        'key' => '125a8fa5',
        'secret' => '1563536fdcdb8989',
        'sms_form' => '15556666666',
    ],

];
