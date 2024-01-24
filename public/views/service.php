<!DOCTYPE html>

<html>
    <head>
        <title>RENT A BIKE</title>
        <link rel="stylesheet" href="public/css/main-page-style.css"/>
    </head>

    <body>
        <?php include('nav.php'); ?>
        <main>
            <div class="header">
                <h1>Serwis</h1>
            </div>
            <section>
                <form class="repair-note" action="addService" method="POST" enctype="multipart/form-data">
                    <div>
                        <div class="note-component">
                            <h2>Opisz usterkę</h2>
                            <textarea name="repair-note" rows="5" placeholder="Wprowadź opis usterki"></textarea>
                        </div>
                        <div class="calendar-section">
                            <h2>Wybierz datę</h2>
                            <input class="date-field" type="date" name="date">
                            <h3>Dodaj zdjęcie (Opcjolane)</h3>
                            <input class="add-file" name="file" type="file">
                        </div>
                    </div>
                    <div class="message">
                        <?php if(isset($messages)) {
                            foreach ($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <button type="submit">Kontynuuj</button>
                </form>
            </section>
            <div class="service-reservations">
                <?php if(isset($services) && !empty($services))
                    echo '<h2>Twoje umówione serwisy</h2>';
                    foreach ($services as $service): ?>
                <div class="service-section">
                    <img src="public/img/service/<?= $service->getImage() ?>">
                    <h3>Opis usterki: <?= $service->getDescription() ?></h3>
                    <h3>Umówiony termin: <?= $service->getDate() ?></h3>
                    <h3>Data rezerwacji: <?= $service->getPostedAt() ?></h3>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </body>
</html>