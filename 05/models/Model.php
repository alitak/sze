<?php
require 'Database.php';

abstract class Model
{

    private Database $db;

    public function __construct()
    {
        $config = require 'config.php';

        $this->db = new Database($config['database']);
    }

    public function all(): array
    {
        return $this->db
            ->query('select * from '.$this->table)
            ->fetchAll();
    }

    public function find(int $id): array
    {
        return $this->db
            ->query('select * from '.$this->table.' where id = :id limit 1', ['id' => $id])
            ->fetch();
    }
}
