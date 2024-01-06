<!DOCTYPE html>

<html>
    <head>
        <title>RENT A BIKE</title>
        <link rel="stylesheet" href="public/css/main-page-style.css"/>
        <link rel="stylesheet" href="public/css/calendar.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
        <script src="public/js/calendar.js" defer></script>
    </head>

    <body>
        <nav>
            <img src="public/img/logo.svg"/>
            <ul>
                <li>Wypożyczalnia</li>
                <li>Serwis</li>
                <li>Profil</li>
                <li>Wyloguj</li>
            </ul>
        </nav>
        <main>
            <div class="header">
                <h1>Serwis</h1>
            </div>
            <section>
                <div class="note-component">
                    <h2>Opisz usterkę</h2>
                    <form class="repair-note" action="addService" method="POST" enctype="multipart/form-data">
                        <textarea name="repair-note" rows="5" placeholder="Wprowadź opis usterki"></textarea>
                        <h3>Dodaj zdjęcie (Opcjolane)</h3>
                        <input class="add-file" name="file" type="file">
                        <div class="message">
                            <?php if(isset($messages)) {
                                foreach ($messages as $message) {
                                    echo $message;
                                }
                            }
                            ?>
                        </div>
                        <button type="submit">Potwierdź</button>
                    </form>
                </div>
                <div class="calendar-section">
                    <h2>Wybierz datę</h2>
                    <div>
                        <div class="wrapper">
                            <header>
                                <p class="current-date"></p>
                                <div class="icons">
                                    <span id="prev" class="material-symbols-rounded">chevron_left</span>
                                    <span id="next" class="material-symbols-rounded">chevron_right</span>
                                </div>
                            </header>
                            <div class="calendar">
                                <ul class="weeks">
                                    <li>Pon</li>
                                    <li>Wt</li>
                                    <li>Śr</li>
                                    <li>Czw</li>
                                    <li>Pt</li>
                                    <li>Sob</li>
                                    <li>Nie</li>
                                </ul>
                                <ul class="days"></ul>
                            </div>
                        </div>
                    </div>
                    <button>Kontynuuj</button>
                </div>
            </section>
        </main>
    </body>
</html>