<?php
$title = "disconnection";
ob_start();
?>
<h1>Vous êtes deconnecté</h1>
<?php
$content = ob_get_clean();
require "gabarit.php";
?>
