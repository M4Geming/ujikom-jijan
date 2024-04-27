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

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        // * {
        //     margin: 0;
        //     padding: 0;
        //     border: none;
        //     outline: none;
        //     box-sizing: border-box;
        //     font-family: "Poppins", sans-serif;
        // }

        // body {
        //     display: flex;
        // }

        // .sidebar {
        //     position: sticky;
        //     top: 0;
        //     left: 0;
        //     bottom: 0;
        //     width: 240px;
        //     height: 100vh;
        //     padding: 0 1.7rem;
        //     color: #fff;
        //     background: rgba(113, 99, 186, 255);
        // }

        // .nav li a {
        //     color: #fff;
        //     display: flex;
        //     align-items: center;
        //     gap: 1.5rem;
        // }

        // .nav li a:hover,
        // active {
        //     background: grey;
        // }

        // .submenu {
        //     display: none;
        //     padding-left: 1.5rem;
        // }

        // .submenu li a {
        //     color: #fff;
        //     display: flex;
        //     align-items: center;
        //     gap: 1rem;
        // }

        // .has-submenu:hover .submenu {
        //     display: block;
        // }

        // .logout {
        //     position: absolute;
        //     bottom: 0;
        //     width: 88%;
        // }

        // .navbar {
        //     position: relative;
        //     background: rgba(113, 99, 186, 255);
        //     padding: 10px;
        //     display: flex;
        //     justify-content: space-between;
        //     align-items: center;
        // }

        // .navbar i {
        //     cursor: pointer;
        // }

        // .profile a {
        //     color: white;
        //     text-decoration: none;
        //     display: flex;
        //     align-items: center;
        // }

        // .profile img {
        //     width: 32px;
        //     height: 32px;
        //     border-radius: 50%;
        //     margin-right: 5px;
        // }

        // .content {
        //     position: relative;
        //     margin: 20px;
        // }

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

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
