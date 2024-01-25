<!DOCTYPE html>

<html>
<head>
    <title>PROFIL</title>
    <link rel="stylesheet" href="public/css/profile.css"/>
    <script src="/public/js/profile.js" defer></script>
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
                <input id="name" type="text" placeholder="Imię" value="<?= $userDetails['imie'] ?? '' ?>">
                <input id="lastname" type="text" placeholder="Nazwisko" value="<?= $userDetails['nazwisko'] ?? '' ?>">
                <input id="phone" type="text" placeholder="Numer telefonu" value="<?= $userDetails['telefon'] ?? '' ?>">
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
                    <?php if(!empty($services))
                    foreach ($services as $service): ?>
                        <div class="service-section">
                            <h3><?= $service->getDescription() ?></h3>
                            <h3><?= $service->getDate() ?></h3>
                            <h3><?= $service->getPostedAt() ?></h3>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="service">
                <h2>Wypożyczone rowery</h2>
                <div class="service-reservations">
                    <div id="heading" class="service-section">
                        <h3>Wypożyczone rowery</h3>
                        <h3>Data wypożyczenia</h3>
                        <h3>Data zwrotu</h3>
                    </div>
                    <?php if(!empty($rents))
                        foreach ($rents as $rent): ?>
                            <div class="service-section">
                                <h3><?= $rent->getRentedBikesAsString(); ?></h3>
                                <h3><?= $rent->getRentDate(); ?></h3>
                                <h3><?= $rent->getReturnDate(); ?></h3>
                            </div>
                        <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

</main>
</body>
</html>