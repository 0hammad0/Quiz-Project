<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '685751402990-ce3qmuu6d9apmacrpup56f3pdisqr4ko.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/google/callback/',
    ],

    'facebook' => [
        'client_id' => '6214302101922046',
        'client_secret' => 'c928d5cfa1d755bdc0f8a6b03ff81dad',
        'redirect' => 'http://127.0.0.1:8000/facebook/callback/',
    ],

];
