<?php

namespace config;


use PDO;

class Database
{

    public $connection;

    public $host       =  "127.0.0.1";
    public $db         =  "joomshaper_db";
    public $user       =  "root";
    public $password   =  "123@321cst" ;
    public $charset    = 'utf8mb4';

    public $dsn;


    public $options = [
    PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
    ];



    public function __construct()
    {
        $this->dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";

        $this->setConnection();

    }




    public function setConnection()
    {
        try {
            $this->connection = new PDO($this->dsn, $this->user, $this->password, $this->options);

        } catch (\PDOException $exception){
            echo $exception->getMessage();
            die();
        }

    }



    public function getConnection()
    {
        return $this->connection;
    }



    public function query($query, $param, $mul = false)
    {
        try {
            $stmt = $this->connection->prepare($query);

            if (!is_array($param)) $param = (array) $param;

            $stmt->execute($param);

            if ($mul) return $stmt->fetchAll();

            return $stmt->fetch();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }


    public function insert($query, $param)
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($param);

        return $this->connection->lastInsertId();
    }







}
