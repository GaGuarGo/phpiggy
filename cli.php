<?php

include __DIR__ . '/src/Framework/Database.php';

use Framework\Database;

$db = new Database(
    driver: 'mysql',
    config: [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'phpiggy'
    ],
    username: 'root',
    password: '',
);

echo "Connected to Database";
