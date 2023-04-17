<?php
    require('funkcje.php');
    echo navbar();
?>
<div class="main-szczegoly">
    <div class="kontener">
        <div class="zdjecia">
            <div class="zdjecie1" style="background-image: url(img/10_1.webp);">1</div>
            <div class="zdjecie2" style="background-image: url(img/10_2.webp);">1</div>
            <div class="zdjecie3" style="background-image: url(img/10_3.webp);">1</div>
            <div class="zdjecie4" style="background-image: url(img/10_4.webp);">1</div>
            <div class="zdjecie5" style="background-image: url(img/10_5.webp);">1</div>
        </div>
        <div class="opis-auta">
            <h2>Rozjebana Ibiza 2.0 DCI</h2>
            <table class="tabelka">
                <tr>
                    <td class="tabela-naglowek">Marka Pojazdu</td>
                    <td class="tabela-wartosc">SEAT</td>
                </tr>
                <tr>
                    <td class="tabela-naglowek">Model Pojazdu</td>
                    <td class="tabela-wartosc">IBIZA</td>
                </tr>
                <tr>
                    <td class="tabela-naglowek">Rok produkcji</td>
                    <td class="tabela-wartosc">2004</td>
                </tr>
                <tr>
                    <td class="tabela-naglowek">Przebieg</td>
                    <td class="tabela-wartosc">120 000</td>
                </tr>
                <tr>
                    <td class="tabela-naglowek">Pojemność silnika</td>
                    <td class="tabela-wartosc">1997</td>
                </tr>
                <tr>
                    <td class="tabela-naglowek">Rodzaj paliwa</td>
                    <td class="tabela-wartosc">DIESEL</td>
                </tr>
                <tr>
                    <td class="tabela-naglowek">Moc</td>
                    <td class="tabela-wartosc">358</td>
                </tr>
                <tr>
                    <td class="tabela-naglowek">Kolor</td>
                    <td class="tabela-wartosc">CZERWONY</td>
                </tr>
                <tr>
                    <td class="tabela-naglowek">Pochodzenie</td>
                    <td class="tabela-wartosc">POLSKA</td>
                </tr>
            </table>
            <p>
            Samochód jest zarejestrowany i ubezpieczony w BELGII !!!<br>
            Samochód w BOGATEJ wersji wyposażeniowej !!!<br>
            Samochód przygotowany do eksploatacji !!!<br>
            Niniejsze ogłoszenie dotyczy samochodu<br>
            FORD FIESTA 1,2i 60 KM + KLIMATYZACJA + ELEKTRYKA + PODGRZEWANE FOTELE !!!
            </p>
        </div>

    </div>
    
    
    <div class="polecane-auta" id="txtHint">
    <div class="sponsorzy">
    <h2>Podobne propozycje</h2>
    </div>
            <div class="auta">
                <?php najnowsze();?>
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