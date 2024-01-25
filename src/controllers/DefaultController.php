<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function admin_panel()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }

        if (isset($_SESSION['user_permission']) &&
            $_SESSION['user_permission'] === 'admin') {
            $this->render('adminPanel');
        } else {
            $this->render('wrongURL');
        }
    }
}