<?php
    require('funkcje.php');
    echo navbar();
?>
<div class="main-szczegoly">
    <?php echo szczegoly();?>

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