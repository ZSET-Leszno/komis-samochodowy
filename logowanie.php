<?php
    require_once('funkcje.php');
    niewchodzic();
    echo navlogowanie();
?>
    <div class="panel">
        <div class="logo-foto">
        </div>
        <div class="logo-form">
            <form method="POST" action="#">
            <h3>Zaloguj się</h3>
                <input class="log-input" name="login" id="login" placeholder="Login" required><br><br>
                <input type="password" class="log-input" name="haslo" id="haslo"placeholder="Hasło" required><br>
                <?php
                    if(isset($_GET['r'])){
                        echo "Potwierdź swój adres e-mail klikając w link który ci wysłaliśmy.";
                    }
                    if(isset($_GET['p'])){
                        echo potwierdz();
                    }
                    if(isset($_POST['login'])){
                        echo logowanie($_POST['login'], $_POST['haslo']);
                    }
                ?>
                <button type="submit" class="przycisk">ZALOGUJ SIĘ</button><br><br>
                <p>Nie masz u nas konta? <a href="rejestracja.php">Zarejestruj się</a></p>
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