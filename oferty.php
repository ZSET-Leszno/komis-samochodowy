<?php
    require('funkcje.php');
    echo navbar();
?>
<div class="main">
    <div class="lista">
        <div class="filtry">
            <div class="filter">
                <h4>Marka:</h4>
                <select name="filter-marka" id="filter-marka">
                    <option value="" selected disabled hidden>-Wszystkie-</option>
                    <option>Wszystkie</option>
                    <option>Ford</option>
                    <option>Mercedes</option>
                    <option>Coś tam</option>
                    <option>Pociągniesz</option>
                    <option>Jakoś</option>
                    <option>z</option>
                    <option>Bazy danych</option>
                </select>
            </div>
            <div class="filter">
                <h4>Model:</h4>
                <select name="filter-model" id="filter-model">
                    <option value="" selected disabled hidden>-Wszystkie-</option>
                    <option>Wszystkie</option>
                    <option>Ford</option>
                    <option>Mercedes</option>
                    <option>Coś tam</option>
                    <option>Pociągniesz</option>
                    <option>Jakoś</option>
                    <option>z</option>
                    <option>Bazy danych</option>
                </select>
            </div>
            <div class="filter">
                <h4>Cena:</h4>
                <input type="number" name="cena-od" placeholder="OD">
                <input type="number" name="cena-do" placeholder="DO">
            </div>
            <div class="filter">
                <h4>Rok produkcji:</h4>
                <input type="number" name="rok-od" placeholder="OD">
                <input type="number" name="rok-do" placeholder="DO">
            </div>
            <div class="filter">
                <h4>Pojemność silnika:</h4>
                <input type="number" name="rok-od" placeholder="OD">
                <input type="number" name="rok-do" placeholder="DO">
            </div>
            <div class="filter">
                <h4>Kolor:</h4>
                <select name="filter-kolor" id="filter-kolor">
                    <option value="" selected disabled hidden>-Wszystkie-</option>
                    <option>Wszystkie</option>
                    <option>Niebieski</option>
                    <option>Czarny</option>
                    <option>Coś tam</option>
                    <option>Pociągniesz</option>
                    <option>Jakoś</option>
                    <option>z</option>
                    <option>Bazy danych</option>
                </select>
            </div>
            <div class="filter">
                <h4>Przebieg:</h4>
                <input type="number" name="przebieg-od" placeholder="OD">
                <input type="number" name="przebieg-do" placeholder="DO">
            </div>
            <div class="filter">
                <h4>Stan techniczny:</h4>
                <select name="filter-kolor" id="filter-kolor">
                    <option value="" selected disabled hidden>-Wszystkie-</option>
                    <option>Wszystkie</option>
                    <option>Uszkodzony</option>
                    <option>Nieuszkodzony</option>
 
                </select>
            </div>
            
        </div>
    </div>
</div>











<?php
    echo stopka();
?>
<script src="https://cdn.jsdelivr.net/gh/vaakash/socializer@2f749eb/js/socializer.min.js"></script>
<script>
(function(){
    socializer( '.socializer' );
}());
</script>