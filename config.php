<?php

define('DB_PATH', __DIR__ . '/database.sqlite'); // Path to your SQLite database file

define('BASE_URL', '/'); // e.g., '/' or '/my_app/'

define('SITE_NAME', 'WikiGames');
define('UPLOAD_DIR', 'uploadsImg/'); // Directory for uploaded images relative to the root



return [
    'database' => [
        'driver' => 'sqlite',
        'database' => 'database.sqlite'

    ]
];

?>