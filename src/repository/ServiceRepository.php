<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Service.php';

class ServiceRepository extends Repository
{
    public function getServiceById($id): ?Service {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM rezerwacje_serwis WHERE rezerwacja_id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $service = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($service == false) {
            return null;
        }

        return new Service(
            $service['notatka_od_klienta'],
            $service['zdjecie'],
            $service['termin_dostarczenia'],
            $service['data_rezerwacji']
        );
    }

    public function addService(Service $service): void {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO rezerwacje_serwis (konta_id, data_rezerwacji, termin_dostarczenia, notatka_od_klienta, zdjecie) 
                    VALUES (?, ?, ?, ?, ?)'
        );

        session_start();
        $user_id = $_SESSION['user_id'];

        $stmt->execute([
            $user_id,
            $service->getPostedAt()->format('Y-m-d'),
            date("Y-m-d", strtotime($service->getDate())),
            $service->getDescription(),
            $service->getImage()
        ]);
    }

    public function getUserServices(int $user_id): array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM rezerwacje_serwis WHERE konta_id = :user_id
        ');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($services as $service) {
            $result[] = new Service(
                $service['notatka_od_klienta'],
                $service['zdjecie'],
                $service['termin_dostarczenia'],
                $service['data_rezerwacji']
            );
        }

        return $result;
    }

    public function getAllServices(): array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM rezerwacje_serwis
        ');
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($services as $service) {
            $result[] = new Service(
                $service['notatka_od_klienta'],
                $service['zdjecie'],
                $service['termin_dostarczenia'],
                $service['data_rezerwacji']
            );
        }

        return $result;
    }
}