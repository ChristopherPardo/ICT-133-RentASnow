<?php
/*
  Author : Christopher Pardo
  Project : 
  Date : 13.03.2020
*/
$title = $model["model"];
ob_start();
?>
<h1>Snows de la marque <?= $model["model"] ?></h1>

<?php foreach ($model as $snow) { ?>
    <hr>
    <img src="view/images/snows/small/<?= $snow['photo'] ?>">
    <h2><?= $snow['model'] ?></h2></a>
    <h2>longueur : <?= $snow["length"] ?> cm</h2>
    <?php if ($snow["available"] == 1) { ?>
        <h3>Disponible</h3>
        <?php if (isset($_SESSION["email"])) { ?>
            <a href="index.php?action=addToCart&id=<?= $snow["id"] ?>">
                <button type="button" class="btn btn-success">Ajouter au pannier</button>
            </a>
        <?php }
    } else { ?>
        <h3>Indisponible</h3>
    <?php }
} ?>
<?php
$content = ob_get_clean();
require "gabarit.php";
?>
