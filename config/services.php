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

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('FACEBOOK_CLIENT_REDIRECT'),
    ],


    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_CLIENT_REDIRECT'),
    ],



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


    


'colors'=>[
    'White'=>['HEX'=>'#ffffff','rgb'=>'rgb(255, 255, 255)'],
    'Silver'=>['HEX'=>'#C0C0C0','rgb'=>'rgb(192, 192, 192)'],
    'Gray'=>['HEX'=>'#808080','rgb'=>'rgb(255, 255, 255)'],
    'Black'=>['HEX'=>'#000000','rgb'=>'rgb(0, 0, 0)'],
    'Brown'=>['HEX'=>'#A52A2A','rgb'=>'rgb(165, 42, 42)'],
    'Dark Brown'=>['HEX'=>'#654321','rgb'=>'rgb(101, 67, 33)'],
    'Red'=>['HEX'=>'#FF0000','rgb'=>'rgb(255, 0,0)'],
    'Maroon'=>['HEX'=>'#800000','rgb'=>'rgb(128, 0, 0)'],
    'Yellow'=>['HEX'=>'#FFFF00','rgb'=>'rgb(255, 255, 0)'],
    'Green'=>['HEX'=>'#008000','rgb'=>'rgb(0, 128, 0)'],
    'Blue'=>['HEX'=>'#0000FF','rgb'=>'rgb(0, 0, 255)'],
    'Navy Blue'=>['HEX'=>'#000080','rgb'=>'rgb(0, 0, 128)'],
    'Purple'=>['HEX'=>'#800080','rgb'=>'rgb(128, 0, 128)'],
    'Orange'=>['HEX'=>'#FFA500','rgb'=>'rgb(255, 165, 0)'],
    'Fawn'=>['HEX'=>'#E5AA70','rgb'=>'rgb(229, 170, 112)'],
    'Khaki'=>['HEX'=>'#F0E68C','rgb'=>'gb(240,230,140)'],
    'Beigh'=>['HEX'=>'#F5F5DC','rgb'=>'rgb(245, 245, 220)'],
    'Peach'=>['HEX'=>'#FFDAB9','rgb'=>'rgb(255,218,185)'],
    'Golden'=>['HEX'=>'#d4af37','rgb'=>'rgb(212, 175, 55)'],
    'Pink'=>['HEX'=>'#FFC0CB','rgb'=>'rgb(255, 192, 203)'],
    'Dark Pink'=>['HEX'=>'#FF1493','rgb'=>'rgb(255,20,147)']
    
    ],
    
    
    
     'sizes'=>[
        'men'=>[
            'eu'=>'39-44',
          //  'uk'=>'5-10',
            // 'us'=>'5.5-10.5'
        ],
    
        'women'=>[
            'eu'=>'35-40',
          //'uk'=>'2-7',
         // 'us'=>'2.5-7.5'
        ],
    
        'youths'=>[
            'eu'=>'35-39',
           //'uk'=>'2.5-6',
          //'us'=>'3.5-7'
        ],
    
         'kids'=>[
          'eu'=>'30-34',
          //'uk'=>'11.5-2',
          //'us'=>'12.5-3'
        ],
    
    
        'toddlers'=>[
            'eu'=>'24-30',
            //'uk'=>'6.5-11',
            //'us'=>'7.5-12'
        ],
    
    
    
        'walkers'=>[
            'eu'=>'20-23',
            //'uk'=>'3.5-6',
            //'us'=>'4.5-7'
        ],
    
        'infants'=>[
            'eu'=>'15-19',
            //'uk'=>'0-3',
            //'us'=>'0-4'
        ],
    
    
        'babies'=>[
            'eu'=>'0-4',
            //'uk'=>'0-4'
            //'us'=>'0-5',
        ]
    
    
    
    ],

];
