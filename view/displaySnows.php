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
        <a href="?action=modelPage&model=<?= $snowType['model'] ?>"><img src="view/images/snows/small/<?= $snowType['photo'] ?>">
        <h2><?= $snowType['model'] ?></h2></a>
        <h2><?= $snowType["brand"] ?></h2>
        <h2>Entre <?= $snowType["priceold"] ?> CHF et <?= $snowType["pricenew"] ?> CHF</h2>
<?php } } ?>
<?php
$content = ob_get_clean();
require "gabarit.php";
?>
