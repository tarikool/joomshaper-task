<?php


namespace app\Controllers;


class MyController extends BaseController
{


    public function index()
    {
        return $this->render('auth.login', compact('message'));
    }


}