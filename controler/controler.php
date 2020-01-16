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

function disconect(){
    session_unset();
}
?>
