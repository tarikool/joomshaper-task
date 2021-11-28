<?php


namespace app\Models;


use config\Database;

class BaseModel
{

    public $db;
    public $table;

    public function __construct()
    {
        $database = new Database();

        $this->db = $database->getConnection();
    }






    public function all()
    {
        $stmt = $this->db->query("SELECT * FROM $this->table");
        return $stmt->fetchAll();
    }


}