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
<br>
<img src="view/images/snows/big/<?= $article['photo'] ?>" alt="image of <?= $article['model'] ?>" style="width:328px;height:600px;">
<br><br>
<div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info"
               aria-selected="true">Info</a>
        </li>
        <?php if ($_SESSION["type"] == 2) { ?>
            <li class="nav-item">
                <a class="nav-link" id="modifacation-tab" data-toggle="tab" href="#modifacation" role="tab"
                   aria-controls="modifacation" aria-selected="false">Modification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="journal-tab" data-toggle="tab" href="#journal" role="tab"
                   aria-controls="journal" aria-selected="false">Journal</a>
            </li>
        <?php } ?>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
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
            <?php } ?>
        </div>
        <?php if ($_SESSION["type"] == 2) { ?>
        <div class="tab-pane fade" id="modifacation" role="tabpanel" aria-labelledby="modifacation-tab">
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
        </div>
        <div class="tab-pane fade" id="journal" role="tabpanel" aria-labelledby="journal-tab">
            <br>
            <?php foreach ($rents as $rent) {
                $user = getAnUserById($rent["user_id"]); ?>
                <p>Loué le <?= $rent["start_on"] ?> par <?= $user["email"] ?></p>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require "gabarit.php"
?>
