<?php

namespace app\Controllers;

class DashboardController extends BaseController
{

    public function index()
    {
        if (!$this->userId) header("Location: login");

        $user = $this->db->query("SELECT * FROM users WHERE id = ?", $this->userId);
        return $this->render('dashboard-view', compact('user'));
    }

}