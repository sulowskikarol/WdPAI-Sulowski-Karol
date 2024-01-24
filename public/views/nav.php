<!DOCTYPE html>

<html>
<head>
    <title>RENT A BIKE</title>
    <link rel="stylesheet" href="public/css/nav.css"/>
</head>

<nav>
    <img src="public/img/logo.svg"/>
    <ul>
        <li><a href="/rent">Wypożyczalnia</a></li>
        <li><a href="/service">Serwis</a></li>
        <li><a href="/profile">Profil</a></li>
        <?php
        session_start();
        if (isset($_SESSION['user_permission']) &&
            $_SESSION['user_permission'] === 'admin') {
            echo '<li><a href="/admin_panel">Panel administratora</a></li>';
        }
        ?>
        <li><a href="/logout">Wyloguj</a></li>
    </ul>
</nav>