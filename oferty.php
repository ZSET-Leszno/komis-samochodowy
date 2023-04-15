<?php
    require('funkcje.php');
    echo navbar();
?>
<div class="main">
    <div class="lista">
        <div class="filtry">
            <div class="filter">
                <h4>Marka:</h4>
                <select onfocusout="filtr('marka='+document.getElementById('filter-marka').value+'&model='+document.getElementById('filter-model').value+'&min_rok='+document.getElementById('min_rok').value+'&max_rok='+document.getElementById('max_rok').value+'&min_cena='+document.getElementById('min_cena').value+'&max_cena='+document.getElementById('max_cena').value+'&min_silnik='+document.getElementById('min_silnik').value+'&max_silnik='+document.getElementById('max_silnik').value+'&min_przebieg='+document.getElementById('min_przebieg').value+'&max_przebieg='+document.getElementById('max_przebieg').value+'&kolor='+document.getElementById('filter-kolor').value+'&stan='+document.getElementById('filter-kolor stan').value); modele()" name="marka" id="filter-marka">
                    <option value="" selected disabled hidden>-Wszystkie-</option>
                    <option value="">Wszystkie</option>
                    <?php echo marki();?>
                </select>
            </div>
            <div class="filter">
                <h4>Model:</h4>
                <select disabled onfocusout="filtr('marka='+document.getElementById('filter-marka').value+'&model='+document.getElementById('filter-model').value+'&min_rok='+document.getElementById('min_rok').value+'&max_rok='+document.getElementById('max_rok').value+'&min_cena='+document.getElementById('min_cena').value+'&max_cena='+document.getElementById('max_cena').value+'&min_silnik='+document.getElementById('min_silnik').value+'&max_silnik='+document.getElementById('max_silnik').value+'&min_przebieg='+document.getElementById('min_przebieg').value+'&max_przebieg='+document.getElementById('max_przebieg').value+'&kolor='+document.getElementById('filter-kolor').value+'&stan='+document.getElementById('filter-kolor stan').value)" name="model" id="filter-model">
                    <option value="" selected disabled hidden>-Wszystkie-</option>
                </select>
            </div>
            <div class="filter">
                <h4>Cena:</h4>
                <input type="number" onfocusout="filtr('marka='+document.getElementById('filter-marka').value+'&model='+document.getElementById('filter-model').value+'&min_rok='+document.getElementById('min_rok').value+'&max_rok='+document.getElementById('max_rok').value+'&min_cena='+document.getElementById('min_cena').value+'&max_cena='+document.getElementById('max_cena').value+'&min_silnik='+document.getElementById('min_silnik').value+'&max_silnik='+document.getElementById('max_silnik').value+'&min_przebieg='+document.getElementById('min_przebieg').value+'&max_przebieg='+document.getElementById('max_przebieg').value+'&kolor='+document.getElementById('filter-kolor').value+'&stan='+document.getElementById('filter-kolor stan').value)" name="min_cena" id="min_cena" placeholder="OD">
                <input type="number" onfocusout="filtr('marka='+document.getElementById('filter-marka').value+'&model='+document.getElementById('filter-model').value+'&min_rok='+document.getElementById('min_rok').value+'&max_rok='+document.getElementById('max_rok').value+'&min_cena='+document.getElementById('min_cena').value+'&max_cena='+document.getElementById('max_cena').value+'&min_silnik='+document.getElementById('min_silnik').value+'&max_silnik='+document.getElementById('max_silnik').value+'&min_przebieg='+document.getElementById('min_przebieg').value+'&max_przebieg='+document.getElementById('max_przebieg').value+'&kolor='+document.getElementById('filter-kolor').value+'&stan='+document.getElementById('filter-kolor stan').value)" name="max_cena" id="max_cena" placeholder="DO">
            </div>
            <div class="filter">
                <h4>Rok produkcji:</h4>
                <input type="number" onfocusout="filtr('marka='+document.getElementById('filter-marka').value+'&model='+document.getElementById('filter-model').value+'&min_rok='+document.getElementById('min_rok').value+'&max_rok='+document.getElementById('max_rok').value+'&min_cena='+document.getElementById('min_cena').value+'&max_cena='+document.getElementById('max_cena').value+'&min_silnik='+document.getElementById('min_silnik').value+'&max_silnik='+document.getElementById('max_silnik').value+'&min_przebieg='+document.getElementById('min_przebieg').value+'&max_przebieg='+document.getElementById('max_przebieg').value+'&kolor='+document.getElementById('filter-kolor').value+'&stan='+document.getElementById('filter-kolor stan').value)" name="min_rok" id="min_rok" placeholder="OD">
                <input type="number" onfocusout="filtr('marka='+document.getElementById('filter-marka').value+'&model='+document.getElementById('filter-model').value+'&min_rok='+document.getElementById('min_rok').value+'&max_rok='+document.getElementById('max_rok').value+'&min_cena='+document.getElementById('min_cena').value+'&max_cena='+document.getElementById('max_cena').value+'&min_silnik='+document.getElementById('min_silnik').value+'&max_silnik='+document.getElementById('max_silnik').value+'&min_przebieg='+document.getElementById('min_przebieg').value+'&max_przebieg='+document.getElementById('max_przebieg').value+'&kolor='+document.getElementById('filter-kolor').value+'&stan='+document.getElementById('filter-kolor stan').value)" name="max_rok" id="max_rok" placeholder="DO">
            </div>
            <div class="filter">
                <h4>Pojemność silnika:</h4>
                <input type="number" onfocusout="filtr('marka='+document.getElementById('filter-marka').value+'&model='+document.getElementById('filter-model').value+'&min_rok='+document.getElementById('min_rok').value+'&max_rok='+document.getElementById('max_rok').value+'&min_cena='+document.getElementById('min_cena').value+'&max_cena='+document.getElementById('max_cena').value+'&min_silnik='+document.getElementById('min_silnik').value+'&max_silnik='+document.getElementById('max_silnik').value+'&min_przebieg='+document.getElementById('min_przebieg').value+'&max_przebieg='+document.getElementById('max_przebieg').value+'&kolor='+document.getElementById('filter-kolor').value+'&stan='+document.getElementById('filter-kolor stan').value)" name="min_silnik" id="min_silnik" placeholder="OD">
                <input type="number" onfocusout="filtr('marka='+document.getElementById('filter-marka').value+'&model='+document.getElementById('filter-model').value+'&min_rok='+document.getElementById('min_rok').value+'&max_rok='+document.getElementById('max_rok').value+'&min_cena='+document.getElementById('min_cena').value+'&max_cena='+document.getElementById('max_cena').value+'&min_silnik='+document.getElementById('min_silnik').value+'&max_silnik='+document.getElementById('max_silnik').value+'&min_przebieg='+document.getElementById('min_przebieg').value+'&max_przebieg='+document.getElementById('max_przebieg').value+'&kolor='+document.getElementById('filter-kolor').value+'&stan='+document.getElementById('filter-kolor stan').value)" name="max_silnik" id="max_silnik" placeholder="DO">
            </div>
            <div class="filter">
                <h4>Kolor:</h4>
                <select name="kolor" onfocusout="filtr('marka='+document.getElementById('filter-marka').value+'&model='+document.getElementById('filter-model').value+'&min_rok='+document.getElementById('min_rok').value+'&max_rok='+document.getElementById('max_rok').value+'&min_cena='+document.getElementById('min_cena').value+'&max_cena='+document.getElementById('max_cena').value+'&min_silnik='+document.getElementById('min_silnik').value+'&max_silnik='+document.getElementById('max_silnik').value+'&min_przebieg='+document.getElementById('min_przebieg').value+'&max_przebieg='+document.getElementById('max_przebieg').value+'&kolor='+document.getElementById('filter-kolor').value+'&stan='+document.getElementById('filter-kolor stan').value)" id="filter-kolor">
                    <option value="" selected disabled hidden>-Wszystkie-</option>
                    <option>Wszystkie</option>
                    <?php echo kolory();?>
                </select>
            </div>
            <div class="filter">
                <h4>Przebieg:</h4>
                <input type="number" onfocusout="filtr('marka='+document.getElementById('filter-marka').value+'&model='+document.getElementById('filter-model').value+'&min_rok='+document.getElementById('min_rok').value+'&max_rok='+document.getElementById('max_rok').value+'&min_cena='+document.getElementById('min_cena').value+'&max_cena='+document.getElementById('max_cena').value+'&min_silnik='+document.getElementById('min_silnik').value+'&max_silnik='+document.getElementById('max_silnik').value+'&min_przebieg='+document.getElementById('min_przebieg').value+'&max_przebieg='+document.getElementById('max_przebieg').value+'&kolor='+document.getElementById('filter-kolor').value+'&stan='+document.getElementById('filter-kolor stan').value)" name="min_przebieg" id="min_przebieg" placeholder="OD">
                <input type="number" onfocusout="filtr('marka='+document.getElementById('filter-marka').value+'&model='+document.getElementById('filter-model').value+'&min_rok='+document.getElementById('min_rok').value+'&max_rok='+document.getElementById('max_rok').value+'&min_cena='+document.getElementById('min_cena').value+'&max_cena='+document.getElementById('max_cena').value+'&min_silnik='+document.getElementById('min_silnik').value+'&max_silnik='+document.getElementById('max_silnik').value+'&min_przebieg='+document.getElementById('min_przebieg').value+'&max_przebieg='+document.getElementById('max_przebieg').value+'&kolor='+document.getElementById('filter-kolor').value+'&stan='+document.getElementById('filter-kolor stan').value)" name="max_przebieg" id="max_przebieg" placeholder="DO">
            </div>
            <div class="filter">
                <h4>Stan techniczny:</h4>
                <select name="stan" onfocusout="filtr('marka='+document.getElementById('filter-marka').value+'&model='+document.getElementById('filter-model').value+'&min_rok='+document.getElementById('min_rok').value+'&max_rok='+document.getElementById('max_rok').value+'&min_cena='+document.getElementById('min_cena').value+'&max_cena='+document.getElementById('max_cena').value+'&min_silnik='+document.getElementById('min_silnik').value+'&max_silnik='+document.getElementById('max_silnik').value+'&min_przebieg='+document.getElementById('min_przebieg').value+'&max_przebieg='+document.getElementById('max_przebieg').value+'&kolor='+document.getElementById('filter-kolor').value+'&stan='+document.getElementById('filter-kolor stan').value)" id="filter-kolor stan">
                    <option value="" selected disabled hidden>-Wszystkie-</option>
                    <option>Wszystkie</option>
                    <?php echo stany();?>
 
                </select>
            </div>
            
        </div>
        <div class="oferty-auta" id="txtHint">
