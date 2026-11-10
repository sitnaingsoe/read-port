<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | This is the disk Laravel will use by default for file storage.
    | You can change it in your .env file with FILESYSTEM_DISK=...
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Each disk configuration defines how Laravel will store and access files.
    | You can configure multiple disks and choose them dynamically in code.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        // Private storage
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        // Public storage (accessible via /storage)
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        // FTP storage
        'ftp' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            // Optional:
            // 'port' => env('FTP_PORT', 21),
            // 'root' => env('FTP_ROOT'),
            // 'passive' => true,
            // 'ssl' => true,
            // 'timeout' => 30,
        ],

        // Cloudflare R2 (S3 compatible)
        'r2' => [
            'driver' => 's3',
            'key' => env('R2_ACCESS_KEY_ID', env('AWS_ACCESS_KEY_ID')),
            'secret' => env('R2_SECRET_ACCESS_KEY', env('AWS_SECRET_ACCESS_KEY')),
            'region' => env('AWS_DEFAULT_REGION', 'auto'),
            'bucket' => env('R2_BUCKET', env('AWS_BUCKET')),
            'url' => env('R2_PUBLIC_URL', env('AWS_URL')),
            'endpoint' => env('AWS_ENDPOINT') ?: (env('R2_ACCOUNT_ID') ? 'https://' . env('R2_ACCOUNT_ID') . '.r2.cloudflarestorage.com' : null),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => true,
            'http' => [
                'verify' => env('APP_ENV') !== 'local',
            ],
        ],

        // Keep 'spaces' alias pointing to R2/S3 config for backward compatibility
        'spaces' => [
            'driver' => 's3',
            'key' => env('R2_ACCESS_KEY_ID', env('AWS_ACCESS_KEY_ID')),
            'secret' => env('R2_SECRET_ACCESS_KEY', env('AWS_SECRET_ACCESS_KEY')),
            'region' => env('AWS_DEFAULT_REGION', 'auto'),
            'bucket' => env('R2_BUCKET', env('AWS_BUCKET')),
            'url' => env('R2_PUBLIC_URL', env('AWS_URL')),
            'endpoint' => env('AWS_ENDPOINT') ?: (env('R2_ACCOUNT_ID') ? 'https://' . env('R2_ACCOUNT_ID') . '.r2.cloudflarestorage.com' : null),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => true,
            'http' => [
                'verify' => env('APP_ENV') !== 'local',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | These symbolic links will be created when you run `php artisan storage:link`.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        public_path('images') => storage_path('app/images'),
    ],

];
