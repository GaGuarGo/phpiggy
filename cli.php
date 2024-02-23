<?php

$driver = 'mysql';
$configuration = http_build_query(

    data: [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'phpiggy',

    ],
    arg_separator: ';',
);

$dsn = "{$driver}:{$configuration}";
$username = 'root';
$password = '';

$db = new PDO(dsn: $dsn, username: $username, password: $password);

echo "Connected to Database";
