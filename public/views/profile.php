<!DOCTYPE html>

<html>
<head>
    <title>PROFIL</title>
    <link rel="stylesheet" href="public/css/profile.css"/>
</head>

<body>
<?php include('nav.php'); ?>
<main>
    <div class="header">
        <h1>Profil</h1>
    </div>
    <section>
        <div class="left-column">
            <h2>Edytuj dane osobowe</h2>
            <div class="data-form">
                <input id="name" type="text" placeholder="Imię">
                <input id="lastname" type="text" placeholder="Nazwisko">
                <input id="phone" type="text" placeholder="Numer telefonu">
            </div>
            <button id="submit">Zapisz zmiany</button>
        </div>
        <div class="right-column">
            <div class="service">
                <h2>Umówione serwisy</h2>
                <div class="service-reservations">
                    <div id="heading" class="service-section">
                        <h3>Opis usterki</h3>
                        <h3>Umówiony termin</h3>
                        <h3>Data rezerwacji</h3>
                    </div>
                    <?php if(isset($services) && !empty($services))
                    foreach ($services as $service): ?>
                        <div class="service-section">
                            <h3><?= $service->getDescription() ?></h3>
                            <h3><?= $service->getDate() ?></h3>
                            <h3><?= $service->getPostedAt() ?></h3>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="rent-reservations">
                <h2>Wypożyczone rowery</h2>
            </div>
        </div>
    </section>

</main>
</body>
</html>