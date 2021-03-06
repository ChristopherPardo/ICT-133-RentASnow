<?php
/*
 * Author : Christopher Pardo
 * Date : 24.01.2020
 * Project : Rent a snow
 */

session_start();
require "controler/controler.php";

if (isset($_POST["email"])){
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
        tryLogin($email, $password);
        break;
    case "articlePage" :
        $article = getAnArticle($_GET["article"]); //Get the article selectionned
        $article["id"] = $_GET["article"];
        $rents = getRents($_GET["article"]);
        articlePage($article, $rents);
        break;
    case "inscription" :
        inscription();
        break;
    case "modelPage" :
        $model = $_GET["model"];
        modelPage($model);
        break;
    case "tryInscription" :
        $truePassword = $password; //Password in clear
        $password = password_hash($password, PASSWORD_DEFAULT); //Hashing password
        tryInscription($firstname, $lastname, $password, $email, $phonenumber, $type, $truePassword);
        break;
    case "personalPage" :
        personalPage();
        break;
    case "changeInfo" :
        $article = $_POST;
        $article["id"] = $_GET["article_Id"];
        changeInfo($article);
        $rents = getRents($article["id"]);
        $article = getAnArticle($article["id"]);
        $article["id"] = $_GET["article_Id"];
        articlePage($article, $rents);
        break;
    case "delUser" :
        $email = $_SESSION["email"]; //Get the username of the connected user
        delUser($email);
        disconnect();
        break;
    case "cartPage" :
        $cart = $_SESSION["cart"];
        cartPage($cart);
        break;
    case "addNew" :
        extract($_POST); //$title, $text
        prepareNew($title, $text);
        break;
    case "delNew" :
        $id = $_GET["new"];
        delNew($id);
        home();
        break;
    case "addToCart" :
        $article = getAnArticle($_GET["id"]);
        $article["id"] = $_GET["id"];
        addToCart($article);
        break;
    case "delToCart" :
        $articleId = $_GET["article"];
        delToCart($articleId);
        break;
    case "order" :
        $nb_day = $_POST["nb_day"];
        order($nb_day);
        break;
    default :
        home();
        break;
}

?>
