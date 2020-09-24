<?php

class User_model {
    private $table = 'blog';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getDatabase() {
        // $this->db->query('SELECT * FROM ' . $this->table);
        // $this->db
        // return $this->db->resultSet();

        // return $this->db->getAllData($this->table);
        $this->db->insertData($this->table, ['blogText', 'madeName', 'time'], ['hi dunia', 'manusia', '2020-09-15']);
        return $this->db->getDataById($this->table, 1);
    }
}