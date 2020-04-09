<?php
$title = "cart";
ob_start();
?>
<h1>Votre panier</h1>
<br>
<?php if ($cart != null) {
    foreach ($cart as $article) {
        $total += $article["price"]; ?>
        <hr>
        <img src="view/images/snows/small/<?= $article["photo"] ?>">
        <h2><?= $article["model"] ?></h2>
        <h2>longueur : <?= $article["length"] ?> cm</h2>
        <?php if ($article["available"] == 1 && $article["price"] != null) { ?>
            <h2>prix : <?= $article["price"] ?> CHF</h2>
            <h2>Disponible</h2>
        <?php } else { ?>
            <h2>Indisponible</h2>
        <?php } ?>
        <a href="index.php?action=delToCart&article=<?= $article["id"] ?>"><input type="button" value="Supprimer"></a>
    <?php } ?>
    <hr>
    <h3>Le prix total est de <?= $price ?> CHF</h3>
    <hr>
    <form action="?action=order" method="post">
        <input type="number" name="nb_day" placeholder="Nombre de jous" required>
        <input type="submit" value="Commander">
    </form>
<?php } ?>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
