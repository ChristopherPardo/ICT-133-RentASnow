<?php
require_once 'model/model.php';

// This file contains nothing but functions

function home()
{
    $news = getNews();
    require_once 'view/home.php';
}

function displaySnows(){
    require_once 'view/displaySnows.php';
}

function login(){
    require_once 'view/login.php';
}

function articlePage(){
    require_once  'view/articlePage.php';
}

function inscription(){
    require_once 'view/inscription.php';
}

function personalPage(){
    require_once 'view/personalPage.php';
}

function disconnect(){
    session_unset();
    require_once 'view/disconnection.php';
}

function tryLogin($username, $password){
    $users = getUsers();

    foreach ($users as $i => $user) {
        if($user["username"] == $username && $user["password"] == $password){
            $_SESSION["user"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["birthdate"] = $user["birthdate"];
            $_SESSION["date-inscription"] = $user["date-inscription"] ;
            $_SESSION["employe"] = $user["employe"] ;
            $_SESSION["wantnews"] = $user["wantnews"] ;

            home();
        }
    }

    if(!isset($_SESSION["user"])){
        $_SESSION["flashmessage"] = "Le nom d'utilisateur ou le mod de passe est incorrect";
        login();
    }
}

function valueForm($value){
    if ($value == "on"){
        return true;
    }
    else{
        return false;
    }
}

function tryInscription($username, $password, $birthdate, $employe, $wantnews){

    $employe = valueForm($employe);
    $wantnews = valueForm($wantnews);

    $users = getUsers();
    $users[] = ["username" => $username, "password" => $password, "birthdate" => $birthdate, "wantnews" => $wantnews, "date-inscription" => date("Y-m-d", time()), "employe" => $employe];
    addUser($users);
    tryLogin($username, $password);
}
?>