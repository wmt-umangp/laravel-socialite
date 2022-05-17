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
        'client_id' => '318060803567-cil4b4immdveq8slpbrbm01amvkejcre.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
    ],
    'github'=>[
        'client_id'=>'4210df678b079c30b329',
        'client_secret'=>'b8e7b2717d89c682c64ff9312786a3ae2e26996a',
        'redirect' => 'http://127.0.0.1:8000/callback/github',
    ],
];
