<?php
include ('funkcje.php');
if(isset($_GET['marka'])){
    filtruj();
}elseif(isset($_GET['model'])){
    modele();
}
elseif(isset($_GET['logout'])){
    logout();
    header('Location: index.php');
}
?>