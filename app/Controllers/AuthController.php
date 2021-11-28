<?php

namespace app\Controllers;


use app\Models\User;
use config\Database;

class AuthController extends BaseController
{

    public $errors = [];

    public function __construct()
    {
        parent::__construct();
    }


    public function loginForm()
    {
        if ($this->userId) header("Location: dashboard");

        return $this->render('auth.login-form');
    }


    public function registrationForm()
    {
        if ($this->userId) header("Location: dashboard");

        return $this->render('auth.registration-form');
    }


    public function registration()
    {
        $status = $this->validateRegistration();

        if (!$status) exit();


        $query = "INSERT INTO users (name, email, password, is_seller) values (?, ?, ?, ?)";

        $id = $this->db->insert($query,
            [
                $this->data['name'],
                $this->data['email'],
                $this->data['password'],
                $this->data['is_seller'],
            ]
        );

        $this->loginUser($id);

    }



    public function login()
    {

        $status = $this->validateLogin();

        if (!$status) exit();

        $query = "SELECT * FROM users WHERE email = ?";
        $user = $this->db->query($query, [
            $this->data['email'],
        ]);


        if ($user) {
            $isCorrect = password_verify($this->data['password'], $user['password']);
            if ($isCorrect) {
                return $this->loginUser($user['id']);
            }
        }

        $this->errors[] = "Credentials doesn't match";
        $this->jsonResponse($this->errors, 403);
    }




    public function loginUser($userId)
    {
        if ($userId) {
            $_SESSION['user_id'] = $userId;
            $this->jsonResponse(true);
            return true;
        }
    }



    public function logoutUser()
    {
        session_destroy();
        header('Location: login');
    }






    public function validateLogin()
    {
        if (!$this->data['email']) {
            $this->errors[] = "Email is required";
        }

        if (!$this->data['password']) {
            $this->errors[] = "Password is required";
        }


        if (!count($this->errors)){
            return true;
        }


        $this->jsonResponse($this->errors, 403);
    }


    public function checkEmail()
    {
        $query = "SELECT * FROM users WHERE email = ?";
        $user = $this->db->query($query, [
            $this->data['email'],
        ]);

        return $user;
    }



    public function validateRegistration()
    {
        if (!$this->data['name']) {
            $this->errors[] = "Name is required";
        }

        if (!$this->data['email']) {
            $this->errors[] = "Email is required";
        } elseif ($this->checkEmail()){
            $this->errors[] = "Email already taken";
        }

        if (!$this->data['password']) {
            $this->errors[] = "Password is required";
        } elseif ($this->data['password'] != $this->data['confirm_password']) {
            $this->errors[] = "Password doesn't match";
        } else {
            $this->data['password'] = password_hash($this->data['password'], PASSWORD_DEFAULT);
        }

        $this->data['is_seller'] = $this->data['is_seller'] ? 1 : 0;

        if (!count($this->errors)){
            return true;
        }


        $this->jsonResponse($this->errors, 403);
    }



}