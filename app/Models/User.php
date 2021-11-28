<?php


namespace app\Models;


class User extends BaseModel
{

    public function __construct()
    {
        parent::__construct();
        $this->setTable();
    }



    public function setTable()
    {
        $this->table = "users";
    }





}