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
    case "disconnect" :
        disconnect();
        break;
    case "tryLogin" :
        $username = $_POST["username"];
        $password = $_POST["password"];
        tryLogin($username, $password);
        break;
    case "articlePage" :
        $articleId = $_GET["article"];
        $snows = getSnows();
        articlePage();
    default :
        home();
        break;
}

?>
