<?php
require('config.php');
session_start();
function navbar(){
    if(isset($_SESSION['id'])){
        $przycisk='<a href="logowanie.php">'.$_SESSION['login'].'</a>';
    }
    else{
        $przycisk='<a href="logowanie.php">Zaloguj/Zarejestruj się</a>';
    }
    return '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SpeedyMotors</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/vaakash/socializer@2f749eb/css/socializer.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
        <link rel="icon" type="image/x-icon" href="favicon.png">
    </head>
    
    <body>
    <!---------------------------------------NAWIGACJA---------------------------------------------------------------->
        <header>
            <h1 class="logo">SpeedyMotors</h1>
            <input type="checkbox" class="nav-toggle" id="nav-toggle">
            <nav>
                <ul>
                    <li><a href="#">Strona Główna</a></li>
                    <li><a href="#">Oferty</a></li>
                    <li><a href="#">Sprzedaj</a></li>
                    <li><a href="#">O nas</a></li>
                    <li>'.$przycisk.'</li>
                  </ul>
            </nav>
            <label for="nav-toggle" class="nav-toggle-label">
                <span></span>
            </label>
        </header>
    <!------------------------------------------------------------------------------------------------------->
    ';
}
function navlogowanie(){
    return '
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
        <a href="index.php"><h1 class="logo">SpeedyMotors</h1></a>
        </div>
    ';
}
function stopka(){
    return '
    <footer>
    <div class="stopka">
        <div class="stopka-lewy">
            <h4>Skontaktuj się z nami</h4>
            <hr>
            <p>SPEEDY MOTORS</p>
            <p>ul.Szybka 34B</p>
            <p>64-100 Leszno</p>
            <p>tel. 123-456-789</p>
            <p>email: speedykontakt@gmail.com</p><br>
            <p>NIP: 9452188455</p>
            <p>KRS 0000588626</p>
            <p>REGON: 36309630300000</p>
            </div>
            <div class="stopka-prawy">
                <h4>Godziny otwarcia</h4>
                <hr>
               <p>09:00-18:00 - Poniedziałek</p>
               <p>09:00-18:00 - Wtorek</p>
                <p>09:00-18:00 - Środa</p>
                <p>09:00-18:00 - Czwartek</p>
                <p>09:00-18:00 - Piątek</p>
                <p>09:00-15:00 - Sobota</p>
                <p>11:00-14:00 - Niedziela</p>
            </div>
            <br><br><div class="socializer" data-features="32px,ribbon,opacity,icon-white,pad" data-sites="youtube,email,facebook,tiktok,pinterest" data-meta-link="" data-meta-title="">
        </div>
    </div>
    </footer>
    ';
}
function rejestracja($login, $mail, $haslo, $powtorz_haslo){
    if($haslo!=$powtorz_haslo){
        return "Hasła muszą być identyczne";
    }
    else{
        $conn=new mysqli('localhost', $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db']);
        if($conn->query(sprintf("SELECT count(id_uzytkownika) from uzytkownicy where login='%s'", mysqli_real_escape_string($conn,$login)))->fetch_array()[0])
        {
            return "Login jest już zajęty";
        }
        elseif($conn->query(sprintf("SELECT count(id_uzytkownika) from uzytkownicy where email='%s'", mysqli_real_escape_string($conn,$mail)))->fetch_array()[0])    
        {
            return "Istnieje już konto dla podanego adresu e-mail";
        }
        else{
            $conn->query(sprintf("INSERT INTO uzytkownicy VALUES (NULL, '%s', '%s', '".password_hash($haslo, PASSWORD_DEFAULT)."', '', '', '')", mysqli_real_escape_string($conn,$mail), mysqli_real_escape_string($conn,$login)));
            return "Rejestracja udana";
        }
        $conn->close();
    }
}
function logowanie($login, $haslo){
    $conn=new mysqli('localhost', $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db']);
    if(($conn->query(sprintf("SELECT count(id_uzytkownika) from uzytkownicy where login='%s'", mysqli_real_escape_string($conn,$login)))->fetch_array()[0]) && password_verify($haslo, ($conn->query(sprintf("SELECT haslo from uzytkownicy where login='%s'", mysqli_real_escape_string($conn,$login)))->fetch_array()[0])))
    {
        $_SESSION['login']=$login;
        $_SESSION['id']=$conn->query(sprintf("SELECT id_uzytkownika from uzytkownicy where login='%s'", mysqli_real_escape_string($conn,$login)))->fetch_array()[0];
        return "elegancja i tak tego nie widać";
    }
    else{
        return 'Błędny login lub hasło';
    }
    $conn->close();
}
?>