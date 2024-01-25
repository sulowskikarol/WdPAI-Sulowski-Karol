# Aplikacja dla wypożyczalni i serwisu rowerów

Aplikacja pozwala zarządzać działaniem wypożyczalni rowerów. Umożliwia użytkownikom rezerwację rowerów w wybranym terminie oraz umówienie się do serwisu.

## Instalacja

1. Upewnij się, że masz zainstalowanego Dockera.
2. Sklonuj repozytorium za pomocą polecenia:

```bash
git clone "https://github.com/sulowskikarol/WdPAI-Sulowski-Karol.git"
```

3. Przejdź do głównego katalogu projektu.
4. Uruchom Dockera poprzez polecenie:

```bash
docker-compose build
```

## Uruchomienie

1. Po zakończeniu procesu instalacji, uruchom przeglądarkę internetową.
2. W pasku adresu wpisz:

```
localhost:8080
```

## Struktura katalogów

- **/**: Główny katalog projektu zawierający pliki konfiguracyjne oraz plik index.php.
- **/docker**: Pliki konfiguracyjne Dockera.
- **/public/css**: Style CSS dla widoków.
- **/public/img**: Zdjęcia wykorzystywane w aplikacji.
- **/public/js**: Skrypty JavaScript.
- **/public/views**: Widoki aplikacji w formacie PHP.
- **/src/controllers**: Kontrolery obsługujące żądania URL.
- **/src/models**: Klasy PHP opisujące modele danych.
- **/src/repository**: Repozytoria przeprowadzające operacje na bazie danych.

## Autor

Karol Sulowski

