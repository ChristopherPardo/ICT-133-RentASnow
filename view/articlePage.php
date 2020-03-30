<?php
/*
 * Author : Christopher Pardo
 * Date : 22.01.2020
 * Project : Rent a snow
 */

$title = $article["code"];

//Information of the article selectionned and the employe can change the disponibility
ob_start();
?>
<hr>
<img src="view/images/snows/big/<?= $article['photo'] ?>" alt="image of <?= $article['model'] ?>"
     style="width:328px;height:600px;">
<hr>
<h2> modele : <?= $article["model"] ?></h2>
<h2> marque : <?= $article["brand"] ?></h2>
<h2> code : <?= $article["code"] ?></h2>
<form action="index.php?action=changeDispo&article=<?= $article['id'] ?>" method="post">
    <?php if ($article["available"] == 1 && $article["price"] != null) { ?>
        <h2>prix : <?= $article["price"] ?> CHF</h2>
        <h2>Disponible</h2>
        <?php if (isset($_SESSION["email"])) { ?>
            <a href="index.php?action=addToCart&id=<?= $article["id"] ?>">
                <button type="button" class="btn btn-success">Ajouter au pannier</button>
            </a>
        <?php }
    } else { ?>
        <h2>Indisponible</h2>
    <?php } ?>
</form>
<div>
    <br>
    <?php foreach ($rents as $rent) {
        $user = getAnUserById($rent["user_id"]); ?>
        <p>Loué le <?= $rent["start_on"] ?> par <?= $user["email"] ?></p>
    <?php } ?>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php"
?>
