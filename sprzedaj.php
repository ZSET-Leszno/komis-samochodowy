<?php
    require('funkcje.php');
    //zalogowani();
    echo navbar();
?>
<div class="formularz">
    <div class="form">
    <h1>Stwórz własną ofertę sprzedaży</h1>
    <form id="ankieta" action='#' method='POST'>
        <input class="sell"type="text" name="marka"  placeholder="Marka auta" minlength="3" maxlength="22" required>
        <input class="sell"type="text" name="model" placeholder="Model auta" required minlength="2" maxlength="22"> 
        <input class="sell"type="number" name="moc"  placeholder="Moc silnika  (w km)" min="10" max="1000" required>
        <input class="sell"type="number" name="rok" placeholder="Rok produkcji" min="1700" max="2023" required>
        <input class="sell"type="number" name="pojemnosc"  placeholder="Pojemność silnika   (w cm3)" min="1" max='9999'required>
        <input class="sell"type="number" name="cenka"  placeholder="Proponowana cena  (w zł)"  min="1" required><br>
            <div class="potwierdzenie">
                <input type="checkbox" required><span>Oświadczam, iż zapoznałem się z treścią Regulaminu.</span><br><br>
                <input type="checkbox" required><span> Akceptuję politykę przetwarzania danych osobowych.</span>
            </div>
            <div class="srodkujacy">
    <input id="oferta-przycisk" type="submit" value="Prześlij ofertę sprzedaży">
    </div>
    </form>
    <?php if(isset($_POST['marka'])){echo sprzedaj();}?>
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
</body>
</html>