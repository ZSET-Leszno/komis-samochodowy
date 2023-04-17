<?php
    require('funkcje.php');
    //zalogowani();
    echo navbar();
?>
<div class="formularz">
    <div class="form">
    <h1>Stwórz własną ofertę sprzedaży</h1>
    <form id="ankieta" action='#' method='POST'>
        <input class="sell"type="text" name="marka" placeholder="Marka auta" required>
        <input class="sell"type="text" name="model" placeholder="Model auta" required>>
        <input class="sell"type="number" id="moc" name="moc" placeholder="Moc silnika  (w km)" minlength="2" required>>
        <input class="sell"type="number" name="rok" placeholder="Rok produkcji" maxlength="4" min="1700" max="2023" required>>
        <input class="sell"type="number" name="pojemnosc" placeholder="Pojemność silnika   (w cm3)" maxlength="4" required>>
        <input class="sell"type="number" name="cenka" placeholder="Proponowana cena  (w zł)" required><br>
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
<script>
    function formularz() {
            puste();
            var form = document.getElementById("ankieta");

            if (form.moc.value.trim() == "") {
                document.getElementById("odp1").innerHTML = "To pole jest puste!";
                test = false;
            } else if (form.moc.value.trim().length < 3) {
                document.getElementById("odp1").innerHTML = "Moc musi zawierać co najmniej 2 znaki!";   
                test = false;
            }
    }
    function puste() {
            document.getElementById("odp1").innerHTML = ""; 
    }
</script>
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