<?php
session_start();
function rejestracja(){
    if($_POST['haslo']!=$_POST['powtorz_haslo']){
        echo "hasła muszą być identyczne";
    }
    else{
        $conn=new mysqli('localhost', 'root', '', 'komis');
        if($conn->query('SELECT * '))
    }
}
rejestracja();
?>