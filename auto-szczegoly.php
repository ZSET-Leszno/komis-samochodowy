<?php
    require('funkcje.php');
    echo navbar();
?>
<div class="main-szczegoly">
    <div class="zdjecia">
        <div class="zdjecie1" style="background-image: url(img/10_1.webp);">1</div>
        <div class="zdjecie2" style="background-image: url(img/10_2.webp);">1</div>
        <div class="zdjecie3" style="background-image: url(img/10_3.webp);">1</div>
        <div class="zdjecie4" style="background-image: url(img/10_4.webp);">1</div>
        <div class="zdjecie5" style="background-image: url(img/10_5.webp);">1</div>
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