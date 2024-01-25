<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Rent.php';
require_once __DIR__.'/../repository/RentRepository.php';

class RentController extends AppController
{
    private $rentRepository;

    public function __construct()
    {
        parent::__construct();
        $this->rentRepository = new RentRepository();
    }

    public function rent()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }
        $this->render('rent');
    }

    public function bike_categories()
    {
        $bikeCategories = $this->rentRepository->getBikeCategories();
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode($bikeCategories);
    }

    public function submit_rent() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        session_start();

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $rent = new Rent(
                $decoded['rentDate'],
                $decoded['returnDate'],
                $decoded['rentedBikes'],
                $_SESSION['user_id']
            );

            $respond = $this->rentRepository->addRent($rent);
            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode($respond);
        }
    }
}