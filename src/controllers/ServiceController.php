<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Service.php';

class ServiceController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/img/service/';
    private $messages = [];

    public function addService() {
        if ($this->isPost()) {
            if (empty($_POST['repair-note'])) {
                $this->messages[] = 'Nie wprowadzono opisu usterki.';
                return $this->render('service', ['messages' => $this->messages]);
            }

            if (is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
                move_uploaded_file(
                    $_FILES['file']['tmp_name'],
                    dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
                );
                return $this->render('service', ['messages' => $this->messages]);
            }

            $service = new Service($_POST['repair-note'], $_FILES['file']['name']);
        }

        $this->render('service', ['messages' => $this->messages]);
    }

    private function validate(array $file) : bool {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'Rozmiar pliku jest zbyt duży.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'Nieobsługiwane rozszerzenie pliku.';
            return false;
        }
        $this->messages[] = 'Plik dodany pomyślnie.';
        return true;
    }
}