<?php
    require('funkcje.php');
    echo navbar();
?>
<div class="main">
    <div class="parent">
        <div class="div1"> <span><p>Samochód na raty - <br>Decyzja w 30 minut </p><button onclick="location.href = '#'">Sprawdź ofertę</button></span></div>
        <div class="div2">  <p>Auta już od 3999 zł</p></div>
        <div class="div3">  <p>Satysfakcja gwarantowana</p></div>
    </div>
    
    <div class="wrapper">
        <div class="container">
        <i class="fa-solid fa-car-rear"></i>
        <span class="num" data-val="95">000</span>
        <span class="text">Aut w ofercie</span>
        </div>
        <div class="container">
        <i class="fa-solid fa-handshake"></i>
        <span class="num" data-val="120">000</span>
        <span class="text">Sprzedanych aut</span>
        </div>
        <div class="container">
        <i class="fa-solid fa-calendar-days"></i>
        <span class="num" data-val="16">000</span>
        <span class="text">Lat na rynku</span>
        </div>
        <div class="container">
        <i class="fa-solid fa-face-smile"></i>
        <span class="num" data-val="115">000</span>
        <span class="text">Zadowolonych klientów</span>
        </div>
    </div>

</div>

<script src="skrypty.js"></script>
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