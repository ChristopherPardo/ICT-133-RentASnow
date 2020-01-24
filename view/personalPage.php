<?php
/*
 * Author : Christopher Pardo
 * Date : 22.01.2020
 * Project : Rent a snow
 */

$title = $_SESSION["user"];
ob_start();
?>
<h1>Informations personnelles</h1>
<br><br>
<h2>Nom : <?= $_SESSION["user"] ?></h2>
<h2>Date de naissance : <?= $_SESSION["birthdate"] ?></h2>
<h3>Inscrit depuis le <?= $_SESSION["date-inscription"] ?></h3>
<?php if ($_SESSION["employe"] == true) { ?>
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
