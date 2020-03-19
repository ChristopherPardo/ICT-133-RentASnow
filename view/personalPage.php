<?php
/*
 * Author : Christopher Pardo
 * Date : 22.01.2020
 * Project : Rent a snow
 */

$title = $_SESSION["user"];

//Shows informations personal and a button for delet the user
ob_start();
?>
<h1>Informations personnelles</h1>
<br><br>
<h2>Nom : <?= $user["lastname"] ?></h2>
<h2>Prénom : <?= $user["firstname"] ?></h2>
<h2>E-Mail : <?= $user["email"] ?></h2>
<h2>Numéro de téléphone : <?= $user["phonenumber"] ?></h2>
<?php if ($user["type"] == 2) { ?>
    <h3>Vous êtes un employé</h3>
   <?php } else { ?>
    <h3>Vous êtes un client</h3>
    <?php } ?>

<form action="index.php?action=delUser" method="post">
    <input type="submit" class="button" value="Supprimer votre profil">
</form>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
