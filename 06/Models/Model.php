<?php

namespace Models;
abstract class Model
{

    private \Database $db;

    public function __construct()
    {
        $config = require base_path('config.php');

        $this->db = new \Database($config['database']);
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

    public function create(array $params)
    {
        // insert into table (column1, coliumn2) values ('foo', 'bar')
        // insert into table set column1='foo', column2='bar'
// array(2) { ["title"]=> string(4) "asdf" ["title2"]=> string(4) "asdf" }
//        $query = '';
//        foreach ($params as $key => $param) {
//            $query = "{$query}{$key}='{$param}'";
//            $query = $query.$key.'="'.$param.'", ';
//        }

//        $query = [];
//        foreach ($params as $key => $param) {
//            $query[] = $key.'="'.$param.'"';
//        }
        $query = [];
        foreach (array_keys($params) as $columnName) {
            $query[] = $columnName.' = :'.$columnName;
        }
//        $params = array_map(function ($element) {
//            return '"'.$element.'"';
//        }, $params);
//        dd(http_build_query($params, arg_separator: ','));
        return $this->db
            ->query('insert into '.$this->table.' set '.join(', ', $query), $params)
            ->fetch();
    }
}
