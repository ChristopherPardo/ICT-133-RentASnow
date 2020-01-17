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

function disconnect(){
    session_unset();
    require_once 'view/disconnection.php';
}

function tryLogin($username,$password){
    $users = getUsers();

    foreach ($users as $i => $user) {
        if($user["username"] == $username && $user["password"] == $password){
            $_SESSION["user"] = $username;
            $_SESSION["password"] = $password;
            home();
        }
    }

    if(!isset($_SESSION["user"])){
        $_SESSION["flashmessage"] = "Le nom d'utilisateur ou le mod de passe est incorrect";
        login();
    }
}
?>