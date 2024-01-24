<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Service.php';

class RentRepository extends Repository
{
    public function addRent(Rent $rent): String {
        $rentDate = $rent->getRentDate();
        $returnDate = $rent->getReturnDate();

        $stmt = $this->database->connect()->prepare('
            SELECT kr.kategoria_id, kr.nazwa_kategorii, COUNT(r.rower_id) AS ilosc_dostepnych
            FROM kategorie_rowerow kr
            JOIN rowery r ON kr.kategoria_id = r.kategoria_id
            LEFT JOIN wypozyczenia_rowery wr ON r.rower_id = wr.rowery_id
            LEFT JOIN wypozyczenia w ON wr.wypozyczenia_id = w.wypozyczenie_id
            WHERE (w.data_wypozyczenia IS NULL 
                       OR w.data_zwrotu < :rentDate 
                       OR w.data_wypozyczenia > :returnDate)
            GROUP BY kr.kategoria_id, kr.nazwa_kategorii;
        ');
        $stmt->bindParam(':rentDate', $rentDate, PDO::PARAM_STR);
        $stmt->bindParam(':returnDate', $returnDate, PDO::PARAM_STR);
        $stmt->execute();

        $freeBikeForEachCategory = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $bikesInOrder = $rent->getRentedBikes();

        foreach($bikesInOrder as $bike) {
            foreach ($freeBikeForEachCategory as $freeBikes) {
                if ($bike['kategoria_id'] === $freeBikes['kategoria_id']) {
                    $freeBikes['ilosc_dostepnych'] -= 1;
                    if ($freeBikes['ilosc_dostepnych'] < 0) {
                        return "Nie jest dostępna wystarczająca ilość rowerów";
                    }
                    break;
                }
            }
        }

        $stmt = $this->database->connect()->prepare('
            INSERT INTO wypozyczenia (konta_id, data_wypozyczenia, data_zwrotu) 
            VALUES (?, ?, ?)
            RETURNING wypozyczenie_id;
        ');
        $stmt->execute([
            $rent->getUserId(),
            $rentDate,
            $returnDate
        ]);
        $returningValue = $stmt->fetch(PDO::FETCH_ASSOC);
        $wypozyczenie_id = $returningValue['wypozyczenie_id'];

        $stmt_findRightBike = $this->database->connect()->prepare('
                SELECT r.* FROM rowery r
                WHERE r.kategoria_id = :kategoria_id
                AND NOT EXISTS (
                            SELECT 1 FROM wypozyczenia w
                            JOIN wypozyczenia_rowery wr ON w.wypozyczenie_id = wr.wypozyczenia_id
                            WHERE wr.rowery_id = r.rower_id
                                AND (
                                (w.data_wypozyczenia BETWEEN :rentDate AND :returnDate)
                                OR (w.data_zwrotu BETWEEN :rentDate AND :returnDate)
                                OR (:rentDate BETWEEN w.data_wypozyczenia AND w.data_zwrotu)
                                OR (:returnDate BETWEEN w.data_wypozyczenia AND w.data_zwrotu)
                                )
                );
        ');
        $stmt_findRightBike->bindParam(':rentDate', $rentDate, PDO::PARAM_STR);
        $stmt_findRightBike->bindParam(':returnDate', $returnDate, PDO::PARAM_STR);

        $stmt_addToProxyTable = $this->database->connect()->prepare('
                INSERT INTO wypozyczenia_rowery (wypozyczenia_id, rowery_id) 
                VALUES (:wypozyczenie_id, :rower_id);
        ');
        $stmt_addToProxyTable->bindParam(':wypozyczenie_id', $wypozyczenie_id, PDO::PARAM_INT);

        foreach ($bikesInOrder as $bike) {
            $stmt_findRightBike->bindParam(':kategoria_id', $bike['kategoria_id'], PDO::PARAM_INT);
            $stmt_findRightBike->execute();
            $freeBike = $stmt_findRightBike->fetch(PDO::FETCH_ASSOC);

            $stmt_addToProxyTable->bindParam(':rower_id', $freeBike['rower_id'], PDO::PARAM_INT);
            $stmt_addToProxyTable->execute();
        }

        return "Wypożyczenie przebiegło poprawnie";
    }

    public function getBikeCategories(): array {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM kategorie_rowerow
        ');
        $stmt->execute();
        $bikeCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $bikeCategories;
    }

    public function getUserRents(int $user_id): array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM wypozyczenia WHERE konta_id = :user_id
        ');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $rents = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rents as $rent) {
            $result[] = new Rent(

            );
        }

        return $result;
    }
}