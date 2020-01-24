<?php
/*
 * Author : Christopher Pardo
 * Date : 22.01.2020
 * Project : Rent a snow
 */

//Page of disconnection
$title = "disconnection";
ob_start();
?>
<h1>Vous êtes deconnecté</h1>
<?php
$content = ob_get_clean();
require "gabarit.php";
?>
