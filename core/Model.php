<?php

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
}