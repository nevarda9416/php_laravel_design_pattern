<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'read' => [
                'host' => [ // host trong read có thể truyền vào 1 mảng ip nếu có nhiều scale server. Laravel sẽ chọn ngẫu nhiên 1 server trong danh sách để kết nối
                    '192.168.1.1',
                    '192.168.1.2',
                ],
                'port' => env('DB_SLAVE_PORT', '3306'),
                'username' => env('DB_SLAVE_USERNAME', 'root'),
                'password' => env('DB_SLAVE_PASSWORD', 'root'),
            ],
            'write' => [
                'host' => [
                    '192.168.1.3',
                    '192.168.1.4',
                ],
                'port' => env('DB_MASTER_PORT', '3306'),
                'username' => env('DB_MASTER_USERNAME', 'root'),
                'password' => env('DB_MASTER_PASSWORD', 'root'),
            ],
            'sticky' => ['host' => env('DB_STICKY_HOST', 'true')], // true nghĩa là khi ghi dữ liệu vào database và đọc ngay thì truy vấn đọc sẽ được thực hiện trực tiếp trên master server. Nó sẽ khắc phục được trường hợp máy chủ master được ghi dữ liệu nhưng máy chủ slave chưa kịp cập nhật dữ liệu dẫn đến việc đọc dữ liệu trên slave chưa được mới
            // nhất
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            #'host' => env('DB_HOST', '127.0.0.1'),
            #'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            #'username' => env('DB_USERNAME', 'forge'),
            #'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration UserRepository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Cache Databases
    |--------------------------------------------------------------------------
    |
    | Cache is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

        'master' => [
            'host' => env('REDIS_MASTER_HOST', '127.0.0.1'),
            'password' => env('REDIS_MASTER_PASSWORD', null),
            'port' => env('REDIS_MASTER_PORT', '6379'),
            'database' => env('REDIS_MASTER_DB', '0'),
        ],

        'slave_1' => [
            'host' => env('REDIS_SLAVE_1_HOST', '127.0.0.1'),
            'password' => env('REDIS_SLAVE_1_PASSWORD', null),
            'port' => env('REDIS_SLAVE_1_PORT', '6380'),
            'database' => env('REDIS_SLAVE_1_DB', '0'),
        ],

        'slave_2' => [
            'host' => env('REDIS_SLAVE_2_HOST', '127.0.0.1'),
            'password' => env('REDIS_SLAVE_2_PASSWORD', null),
            'port' => env('REDIS_SLAVE_2_PORT', '6381'),
            'database' => env('REDIS_SLAVE_2_DB', '0'),
        ],
    ],

];
