<?php
$title = $_SESSION["user"];
ob_start();
?>
<h1>Informations personnelles</h1>
<br><br>
<h2>Nom : <?= $_SESSION["user"] ?></h2>
<h2>Date de naissance : <?= $_SESSION["birthdate"] ?></h2>
<h3>Inscrit depuis le <?= $_SESSION["date-inscription"] ?></h3>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
