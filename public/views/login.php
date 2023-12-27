<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="public/css/style.css"/>
    <title>LOGIN PAGE</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg"/>
        </div>
        <div class="login-container">
            <h1>Logowanie</h1>
            <form action='login' method="POST">
                <input name="email" type="text" placeholder="Podaj adres email"/>
                <input name="password" type="password" placeholder="Podaj hasło"/>
                <div class="message">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <button class="button-login" type="submit">ZALOGUJ</button>
                <button class="button-register">ZAREJESTRUJ</button>
            </form>
        </div>
    </div>
</body>