<?php
$title = "cart";
ob_start();
?>
<h1>Votre panier</h1>
<br>
<hr>
<img src="view/images/snows/small/B126.jpg">
<h2>B126</h2>
<h2>longueur : 160 cm</h2>
<h2>Disponible</h2>
<input type="button" value="Supprimer">
<hr>
<img src="view/images/snows/small/k409.jpg">
<h2>K409</h2>
<h2>longueur : 120 cm</h2>
<h2>Indisponible</h2>
<input type="button" value="Supprimer">
<br><br><br>
<input type="button" value="Commander">

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
