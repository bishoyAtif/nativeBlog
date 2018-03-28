<?php

namespace Core;

use PDO;

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = App::get('database');
    }

    public function all()
    {
        $queryString = sprintf("SELECT * FROM %s", $this->table);
        $query = $this->db->prepare($queryString);
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($fields = [])
    {
        $formattedFieldNames = implode(", ", array_keys($fields));
        $formattedPlaceHolders = implode(", ", array_map(function($e){
            return ':' . $e;
        }, array_keys($fields)));
        
        $query = $this->db->prepare("INSERT INTO {$this->table}({$formattedFieldNames}) VALUES({$formattedPlaceHolders})");
        $query->execute($fields);
    }

    public function find($id)
    {
        $queryString = sprintf("SELECT * FROM %s WHERE id=%s LIMIT 1", $this->table, $id);
        $query = $this->db->prepare($queryString);
        $query->execute();
            
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        if (empty($data)) {
            return null;
        }

        return $data[0];
    }

    public function update($fields = [])
    {
        $formattedPlaceHolders = implode(", ", array_map(function($e){
            return $e . ' = :' . $e;
        }, array_keys($fields)));
        
        $query = $this->db->prepare("UPDATE {$this->table} SET {$formattedPlaceHolders} WHERE id=:id");
        $query->execute($fields);
    }
}