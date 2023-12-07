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
                <h1>Wypożyczalnia</h1>
            </div>
            <section>
                <div class="bike-component">
                    <h2>Wybierz rower</h2>
                    <div class="bike-gallery">
                        <bike-button id="miejskie">
                            <img src="public/img/uploads/miejskie.webp"/>
                            <sign>Miejskie</sign>
                        </bike-button>
                        <bike-button id="elektryczne">
                            <img src="public/img/uploads/elektryczne.webp"/>
                            <sign>Elektryczne</sign>
                        </bike-button>
                        <bike-button id="górskie">
                            <img src="public/img/uploads/górskie.webp"/>
                            <sign>Górskie</sign>
                        </bike-button>
                        <bike-button id="dziecięce">
                            <img src="public/img/uploads/dziecięce.webp"/>
                            <sign>Dziecięce</sign>
                        </bike-button>
                        <bike-button id="szosowe">
                            <img src="public/img/uploads/szosowe.webp"/>
                            <sign>Szosowe</sign>
                        </bike-button>
                        <bike-button id="gravelowe">
                            <img src="public/img/uploads/gravelowe.webp"/>
                            <sign>Gravelowe</sign>
                        </bike-button>
                    </div>
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