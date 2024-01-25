<!DOCTYPE html>

<html>
    <head>
        <title>RENT A BIKE</title>
        <link rel="stylesheet" href="public/css/main-page-style.css"/>
        <script src="/public/js/rent.js" defer></script>
    </head>

    <body>
        <?php include('nav.php'); ?>
        <main>
            <div class="header">
                <h1>Wypożyczalnia</h1>
            </div>
            <section>
                <div class="bike-section">
                    <h2>Wybierz rower</h2>
                    <div class="bike-gallery"></div>
                </div>
                <div class="calendar-section">
                    <h2>Wybierz datę</h2>
                    <div class="date-fields">
                        <div class="date-field">
                            <h3>Data wypożyczenia</h3>
                            <input id="rent-start" type="date">
                        </div>
                        <div class="date-field">
                            <h3>Data zwrotu</h3>
                            <input id="rent-end" type="date">
                        </div>
                    </div>
                    <h2>Rowery w Twojej rezerwacji</h2>
                    <div class="order"></div>
                    <button>Kontynuuj</button>
                </div>
            </section>
        </main>
    </body>
</html>