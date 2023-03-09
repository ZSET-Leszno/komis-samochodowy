<?php
session_start();
function rejestracja(){
    if($_POST['haslo']!=$_POST['powtorz_haslo']){
        echo "hasła muszą być identyczne";
    }
    else{
        $conn=new mysqli('localhost', 'root', '', 'komis');
        if($conn->query('SELECT count(id_uzytkownika) from uzytkownicy where login="'.$_POST['login'].'"')->fetch_array()[0])
        {
            echo "Login jest już zajęty";
        }
        elseif($conn->query('SELECT count(id_uzytkownika) from uzytkownicy where email="'.$_POST['mail'].'"')->fetch_array()[0])    
        {
            echo "Istnieje już konto dla podanego adresu e-mail";
        }
        else{
            $conn->query('INSERT INTO uzytkownicy VALUES (NULL, "'.$_POST['mail'].'", "'.$_POST['login'].'", "'.hash('sha256', $_POST['haslo']).'", "", "", "")');
            echo "Rejestracja udana";
        }
    }
}
rejestracja();
?>