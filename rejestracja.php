<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpeedyMotors</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
</head>
<body>
    <div class="nav-logowanie">
    <a href="index.html"><h1 class="logo">SpeedyMotors</h1></a>
    </div>
    <div class="panel">
        <div class="logo-foto">
        </div>
        <div class="rejest-form">
            <form method="POST" action="funkcje.php">
                <h3>Zarejestruj się</h3>
                <input class="log-input" name="login" id="login" placeholder="Podaj login" required><br>
                <input type="email" class="log-input" name="mail" id="haslo"placeholder="Podaj email" required><br>
                <input type="password" class="log-input" name="haslo" id="haslo"placeholder="Podaj hasło" required><br>
                <input type="password" class="log-input" name="powtorz_haslo" id="haslo"placeholder="Powtórz hasło" requidred><br>
                <div class="zgody">
                <input type="checkbox" class="zgoda" required><span>Oświadczam, iż zapoznałem się z treścią Regulaminu.<br><br></span>
                <input type="checkbox" class="zgoda" required><span>Akceptuję politykę przetwarzania danych osobowych.</span>
                </div>
                <button type="submit" name="zarejestruj" class="przycisk">ZAREJESTRUJ SIĘ</button><br><br>
                <p>Masz już konto? <a href="logowanie.php">Zaloguj się</a></p>
            </form>
        </div>
    </div>
</body>
</html>