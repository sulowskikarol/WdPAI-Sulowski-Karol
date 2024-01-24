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
}