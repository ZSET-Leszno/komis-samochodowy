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
        $sell='<li><a href="sprzedaj.php">Sprzedaj</a></li>';
    }
    else{
        $przycisk='<a href="logowanie.php">Zaloguj/Zarejestruj się</a>';
        $sell='';
    }
    return '
    <!DOCTYPE html>
    <html lang="pl">
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
                    '.$sell.'
                    <li><a href="onas.php">O nas</a></li>
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
    <html lang="pl">
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
        return '<span id="zle">Hasła muszą być identyczne</span>';
    }
    elseif(strlen($haslo)<8){
        return '<span id="zle">Hasło musi mieć przynajmniej 8 znaków!</span>';
    }
    else{
        $conn=new mysqli('localhost', $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db']);
        if($conn->query(sprintf("SELECT count(id_uzytkownika) from uzytkownicy where login='%s'", mysqli_real_escape_string($conn,$login)))->fetch_array()[0])
        {
            return '<span id="zle">Login jest już zajęty</span>';
        }
        elseif($conn->query(sprintf("SELECT count(id_uzytkownika) from uzytkownicy where email='%s'", mysqli_real_escape_string($conn,$mail)))->fetch_array()[0])    
        {
            return '<span id="zle">Istnieje już konto dla podanego adresu e-mail</span>';
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
            $maail->Password = "yughfpmtczvlazhw"; /* Hasło do poczty */
            $maail->setFrom('speedymotorsinfo@gmail.com'); /* adres e-mail i nazwa nadawcy */
            $maail->AddAddress($mail); /* adres lub adresy odbiorców */
            $maail->Subject = "SpeedyMotors potwierdzenie rejestracji"; /* Tytuł wiadomości */
            $maail->Body = "Dziekujemy za utworzenie konta w naszym serwisie.<br>Aby potwierdzić rejestrację wejdź w ten link: 158.101.171.163/logowanie.php?p=$kod";

            if(!$maail->Send()) {
            $error= "Błąd wysyłania e-maila: " . $maail->ErrorInfo;
            } else {
                $conn->query(sprintf("INSERT INTO uzytkownicy VALUES (NULL, '%s', '%s', '".password_hash($haslo, PASSWORD_DEFAULT)."', '', '', '', '0')", mysqli_real_escape_string($conn,$mail), mysqli_real_escape_string($conn,$login)));
                header("Location: logowanie.php?r=1");
                return '<span id="dobre">Rejestracja udana</span>';
            }
        }
        $conn->close();
    }
}
function logowanie($login, $haslo){
    $conn=new mysqli('localhost', $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db']);
    if(($conn->query(sprintf("SELECT count(id_uzytkownika) from uzytkownicy where login='%s'", mysqli_real_escape_string($conn,$login)))->fetch_array()[0]) && password_verify($haslo, ($conn->query(sprintf("SELECT haslo from uzytkownicy where login='%s'", mysqli_real_escape_string($conn,$login)))->fetch_array()[0])))
    {
        if($conn->query(sprintf("SELECT potwierdzony from uzytkownicy where login='%s'", mysqli_real_escape_string($conn,$login)))->fetch_array()[0]==0){
            return '<span id="zle">Aby się zalogować musisz potwierdzić swój adres e-mail.</span>';
        }
        else{
            $_SESSION['login']=$login;
            $_SESSION['id']=$conn->query(sprintf("SELECT id_uzytkownika from uzytkownicy where login='%s'", mysqli_real_escape_string($conn,$login)))->fetch_array()[0];
            header("Location: index.php");
            return "elegancja i tak tego nie widać";
        }
    }
    else{
        return '<span id="zle">Błędny login lub hasło!</span>';
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
    $wynik=$conn->query('SELECT *, marka.id_marki, marka.nazwa as rmarka, paliwo.id, paliwo.rodzaj_paliwa as rpaliwo, model.id_modelu, model.nazwa as rmodel FROM samochody INNER JOIN marka ON marka.id_marki=samochody.marka INNER JOIN paliwo ON paliwo.id=samochody.rodzaj_paliwa INNER JOIN model ON model.id_modelu=samochody.model order by id_samochodu desc limit 4;');
    $wynik->fetch_assoc();
    $i=1;
    foreach($wynik as $w){
        $zdj=explode(";", $w['foto']);
        if($i==4){
            echo '
            <div class="auta-card ostatni" onclick="location.href = \'auto-szczegoly.php\'">
                <div class="auta-image" style="background-image:url(img/'.$zdj[0].');"></div>
                <div class="auta-info">
                    <h2>'.$w['tytul'].'</h2>
                    <section>
                        <ul>
                            <li><span>'.$w['rok_produkcji'].'</span></li>
                            <li><span>'.number_format($w['przebieg'], 0, '.', ' ').' km</span></li>
                        </ul>
                        <ul>
                            <li><span>'.$w['rpaliwo'].'</span></li>
                            <li><span>'.$w['pojemnosc_silnika'].' cm3</span></li>
                        </ul>
                    </section>
                </div>
                <div class="auto-cena">
                    <p>'.number_format($w['cena'], 0, '.', ' ').' zł</p>
                </div>
            </div>
            ';
            $i++;
        }
        elseif($i==3){
            echo '
            <div class="auta-card przedostatni" onclick="location.href = \'auto-szczegoly.php\'">
                <div class="auta-image" style="background-image:url(img/'.$zdj[0].');"></div>
                <div class="auta-info">
                    <h2>'.$w['tytul'].'</h2>
                    <section>
                        <ul>
                            <li><span>'.$w['rok_produkcji'].'</span></li>
                            <li><span>'.number_format($w['przebieg'], 0, '.', ' ').' km</span></li>
                        </ul>
                        <ul>
                            <li><span>'.$w['rpaliwo'].'</span></li>
                            <li><span>'.$w['pojemnosc_silnika'].' cm3</span></li>
                        </ul>
                    </section>
                </div>
                <div class="auto-cena">
                    <p>'.number_format($w['cena'], 0, '.', ' ').' zł</p>
                </div>
            </div>
            ';
            $i++;
        }
        else{
            $zdj=explode(";", $w['foto']);
            echo '
            <div class="auta-card" onclick="location.href = \'oferty.php\'">
                <div class="auta-image" style="background-image:url(img/'.$zdj[0].');"></div>
                <div class="auta-info">
                    <h2>'.$w['tytul'].'</h2>
                    <section>
                        <ul>
                            <li><span>'.$w['rok_produkcji'].'</span></li>
                            <li><span>'.number_format($w['przebieg'], 0, '.', ' ').' km</span></li>
                        </ul>
                        <ul>
                            <li><span>'.$w['rpaliwo'].'</span></li>
                            <li><span>'.$w['pojemnosc_silnika'].' cm3</span></li>
                        </ul>
                    </section>
                </div>
                <div class="auto-cena">
                    <p>'.number_format($w['cena'], 0, '.', ' ').' zł</p>
                </div>
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
        return '<span id="dobre">Konto zostało potwierdzone pomyślnie!</span>';
    }else{
        return '<span id="zle">Błędny kod potwierdzenia skontaktuj się z administratorem.</span>';
    }
}
function filtruj(){
    $str='SELECT *, marka.id_marki, marka.nazwa as rmarka, paliwo.id, paliwo.rodzaj_paliwa as rpaliwo, model.id_modelu, model.nazwa as rmodel, kolor.id_koloru, kolor.kolor as rkolor, pochodzenie.id_kraju, pochodzenie.kraj AS rpochodzenie, stan.id_stanu, stan.stan_auta as rstan FROM samochody INNER JOIN marka ON marka.id_marki=samochody.marka INNER JOIN paliwo ON paliwo.id=samochody.rodzaj_paliwa INNER JOIN model ON model.id_modelu=samochody.model INNER JOIN kolor ON kolor.id_koloru=samochody.kolor INNER JOIN pochodzenie ON pochodzenie.id_kraju=samochody.pochodzenie INNER JOIN stan ON stan.id_stanu=samochody.stan where 1';
    //marka
    if(isset($_GET['marka'])&&$_GET['marka']!=''){
        $str.=' and marka.id_marki="'.$_GET['marka'].'"';
    }
    //model
    if(isset($_GET['model'])&&$_GET['model']!=''){
        $str.=' and model.id_modelu="'.$_GET['model'].'"';
    }
    //rok produkcji
    if(isset($_GET['min_rok'])&&isset($_GET['max_rok'])&&$_GET['min_rok']!=''&&$_GET['max_rok']!=''){
        $str.=' and rok_produkcji between '.$_GET['min_rok'].' and '.$_GET['max_rok'];
    }elseif(isset($_GET['min_rok'])&&isset($_GET['max_rok'])&&$_GET['min_rok']==''&&$_GET['max_rok']!=''){
        $str.=' and rok_produkcji <= '.$_GET['max_rok'];
    }elseif(isset($_GET['min_rok'])&&isset($_GET['max_rok'])&&$_GET['min_rok']!=''&&$_GET['max_rok']==''){
        $str.=' and rok_produkcji >= '.$_GET['min_rok'];
    }
    //cena
    if(isset($_GET['min_cena'])&&isset($_GET['max_cena'])&&$_GET['min_cena']!=''&&$_GET['max_cena']!=''){
        $str.=' and cena between '.$_GET['min_cena'].' and '.$_GET['max_cena'];
    }elseif(isset($_GET['min_cena'])&&isset($_GET['max_cena'])&&$_GET['min_cena']==''&&$_GET['max_cena']!=''){
        $str.=' and cena <= '.$_GET['max_cena'];
    }elseif(isset($_GET['min_cena'])&&isset($_GET['max_cena'])&&$_GET['min_cena']!=''&&$_GET['max_cena']==''){
        $str.=' and cena >= '.$_GET['min_cena'];
    }
    //pojemność silnika
    if(isset($_GET['min_silnik'])&&isset($_GET['max_silnik'])&&$_GET['min_silnik']!=''&&$_GET['max_silnik']!=''){
        $str.=' and pojemnosc_silnika between '.$_GET['min_silnik'].' and '.$_GET['max_silnik'];
    }elseif(isset($_GET['min_silnik'])&&isset($_GET['max_silnik'])&&$_GET['min_silnik']==''&&$_GET['max_silnik']!=''){
        $str.=' and pojemnosc_silnika <= '.$_GET['max_silnik'];
    }elseif(isset($_GET['min_silnik'])&&isset($_GET['max_silnik'])&&$_GET['min_silnik']!=''&&$_GET['max_silnik']==''){
        $str.=' and pojemnosc_silnika >= '.$_GET['min_silnik'];
    }
    //kolor
    if(isset($_GET['kolor'])&&$_GET['kolor']!=''){
        $str.=' and kolor.id_koloru="'.$_GET['kolor'].'"';
    }
    //przebieg
    if(isset($_GET['min_przebieg'])&&isset($_GET['max_przebieg'])&&$_GET['min_przebieg']!=''&&$_GET['max_przebieg']!=''){
        $str.=' and przebieg between '.$_GET['min_przebieg'].' and '.$_GET['max_przebieg'];
    }elseif(isset($_GET['min_przebieg'])&&isset($_GET['max_przebieg'])&&$_GET['min_przebieg']==''&&$_GET['max_przebieg']!=''){
        $str.=' and przebieg <= '.$_GET['max_przebieg'];
    }elseif(isset($_GET['min_przebieg'])&&isset($_GET['max_przebieg'])&&$_GET['min_przebieg']!=''&&$_GET['max_przebieg']==''){
        $str.=' and przebieg >= '.$_GET['min_przebieg'];
    }
    //stan
    if(isset($_GET['stan'])&&$_GET['stan']!=''){
        $str.=' and stan.id_stanu="'.$_GET['stan'].'"';
    }
    $conn=new mysqli('localhost', $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db']);
    if($wynik=$conn->query($str)){
        if(($wynik->num_rows)==0){
            echo 'Przepraszamy, ale nie znaleziono samochodów o podanych kryteriach';
        }
        while($tablica=$wynik->fetch_assoc()){
        $zdjecia=explode(';', $tablica['foto']);
        echo '
        <div class="auta-card">
            <div class="auta-image" style="background-image:url(img/'.$zdjecia[0].');"></div>
            <div class="auta-info">
                <h2>'.$tablica['tytul'].'</h2>
                <section>
                    <ul>
                        <li><span>'.$tablica['rok_produkcji'].'</span></li>
                        <li><span>'.number_format($tablica['przebieg'], 0, '.', ' ').' km</span></li>
                    </ul>
                    <ul>
                        <li><span>'.$tablica['rpaliwo'].'</span></li>
                        <li><span>'.$tablica['pojemnosc_silnika'].' cm3</span></li>
                    </ul>
                </section>
            </div>
            <div class="auto-cena">
                <p>'.number_format($tablica['cena'], 0, '.', ' ').' zł</p>
            </div>
        </div>
        ';
        }
    }
    else{
        echo $conn->error;
    }
    $conn->close();
}
function marki(){
    $conn=new mysqli('localhost', $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db']);
    $str='';
    $query=$conn->query('SELECT * FROM marka');
    while($wynik=$query->fetch_assoc()){
        $ilosc=$conn->query('SELECT count(id_samochodu) FROM samochody where marka="'.$wynik['id_marki'].'"')->fetch_array()[0];
        $selected='';
        if($_GET['marka']==$wynik['id_marki']){
            $selected='selected';
        }
        $str.='<option '.$selected.' value="'.$wynik['id_marki'].'">'.$wynik['nazwa'].' ('.$ilosc.')</option>';
    }
    $conn->close();
    return $str;
}
function modele(){
    $conn=new mysqli('localhost', $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db']);
    $str='<option value="">Wszystkie</option>';
    $query=$conn->query('SELECT model.nazwa, model.id_modelu, model.id_marki, COUNT(id_samochodu) as ilosc from model LEFT join samochody on model.id_modelu=samochody.model where id_marki="'.$_GET['model'].'" GROUP BY model.id_modelu ORDER by ilosc DESC;');
    while($wynik=$query->fetch_assoc()){
        $ilosc=$wynik['ilosc'];
        if($ilosc){
        $str.='<option value="'.$wynik['id_modelu'].'">'.$wynik['nazwa'].' ('.$ilosc.')</option>';
        }
        else{
            $str.='<option value="'.$wynik['id_modelu'].'">'.$wynik['nazwa'].'</option>';
        }
    }
    $conn->close();
    echo $str;
}
function kolory(){
    $conn=new mysqli('localhost', $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db']);
    $str='';
    $query=$conn->query('SELECT * FROM kolor');
    while($wynik=$query->fetch_assoc()){
        $str.='<option value="'.$wynik['id_koloru'].'">'.$wynik['kolor'].'</option>';
    }
    $conn->close();
    return $str;
}
function stany(){
    $conn=new mysqli('localhost', $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db']);
    $str='';
    $query=$conn->query('SELECT * FROM stan');
    while($wynik=$query->fetch_assoc()){
        $str.='<option value="'.$wynik['id_stanu'].'">'.$wynik['stan_auta'].'</option>';
    }
    $conn->close();
    return $str;
}
function ilosc_aut(){
    $conn=new mysqli('localhost', $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db']);
    $ilosc=$conn->query('SELECT count(id_samochodu) as ilosc from samochody')->fetch_array();
    return $ilosc['ilosc'];
}
function zalogowani(){
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
}
function sprzedaj(){
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
    $maail->Password = "yughfpmtczvlazhw"; /* Hasło do poczty */
    $maail->setFrom('speedymotorsinfo@gmail.com'); /* adres e-mail i nazwa nadawcy */
    $maail->AddAddress('speedymotorsinfo@gmail.com'); /* adres lub adresy odbiorców */
    $maail->Subject = "Nowe ogłoszenie sprzedaży"; /* Tytuł wiadomości */
    $maail->Body = 'Użytkownik '.$_SESSION['login'].' wysłał nową ofertę sprzedaży.<br>
    Szczegóły oferty:<br>
    Marka: '.$_POST['marka'].' '.$_POST['model'].'<br>
    Moc: '.$_POST['moc'].' Rok: '.$_POST['rok'].'<br>
    Pojemność: '.$_POST['pojemnosc'].'<br>
    <b>'.$_POST['cenka'].' PLN</b>
    ';

    if(!$maail->Send()) {
    $error= "Błąd wysyłania e-maila: " . $maail->ErrorInfo;
    } else {
        return '<span id="dobre">Wiadomość została wysłana. Skontaktujemy się z tobą wkrótce.</span>';
    }
}
?>