trdsf
        </div>
    </div>
</div>











<?php
    echo stopka();
?>
<script src="https://cdn.jsdelivr.net/gh/vaakash/socializer@2f749eb/js/socializer.min.js"></script>
<script>
//filtr('marka='+document.getElementById('marka').value+'&model='+document.getElementById('model').value+'&min_rok='+document.getElementById('min_rok').value+'&max_rok='+document.getElementById('max_rok').value+'&min_cena='+document.getElementById('min_cena').value+'&max_cena='+document.getElementById('max_cena').value+'&min_silnik='+document.getElementById('min_silnik').value+'&max_silnik='+document.getElementById('max_silnik').value+'&min_przebieg='+document.getElementById('min_przebieg').value+'&max_przebieg='+document.getElementById('max_przebieg').value+'&kolor='+document.getElementById('kolor').value+'&stan='+document.getElementById('stan').value)
function filtr(x) {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
      xhttp.open("GET", "test.php?"+x);
      xhttp.send();
}
function modele(){
    if(document.getElementById('filter-marka').value!=""){
    document.getElementById('filter-model').disabled=false;
    const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("filter-model").innerHTML = this.responseText;
      }
      xhttp.open("GET", "test.php?model="+document.getElementById('filter-marka').value);
      xhttp.send();
    }
}
(function(){
    socializer( '.socializer' );
}());
</script>