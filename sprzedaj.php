<?php
    require('funkcje.php');
    echo navbar();
?>
<div class="formularz">
    <div class="form">
    <h1>Stwórz własną ofertę sprzedaży</h1>
    <form>
        <label class="przypis">Marka<label>
        <input class="sell"type="text" name="marka"><br><br>
        <label>Model<label>
        <input class="sell"type="text" name="model"><br><br>
        <label>Moc<label>
        <input class="sell"type="number" name="moc"><br><br>
        <label>Rok produkcji<label>
        <input class="sell"type="number" name="rok"><br><br>
        <label>Pojemność silnika<label>
        <input class="sell"type="number" name="pojemnosc"><br><br>
        <label>Proponowana cena<label>
        <input class="sell"type="number" name="cenka"><br><br><br>
            <div class="potwierdzenie">
                <input type="checkbox" required><span>Oświadczam, iż zapoznałem się z treścią Regulaminu.</span><br><br>
                <input type="checkbox" required><span>Akceptuję politykę przetwarzania danych osobowych.</span><br><br>
            </div>
        <input id="oferta-przycisk" type="submit" value="Prześlij ofertę sprzedaży">
    </form>
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