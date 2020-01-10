<?php
session_start();

require "controler/controler.php";

$page = $_GET["action"];
switch ($page){
    case "displaySnows" :
        displaySnows();
        break;
    case "login" :
        login();
        break;
    default :
        home();
        break;
}

?>
