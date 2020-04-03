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
<h2> longueur : <?= $article["length"] ?> m</h2>
<h2> code : <?= $article["code"] ?></h2>
<h2> État : <?= getSate($article["state"]) ?></h2>
<?php if ($article["available"] == 1 && $article["price"] != null) { ?>
    <h2>prix : <?= $article["price"] ?> CHF</h2>
    <h2>Disponible</h2>
    <?php if (isset($_SESSION["email"])) { ?>
        <a href="?action=addToCart&id=<?= $article["id"] ?>">
            <button type="button" class="btn btn-success">Ajouter au pannier</button>
        </a>
    <?php }
} else { ?>
    <h2>Indisponible</h2>
<?php }
if ($_SESSION["type"] == 2) { ?>
    <form action="?action=changeInfo&article_Id=<?= $article['id'] ?>" method="post">
        <br>
        <label>Longueur</label>
        <input type="number" name="length" value="<?= $article["length"] ?>">
        <br>
        <label>Code</label>
        <input type="number" name="code" value="<?= $article["code"] ?>">
        <br>
        <label>État</label>
        <select name="state">
            <?php for ($i = 1; $i <= 4; $i++) { ?>
                <option value="<?= $i ?>" <?= ($article["state"] == $i) ? "selected" : "" ?>><?= getSate($i) ?></option>
            <?php } ?>
        </select>
        <br>
        <label>Disponibilité</label>
        <select name="available" value="<?= $article["available"] ?>">
            <?php for ($i = 0; $i < 2; $i++) { ?>
                <option value="<?= $i ?>" <?= ($article["available"] == $i) ? "selected" : "" ?>><?= getAvailable($i) ?></option>
            <?php } ?>
        </select>
        <br>
        <button type="submit">Changer les informations</button>
    </form>
<?php } ?>
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
