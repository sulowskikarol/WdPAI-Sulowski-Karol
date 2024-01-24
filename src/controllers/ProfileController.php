<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Rent.php';
require_once __DIR__.'/../models/Service.php';
require_once __DIR__.'/../repository/RentRepository.php';
require_once __DIR__.'/../repository/ServiceRepository.php';
class ProfileController extends AppController
{
    private $serviceRepository;

    public function __construct() {
        parent::__construct();
        $this->serviceRepository = new ServiceRepository();
    }

    public function profile()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }
        $services = $this->serviceRepository->getUserServices($_SESSION['user_id']);
        $this->render('profile', ['services' => $services]);
    }
}