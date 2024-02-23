<?php

declare(strict_types=1);

namespace Framework;

use PDO, PDOException;

class Database
{

    private PDO $connection;

    public function __construct(string $driver, array $config, string $username, string $password)
    {
        $configuration = http_build_query(

            data: $config,
            arg_separator: ';',
        );

        $dsn = "{$driver}:{$configuration}";


        try {
            $this->connection = new PDO(dsn: $dsn, username: $username, password: $password);
        } catch (PDOException $e) {

            die("Unable to Connect to database");
        }
    }


    public function query(string $query)
    {
        $this->connection->query($query);
    }
}
