<?php
/*
 * Author : Christopher Pardo
 * Date : 22.01.2020
 * Project : Rent a snow
 */

$snows = getSnows();
$article["id"] = $_GET["article"];


foreach ($snows as $snow){
    if ($snow["id"] == $article["id"]){
        $article = [

            "id" => $snow["id"],
            "modele" => $snow["modele"],
            "marque" => $snow["marque"],
            "bigimage" => $snow["bigimage"],
            "smallimage" => $snow["smallimage"],
            "dateretour" => $snow["dateretour"],
            "disponible" => $snow["disponible"]
    ];
    }
}
$title = $article["modele"];
ob_start();
?>
<hr>
<img src="view/images/snows/<?= $article['bigimage'] ?>" alt="image of <?= $article['modele'] ?>" style="width:328px;height:600px;">
<hr>
<h2> modele : <?= $article["modele"] ?></h2>
<h2> marque : <?= $article["marque"] ?></h2>
<form action="index.php?action=changeDispo&article=<?= $article['id'] ?>" method="post">
<?php if ($article["disponible"] == true) { ?>
    <h2>Disponible</h2>
    <?php if ($_SESSION["employe"] == true) { ?>
    <br>
        <input type="submit" class="button" name="undispo" value="Rendre indisponible">
    <?php } } else { ?>
    <h2>Indisponible</h2>
    <?php if ($_SESSION["employe"] == true) { ?>
    <br>
        <input type="submit" class="button" name="dispo" value="Rendre Disponible">
    <?php } } ?>
</form>

<?php
$content = ob_get_clean();
require "gabarit.php"
?>
