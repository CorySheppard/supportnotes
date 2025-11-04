<?php

namespace Core;

use PDO;

class Database
{

    public $connection;

    public function __construct($config)
    {
        $dsn = "mysql:" . http_build_query($config, "", ";");

        $this->connection = new PDO($dsn, $config["dbuser"], $config["dbpass"], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $parameters = [])
    {
        $statement = $this->connection->prepare($query);

        $statement->execute($parameters);

        return $statement;
    }
}
