<?php
/*
 * Author : Christopher Pardo
 * Date : 22.01.2020
 * Project : Rent a snow
 */

$title = "Inscription";
//Send the form for creat a new user
ob_start();
?>
<div class="container">

    <form action="index.php?action=tryInscription" method="POST">
        <h1>Inscription</h1>

        <label><b>Nom d'utilisateur</b></label>
        <br>
        <input type="text" placeholder="Entrer votre prénom" name="firstname" required>
        <input type="text" placeholder="Entrer votre nom" name="lastname" required>
        <br>
        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>
        <br>
        <label><b>E-mail</b></label>
        <input type="email" placeholder="Entrer votre E-mail" name="email" required>
        <br>
        <label><b>Numéro de télléphone</b></label>
        <input type="text" name="phonenumber" required>
        <br>
        <label><b>Êtes-vous un employé ?</b></label>
        <input type="checkbox" name="type">
        <br>
        <input type="submit" value='Connexion'>
    </form>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
