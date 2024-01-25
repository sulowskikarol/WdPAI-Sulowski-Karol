<!DOCTYPE html>

<html>
    <head>
        <title>REGISTER PAGE</title>
        <link rel="stylesheet" href="public/css/style.css"/>
        <script type="text/javascript" src="public/js/register.js" defer></script>
    </head>

    <body>
        <div class="container">
            <div class="logo">
                <img src="public/img/logo.svg"/>
            </div>
            <div class="login-container">
                <h1>Rejestracja</h1>
                <form action="register" method="POST">
                    <input name="email" type="text" placeholder="Podaj adres email"/>
                    <input
                            name="password"
                            type="password"
                            placeholder="Podaj hasło"
                            title="Hasło powinno zawierać co najmniej 8 znaków, w tym małe i wielkie litery oraz cyfry."
                    />
                    <input name="c_password" type="password" placeholder="Potwierdź hasło"/>
                    <div class="message">
                        <?php if(isset($messages)) {
                            foreach ($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <button class="button-login" type="submit">ZAREJESTRUJ</button>
                    <p>Masz już konto? <a href="/login">Zaloguj się</a></p>
                </form>
            </div>
        </div>
    </body>
</html>