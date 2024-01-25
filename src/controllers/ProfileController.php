<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/RentRepository.php';
require_once __DIR__.'/../repository/ServiceRepository.php';
class ProfileController extends AppController
{
    private $serviceRepository;
    private $rentRepository;
    private $userRepository;

    public function __construct() {
        parent::__construct();
        $this->serviceRepository = new ServiceRepository();
        $this->rentRepository = new RentRepository();
        $this->userRepository = new UserRepository();
    }

    public function profile()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }
        $services = $this->serviceRepository->getUserServices($_SESSION['user_id']);
        $rents = $this->rentRepository->getUserRents($_SESSION['user_id']);
        $userDetails = $this->userRepository->getUserDetails($_SESSION['user_id']);
        $this->render('profile', ['services' => $services, 'rents' => $rents, 'userDetails' => $userDetails]);
    }

    public function set_user_details() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }

        $json_data = file_get_contents('php://input');
        $data = json_decode($json_data, true);

        if ($data === null) {
            http_response_code(400); // Bad Request
            echo json_encode(['response' => 'Invalid JSON data']);
            return;
        }

        $data['user_id'] = $_SESSION['user_id'];
        $response = $this->userRepository->setUserDetails($data);

        if ($response['success']) {
            http_response_code(200);
        } else {
            http_response_code(500);
        }
        echo json_encode($response);
    }
}