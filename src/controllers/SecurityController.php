<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
class SecurityController extends AppController {

    public function login() {
        $user = new User('johnsnow@example.com', 'admin', 'John', 'Snow');

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['Nie istnieje użytkownik o podanym adresie email']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Niepoprawne hasło']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/rent");
    }

}