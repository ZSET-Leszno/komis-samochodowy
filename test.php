<?php
include ('funkcje.php');
if(isset($_GET['marka'])){
    filtruj();
}elseif(isset($_GET['model'])){
    modele();
}
?>