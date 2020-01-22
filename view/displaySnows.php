<?php
/*
 * Author : Christopher Pardo
 * Date : 22.01.2020
 * Project : Rent a snow
 */

$title = "Display Snows";
$snows = getSnows();
ob_start();
?>
<h1>List des Snowboards</h1>

<?php foreach ($snows as $snow) {
    if ($snow["disponible"] == true){ ?>
        <hr>
        <a href="?action=articlePage&article=<?= $snow['id'] ?>"><img src="view/images/snows/<?= $snow['smallimage'] ?>">
        <h2><?= $snow['modele'] ?></h2></a>
<?php }
} ?>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
