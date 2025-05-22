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

    'github' => [
    'client_id' => env('GITHUB_CLIENT_ID'),
    'client_secret' => env('GITHUB_CLIENT_SECRET'),
    'redirect' => 'http://127.0.0.1:8001/github/callback',
],

'google' => [
    'client_id' => '888744733805-khp22krri7ptncbqkr1lj91bn6nesgl4.apps.googleusercontent.com',
    'client_secret' => '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',
    'redirect' => 'http://127.0.0.1:8001/google/callback',
],

'facebook' => [
    'client_id' => '667073569416351',
    'client_secret' => '14aeec6b92bb58cae1df934aef918276',
    'redirect' => 'http://127.0.0.1:8001/facebook/callback',
],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
