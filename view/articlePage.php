<?php
$snows = getSnows();
$article["id"] = $_GET["article"];

foreach ($snows as $snow){
    if ($snow["id"] == $article["id"]){
        $article = [

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
<img src="view/images/snows/<?= $article['bigimage'] ?>">
<hr>
<h2><?= $article["modele"] ?></h2>
<h2><?= $article["marque"] ?></h2>

<?php
$content = ob_get_clean();
require "gabarit.php"
?>
