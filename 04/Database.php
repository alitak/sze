<?php

class Database
{
    private PDO $connection;

    public function __construct(array $config)
    {
        $dsn = 'mysql:'.http_build_query($config, arg_separator: ';');
        $this->connection = new PDO($dsn, 'root', 'a');
    }

    public function query(string $param)
    {
        $statement = $this->connection->prepare($param);
        $statement->execute();

        return $statement;
    }
}