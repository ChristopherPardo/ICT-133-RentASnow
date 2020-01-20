<?php
$title = "Inscription";
ob_start();
?>
<div class="container">

    <form action="index.php?action=tryInscription" method="POST">
        <h1>Inscription</h1>

        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
        <br>
        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>
        <br>
        <label><b>Date de naissance</b></label>
        <input type="date" name="birthdate" required>
        <br>
        <label><b>Êtes-vous un employé ?</b></label>
        <input type="checkbox" name="employe">
        <br>
        <label><b>Voulez-vous vous inscrire à la newsletter ?</b></label>
        <input type="checkbox" name="wantnews">
        <br>
        <input type="submit" value='Connexion'>
    </form>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
