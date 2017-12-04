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
    
    'google' => [
        'client_id' => '504280150335-3lk6mv1tlfj6n65788epck840fi6eni8.apps.googleusercontent.com',
        'client_secret' => 'dxqnEChHAt1xox2RLWUC3E-2',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],
    
    'facebook' => [
        'client_id' => '143492309605728',
        'client_secret' => '6bbc0bb56e607d0a354423ad36686d21',
        'redirect' => 'http://localhost:8000/auth/fb/callback',
    ],


];
