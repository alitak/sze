<?php

class Database
{
    private PDO $connection;

    public function __construct(array $config)
    {
        $dsn = 'mysql:'.http_build_query($config, arg_separator: ';');
        $this->connection = new PDO($dsn, 'root', 'a', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query(string $query, array $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement;
    }
}
