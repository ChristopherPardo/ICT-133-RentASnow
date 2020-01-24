<?php
/*
 * Author : Christopher Pardo
 * Date : 22.01.2020
 * Project : Rent a snow
 */

$title = "Display Snows";
$snows = getSnows();

//Shows the snows disponible and undibonible if an employe is connect
ob_start();
?>
<h1>List des Snowboards</h1>

<?php foreach ($snows as $snow) {
    if ($snow["disponible"] == true && $_SESSION["employe"] != true ){ ?>
        <hr>
        <a href="?action=articlePage&article=<?= $snow['id'] ?>"><img src="view/images/snows/<?= $snow['smallimage'] ?>">
        <h2><?= $snow['modele'] ?></h2></a>
<?php } else if ($_SESSION["employe"] == true) { ?>
        <hr>
        <a href="?action=articlePage&article=<?= $snow['id'] ?>"><img src="view/images/snows/<?= $snow['smallimage'] ?>">
        <h2><?= $snow['modele'] ?></h2></a>
        <h3><?php
            if ($snow["disponible"] == true){
                echo "Disponible";
            }
            else{
                echo "Indisponible";
            }
            ?></h3>
    <?php } }?>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
