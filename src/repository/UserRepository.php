<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User {
        $stmt = $this->database->connect()->prepare('
            SELECT konta.*, kat.nazwa_kategorii FROM konta
            join kategorie_kont kat on konta.id_kategorie_kont = kat.kategoria_id
            WHERE konta.email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['konta_id'],
            $user['email'],
            $user['haslo'],
            $user['nazwa_kategorii']
        );
    }

    public function createUser(string $email, string $password): bool {
        try {
            $stmt = $this->database->connect()->prepare('
                INSERT INTO konta (email, haslo) VALUES (?, ?)
            ');
            $stmt->execute([
                $email,
                $password
            ]);
            return true;
        }
        catch (PDOException $e) {
            echo 'Błąd podczas dodawania użytkownika do bazy danych: '.$e->getMessage();
            return false;
        }
    }

    public function getUserDetails(int $user_id): array {
        $stmt = $this->database->connect()->prepare('
            SELECT kd.*
            FROM konta k
            JOIN konta_details kd ON k.id_konta_details = kd.id
            WHERE k.konta_id = :user_id;
        ');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $user_details = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user_details == false) {
            return [];
        }

        return $user_details;
    }

    public function setUserDetails(array $user_details): array {
        $connection = $this->database->connect();
        try {
            $connection->beginTransaction();

            $userDetailsFromBase = $this->getUserDetails($user_details['user_id']);
            if (!empty($userDetailsFromBase)) {
                $stmt = $connection->prepare('
                    UPDATE konta_details
                    SET imie = ?,
                        nazwisko = ?,
                        telefon = ?
                    WHERE id = ?;
                ');
                $stmt->execute([
                   $user_details['name'],
                   $user_details['lastname'],
                   $user_details['phone'],
                   $userDetailsFromBase['id']
                ]);
                $connection->commit();
                return ['success' => true, 'response' => 'Dane użytkownika zmienione poprawnie'];
            }

            $stmt = $connection->prepare('
                INSERT INTO konta_details (imie, nazwisko, telefon) 
                VALUES (?, ?, ?)
                RETURNING id;
            ');
            $stmt->execute([
               $user_details['name'],
               $user_details['lastname'],
               $user_details['phone']
            ]);
            $id_user_details = $stmt->fetchColumn();

            $stmt = $connection->prepare('
                UPDATE konta
                SET id_konta_details = :id_user_details
                WHERE konta_id = :user_id;
            ');
            $stmt->bindParam(':id_user_details', $id_user_details, PDO::PARAM_INT);
            $stmt->bindParam('user_id', $user_details['user_id'], PDO::PARAM_INT);
            $stmt->execute();

            $connection->commit();
            return ['success' => true, 'response' => 'Dane użytkownika dodane poprawnie'];

        } catch (PDOException $e) {
            $connection->rollBack();
            echo $e->getMessage();
            return ['success' => false, 'response' => 'Błąd podczas dodawnia do bazy danych'];
        }
    }
}