<?php
require('config.php');
session_start();
function generator(){
    $str = random_bytes(15);
    $str = base64_encode($str);
    $str = str_replace(["+", "/", "="], "", $str);
    $str = substr($str, 0, 15);
    $conn=new mysqli('localhost', $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db']);
    if($conn->query("SELECT count(id) from potwierdzenia where kod='$str'")->fetch_array()[0]){
        return generator();
    }
    else{
        return $str;
    }
    $conn->close();
}
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
        <script src="https://kit.fontawesome.com/6614aa0530.js" crossorigin="anonymous"></script>

    </head>
    
    <body>
    <!---------------------------------------NAWIGACJA---------------------------------------------------------------->
        <header>
            <h1 class="logo">SpeedyMotors</h1>
            <input type="checkbox" class="nav-toggle" id="nav-toggle">
            <nav>
                <ul>
                    <li><a href="index.php">Strona Główna</a></li>
                    <li><a href="oferty.php">Oferty</a></li>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/vaakash/socializer@2f749eb/css/socializer.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
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
    <div class="lewy">
	<h4>Skontaktuj się z nami</h4>

            <p>SPEEDY MOTORS</p>
            <p>ul.Szybka 34B</p>
            <p>64-100 Leszno</p>
            <p>tel. 123-456-789</p>
            <p>email: speedykontakt@gmail.com</p><br>
            <p>NIP: 9452188455</p>
            <p>KRS 0000588626</p>
            <p>REGON: 36309630300000</p>
    </div>
    <div class="srodkowy">
            <h1 class="logo">SpeedyMotors</h1>
            <div class="socializer" data-features="32px,ribbon,opacity,icon-white,pad" data-sites="youtube,email,facebook,tiktok,pinterest" data-meta-link="" data-meta-title=""></div>
    </div>
    <div class="prawy">
                    <h4>Godziny otwarcia</h4>
                    <p>09:00-18:00 - Poniedziałek</p>
                    <p>09:00-18:00 - Wtorek</p>
                    <p>09:00-18:00 - Środa</p>
                    <p>09:00-18:00 - Czwartek</p>
                    <p>09:00-18:00 - Piątek</p>
                    <p>09:00-15:00 - Sobota</p>
                    <p>11:00-14:00 - Niedziela</p>
    </div>   
            

    </footer>
    ';
}
function rejestracja($login, $mail, $haslo, $powtorz_haslo){
    if($haslo!=$powtorz_haslo){
        return "Hasła muszą być identyczne";
    }
    elseif(strlen($haslo)<8){
        return "Hasło musi mieć przynajmniej 8 znaków!";
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
            $kod=generator();
            $conn->query('INSERT INTO potwierdzenia VALUES (NULL, "'.$kod.'", "rejestracja", "'.$login.'")');
            require("/etc/PHPMailer/PHPMailer/src/PHPMailer.php");
            require("/etc/PHPMailer/PHPMailer/src/SMTP.php");
            require("/etc/PHPMailer/PHPMailer/src/Exception.php");

            $maail = new PHPMailer\PHPMailer\PHPMailer();

            $maail->IsSMTP();
            $maail->CharSet="UTF-8";
            $maail->Host = "smtp.gmail.com"; /* Zależne od hostingu poczty*/
            $maail->SMTPDebug = 0;
            $maail->Port = 587 ; /* Zależne od hostingu poczty, czasem 587 */
            $maail->SMTPSecure = 'tsl'; /* Jeżeli ma być aktywne szyfrowanie SSL */
            $maail->SMTPAuth = true;
            $maail->IsHTML(true);
            $maail->Username = "speedymotorsinfo@gmail.com"; /* login do skrzynki email często adres*/
            $maail->Password = "lahshfschlwtdwxy"; /* Hasło do poczty */
            $maail->setFrom('speedyinfo@spoko.pl'); /* adres e-mail i nazwa nadawcy */
            $maail->AddAddress($mail); /* adres lub adresy odbiorców */
            $maail->Subject = "SpeedyMotors potwierdzenie rejestracji"; /* Tytuł wiadomości */
            $maail->Body = "Dziekujemy za utworzenie konta w naszym serwisie.<br>Aby potwierdzić rejestrację wejdź w ten link: https://detailing69.tk/logowanie.php?p=$kod";

            if(!$maail->Send()) {
            $error= "Błąd wysyłania e-maila: " . $maail->ErrorInfo;
            } else {
                $conn->query(sprintf("INSERT INTO uzytkownicy VALUES (NULL, '%s', '%s', '".password_hash($haslo, PASSWORD_DEFAULT)."', '', '', '', '0')", mysqli_real_escape_string($conn,$mail), mysqli_real_escape_string($conn,$login)));
                header("Location: logowanie.php?r=1");
                return "Rejestracja udana";
            }
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
        header("Location: index.php");
        return "elegancja i tak tego nie widać";
    }
    else{
        return 'Błędny login lub hasło';
    }
    $conn->close();
}
//sprawdza czy uzytkownik jest zalogowany i nie pozwala mu wejsc na stronę
function niewchodzic(){
    if(isset($_SESSION['id'])){
        header("Location: index.php");
    }
}
function najnowsze(){
    $conn=new mysqli('localhost', $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db']);
    $wynik=$conn->query('SELECT *, marka.id_marki, marka.nazwa as rmarka, paliwo.id, paliwo.rodzaj_paliwa as rpaliwo, model.id_modelu, model.nazwa as rmodel FROM samochody INNER JOIN marka ON marka.id_marki=samochody.marka INNER JOIN paliwo ON paliwo.id=samochody.rodzaj_paliwa INNER JOIN model ON model.id_modelu=samochody.model order by id_samochodu asc limit 4;');
    $wynik->fetch_assoc();
    $i=1;
    foreach($wynik as $w){
        $zdj=explode(";", $w['foto']);
        if($i==1){
            echo '
            <div class="oferty" id="oferta1">
            <h2>Wybrane dla Ciebie</h2>
            <div class="wrapper-oferty" >
            <div class="oferta">
            <a href="#">
                <div class="oferta-foto" style="background-image: url(img/'.$zdj[0].')"></div>
                <h4>'.$w['tytul'].'</h4>
                <p> '.$w['rmarka'].' • '.$w['rmodel'].' <br>
                '.$w['rok_produkcji'].' • '.$w['przebieg'].' km • '.$w['rpaliwo'].' • '.$w['pojemnosc_silnika'].' cm3</p>
                <span>'.$w['cena'].' PLN</span>
            </a>
            </div>
            ';
            $i++;
        }
        else{
            $zdj=explode(";", $w['foto']);
            echo '
            <div class="oferta" id="oferta'.$i.'">
            <a href="#">
            <div class="oferta-foto" style="background-image: url(img/'.$zdj[0].')"></div>
            <h4>'.$w['tytul'].'</h4>
            <p> '.$w['rmarka'].' • '.$w['rmodel'].' <br>
            '.$w['rok_produkcji'].' • '.$w['przebieg'].' km • '.$w['rpaliwo'].' • '.$w['pojemnosc_silnika'].' cm3</p>
            <span>'.$w['cena'].' PLN</span>
            </a> 
            </div>
            ';
            $i++;
        }
    }
    $conn->close();
}
function potwierdz($kod){
    $conn=new mysqli('localhost', $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db']);
    $wynik = $conn->query('SELECT *, uzytkownicy.login as login, uzytkownicy.potwierdzony FROM potwierdzenia JOIN uzytkownicy on potwierdzenia.uzytkownik=uzytkownicy.login where kod="'.$kod.'"')->fetch_assoc();
    if($wynik){
        $conn->query('UPDATE uzytkownicy SET potwierdzony = 1 where login="'.$wynik['login'].'"');
        $conn->query('UPDATE potwierdzenia SET uzytkownik = NULL where uzytkownik="'.$wynik['login'].'"');
        return 'Konto zostało potwierdzone pomyślnie!';
    }else{
        return 'Błędny kod potwierdzenia skontaktuj się z administratorem.';
    }
}
?>