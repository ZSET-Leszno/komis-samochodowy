<?php
session_start();
function rejestracja(){
    if($_POST['haslo']!=$_POST['powtorz_haslo']){
        echo "hasła muszą być identyczne";
    }
    else{
        $conn=new mysqli('localhost', 'root', '', 'komis');
        if($conn->query('SELECT count(id_uzytkownika) from uzytkownicy where login="'.$_POST['login'].'"'))
        {
            echo "Login jest już zajęty";
        }
        elseif($var=$conn->query('SELECT * from uzytkownicy where email="'.$_POST['mail'].'"')->num_rows!=0)    
        {
            echo "Istnieje już konto dla podanego adresu e-mail";
            echo $var;
        }
        else{
            if($conn->query('INSERT INTO uzytkownicy(NULL, "'.$_POST['mail'].'", "'.$_POST['login'].'", "'.hash('sha256', $_POST['haslo']).'", "", "", ""')){
                echo "Rejestracja udana";
            }

        }
    }
}
rejestracja();
?>