<?php
    require_once('funkcje.php');
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
                    if(isset($_POST['login'])){
                        echo logowanie($_POST['login'], $_POST['haslo']);
                    }
                ?>
                <button type="submit" class="przycisk">ZALOGUJ SIĘ</button><br><br>
                <p>Nie masz u nas konta? <a href="rejestracja.php">Zarejestruj się</a></p>
            </form>
        </div>
    </div>
</body>
</html>