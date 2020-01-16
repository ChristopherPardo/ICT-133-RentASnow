<?php
ob_start();
$title = "RentASnow - Login";
?>
<div id="container">
    <!-- zone de connexion -->

    <form action="index.php?action=tryLogin" method="POST">
        <h1>Connexion</h1>

        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
        <br>
        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>
        <br>
        <input type="submit" id='submit' value='Conection'>
    </form>
</div>

<?php
$content = ob_get_clean();
require_once "gabarit.php";
?>
