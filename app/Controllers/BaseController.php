<?php

namespace app\Controllers;


use config\Database;

class BaseController
{
    private $contents;

    protected $data;

    protected $db;

    protected $userId;


    public function __construct()
    {
        foreach ($_POST as $key => $value) {
            $key = htmlspecialchars($key);
            $value = htmlspecialchars($value);

            $this->data[$key] = $value;
        }

        $this->db = new Database();

        $this->userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
    }


    public function __destruct()
    {
        echo $this->contents;
    }

    /**
     * @param $file
     * @param array $data
     */
    protected function render($file, $data = [])
    {
        $file = 'views/'. str_ireplace('.', '/', $file) . '.php';

        $file = BASE_PATH . '/' . $file;

        if (file_exists($file)){

            ob_start();

            extract($data);
            include_once $file;

            $this->contents = ob_get_clean();
            ob_end_clean();

        } else {
            echo ' view not found';
            die();
        }


        return true;

    }


    public function jsonResponse($data, $status = 200)
    {
        header('Content-Type: application/json');

        http_response_code($status);
        echo json_encode($data, true);

        return true;
    }














}