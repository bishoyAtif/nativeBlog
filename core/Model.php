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
}