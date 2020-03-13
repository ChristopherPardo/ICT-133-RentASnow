<?php
/*
 * Author : Christopher Pardo
 * Date : 22.01.2020
 * Project : Rent a snow
 */

$title = "Display Snows";
//Shows the snows disponible and undibonible if an employe is connect
ob_start();
?>
<h1>List des Snowboards</h1>

<?php foreach ($snowTypes as $snowType) {
    if ($snowType == true && $_SESSION["employe"] != true ){ ?>
        <hr>
        <a href="?action=articlePage&article=<?= $snowTypes['id'] ?>"><img src="view/images/snows/small/<?= $snowType['photo'] ?>">
        <h2><?= $snowType['model'] ?></h2></a>
<?php } } ?>
<?php
$content = ob_get_clean();
require "gabarit.php";
?>
