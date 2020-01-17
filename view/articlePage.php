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
var_dump($article["modele"]);
$title = $snows["modele"];
ob_start();
?>

<?php
$content = ob_get_clean();
require "gabarit.php"
?>
