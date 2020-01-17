<?php
$title = "Display Snows";
$snows = getSnows();
ob_start();
?>
<h1>List des Snowboards</h1>

<?php foreach ($snows as $snow) { ?>
    <h2><?= $snow['modele'] ?></h2>
<?php } ?>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
