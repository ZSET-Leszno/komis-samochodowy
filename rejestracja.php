<?php
    require_once('funkcje.php');
    niewchodzic();
    echo navlogowanie();
?>
    <div class="panel">
        <div class="logo-foto">
        </div>
        <div class="rejest-form">
            <form method="POST" action="#">
                <h3>Zarejestruj się</h3>
                <input class="log-input" name="login" id="login" placeholder="Podaj login" required><br>
                <input type="email" class="log-input" name="mail" id="haslo"placeholder="Podaj email" required><br>
                <input type="password" class="log-input" name="haslo" id="haslo"placeholder="Podaj hasło" required><br>
                <input type="password" class="log-input" name="powtorz_haslo" id="haslo"placeholder="Powtórz hasło" requidred><br>
                <div class="zgody">
                <input type="checkbox" class="zgoda" required><span>Oświadczam, iż zapoznałem się z treścią Regulaminu.<br><br></span>
                <input type="checkbox" class="zgoda" required><span>Akceptuję politykę przetwarzania danych osobowych.</span>
                </div><br>
                <?php
                    if(isset($_POST['login'])){
                        echo rejestracja($_POST['login'], $_POST['mail'], $_POST['haslo'], $_POST['powtorz_haslo']);
                    }
                ?><br>
                <button type="submit" name="zarejestruj" class="przycisk">ZAREJESTRUJ SIĘ</button><br><br>
                <p>Masz już konto? <a href="logowanie.php">Zaloguj się</a></p>
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