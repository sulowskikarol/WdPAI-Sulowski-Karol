<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }

    public function rent()
    {
        $this->render('rent');
    }

    public function service()
    {
        $this->render('service');
    }
}