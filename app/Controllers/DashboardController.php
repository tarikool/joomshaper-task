<?php

namespace app\Controllers;

class DashboardController extends BaseController
{

    public function index()
    {

        $user = $this->db->query("SELECT * FROM users WHERE id = ?", $this->userId);

        var_dump($user);
        die();

        return $this->render('dashboard-view', compact('user'));
    }

}