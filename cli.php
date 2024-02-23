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

try {
    $db = new PDO(dsn: $dsn, username: $username, password: $password);
} catch (PDOException $e) {

    die("Unable to Connect to database");
}

echo "Connected to Database";
