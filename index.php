<?php
/*
 * Author : Christopher Pardo
 * Date : 22.01.2020
 * Project : Rent a snow
 */

session_start();
require "controler/controler.php";


if (isset($_POST["username"])){
    extract($_POST); //$username,$password,$birthdate,$employe,$wantnews,$date-inscription
    //$password = password_hash($_POST["password"], PASSWORD_DEFAULT); //The hashing doesn't work
}

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
        tryLogin($username, $password);
        break;
    case "articlePage" :
        $article = findArticle($_GET["article"]);
        articlePage($article);
        break;
    case "inscription" :
        inscription();
        break;
    case "tryInscription" :
        $truePassword = $password;
        $password = password_hash($password, PASSWORD_DEFAULT);
        tryInscription($username, $password, $birthdate, $employe, $wantnews, $truePassword);
        break;
    case "personalPage" :
        personalPage();
        break;
    case "changeDispo" :
        $article = $_GET["article"];
        changeDispo($article);
        break;
    case "delUser" :
        $username = $_SESSION["user"];
        delUser($username);
        break;
    default :
        home();
        break;
}

?>
