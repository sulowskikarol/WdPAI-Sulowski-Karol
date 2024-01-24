<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
class SecurityController extends AppController {

    public function login() {

        session_start();
        if (isset($_SESSION['user_id'])) {
            header("Location: /rent");
            exit();
        }

        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['Nie istnieje użytkownik o podanym adresie email']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Niepoprawne hasło']]);
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_name('swiat_rowerow');
            ini_set('session.gc_maxlifetime', 60 * 30);
            ini_set('session.cookie_secure', 1);
            ini_set('session.cookie_httponly', 1);
            ini_set('session.use_strict_mode', 1);
            session_start();
        }
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_permission'] = $user->getPermission();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/rent");
        exit();
    }

    public function register()
    {
        session_start();
        if (isset($_SESSION['user_id'])) {
            header("Location: /rent");
            exit();
        }

        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if ($user) {
            return $this->render('register', ['messages' => ['W systemie istnieje już użytkownik o podanym adresie email']]);
        }

        if (!$userRepository->createUser($email, $password)) {
            return $this->render('register', ['messages' => ['Błąd systemu. Skontaktuj się z administratorem']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
        exit();
    }

    public function logout() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }

        session_unset();
        session_destroy();

        header('Location: /login');
        exit();
    }
}