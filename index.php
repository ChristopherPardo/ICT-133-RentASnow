<?php
/*
 * Author : Christopher Pardo
 * Date : 24.01.2020
 * Project : Rent a snow
 */

session_start();
require "controler/controler.php";


if (isset($_POST["firstname"])){
    extract($_POST); //$firstname,$lastname,$password,$email,$phonenumber,$type
}

//Takes the informations of the query string and return to a function
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
        tryLogin($firstname, $lastname, $password);
        break;
    case "articlePage" :
        $article = findArticle($_GET["article"]); //Get the article selectionned
        articlePage($article);
        break;
    case "inscription" :
        inscription();
        break;
    case "modelPage" :
        $model = $_GET["model"];
        modelPage($model);
    case "tryInscription" :
        $truePassword = $password; //Password in clear
        $password = password_hash($password, PASSWORD_DEFAULT); //Hashing password
        tryInscription($firstname, $lastname, $password, $email, $phonenumber, $type, $truePassword);
        break;
    case "personalPage" :
        personalPage();
        break;
    case "changeDispo" :
        $article = $_GET["article"];
        changeDispo($article);
        break;
    case "delUser" :
        $username = $_SESSION["user"]; //Get the username of the connected user
        delUser($username);
        break;
    case "cartPage" :
        cartPage();
        break;
    default :
        home();
        break;
}

?>
