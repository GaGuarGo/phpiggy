<?php

declare(strict_types=1);

namespace Framework;

use PDO, PDOException, PDOStatement;

class Database
{

    private PDO $connection;
    private PDOStatement $stmt;

    public function __construct(string $driver, array $config, string $username, string $password)
    {
        $configuration = http_build_query(

            data: $config,
            arg_separator: ';',
        );

        $dsn = "{$driver}:{$configuration}";


        try {
            $this->connection = new PDO(dsn: $dsn, username: $username, password: $password, options: [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {

            die("Unable to Connect to database");
        }
    }


    public function query(string $query, array $params = []): Database
    {
        $this->stmt =   $this->connection->prepare(query: $query);
        $this->stmt->execute($params);
        return $this;
    }
    public function count()
    {
        return $this->stmt->fetchColumn();
    }


    public function find()
    {
        return $this->stmt->fetch();
    }
}
