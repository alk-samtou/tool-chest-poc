<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

        'azure-public' => [
            'driver'    => 'azure',
            'name'      => env('AZURE_PUBLIC_STORAGE_NAME'),
            'key'       => env('AZURE_PUBLIC_STORAGE_KEY'),
            'container' => env('AZURE_PUBLIC_STORAGE_CONTAINER','public'),
            'url'       => env('AZURE_PUBLIC_STORAGE_URL'),
            'prefix'    => null,
        ],

        'azure-private' => [
            'driver'    => 'azure',
            'name'      => env('AZURE_PRIVATE_STORAGE_NAME'),
            'key'       => env('AZURE_PRIVATE_STORAGE_KEY'),
            'container' => env('AZURE_PRIVATE_STORAGE_CONTAINER','private'),
            'url'       => env('AZURE_PRIVATE_STORAGE_URL'),
            'prefix'    => null,
        ],

        /* SAS tokens
         'azure' => [
            'driver'    => 'azure',
            'sasToken'  => env('AZURE_STORAGE_SAS_TOKEN'),
            'container' => env('AZURE_STORAGE_CONTAINER'),
            'url'       => env('AZURE_STORAGE_URL'),
            'prefix'    => null,
            'endpoint'  => env('AZURE_STORAGE_ENDPOINT'),
        ],
         */

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
