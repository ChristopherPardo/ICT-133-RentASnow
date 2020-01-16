<?php
session_start();
$_SESSION["user"]="toto";
require "controler/controler.php";

$page = $_GET["action"];
switch ($page){
    case "displaySnows" :
        displaySnows();
        break;
    case "login" :
        login();
        break;
    case "disconnect" :
        disconnect();
    default :
        home();
        break;
}

?>
