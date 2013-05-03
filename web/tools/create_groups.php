<?php

require '../vendor/autoload.php';

// Create our two Sentry groups
class_alias('Cartalyst\Sentry\Facades\Native\Sentry', 'Sentry');
$dsn = "mysql:dbname=cfp;host=localhost";
$user = "root";
Sentry::setupDatabaseResolver(new PDO($dsn, $user));
$group = Sentry::getGroupProvider()->create(
    array(
        'name' => 'Speakers',
        'permissions' => array(
            'admin' => 0,
            'users' => 1
        )
    )
);
Sentry::getGroupProvider()->create(
    array(
        'name' => 'Admin',
        'permissions' => array(
            'admin' => 1,
            'users' => 0,
        )
    )
);