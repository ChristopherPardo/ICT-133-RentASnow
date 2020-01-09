<?php

require "controler/controler.php";
$page = $_GET["action"];
switch ($page){
    case "displaySnows" :
        displaySnows();
        break;
    case "home" :
        home();
        break;
}

?>
