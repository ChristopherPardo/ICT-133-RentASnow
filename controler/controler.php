<?php
/*
 * Author : Christopher Pardo
 * Date : 22.01.2020
 * Project : Rent a snow
 */

require_once 'model/model.php';

//------------------------------ Return to the page in the view ----------------------

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

function articlePage($article){
    require_once  'view/articlePage.php';
}

function inscription(){
    require_once 'view/inscription.php';
}

function personalPage(){
    require_once 'view/personalPage.php';
}

//Disconnect and return the the disconnection's page
function disconnect(){
    session_unset();
    require_once 'view/disconnection.php';
}

function tryLogin($username, $password){
    $users = getUsers();

    foreach ($users as $user) {
        //If the username and the password are true the user connect to the session
        if($user["username"] == $username && password_verify($password, $user["password"])){
            $_SESSION["user"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["birthdate"] = $user["birthdate"];
            $_SESSION["date-inscription"] = $user["date-inscription"] ;
            $_SESSION["employe"] = $user["employe"] ;
            $_SESSION["wantnews"] = $user["wantnews"] ;

            home();
        }
    }

    //If the form is false the page show a error
    if(!isset($_SESSION["user"])){
        $_SESSION["flashmessage"] = "Le nom d'utilisateur ou le mod de passe est incorrect";
        login();
    }
}

//Covert the value "on" to "true"
function valueForm($value){
    if ($value == "on"){
        return true;
    }
    else{
        return false;
    }
}

//Function to register a user
function tryInscription($username, $password, $birthdate, $employe, $wantnews, $truePassword){
    $users = getUsers();

    foreach ($users as $user){
        //Check if the user is unique and show a error if not
        if($user["username"] == $username){
            $_SESSION["flashmessage"] = "Le nom d'utilisateur est déjà utiliser";
            $inscription = false;
            inscription();
        }
    }

    //If the username is unique the user is register in the data and log to the session
    if (!isset($inscription)){
        $employe = valueForm($employe);
        $wantnews = valueForm($wantnews);

        $users[] = ["username" => $username, "password" => $password, "birthdate" => $birthdate, "wantnews" => $wantnews, "date-inscription" => date("Y-m-d", time()), "employe" => $employe];
        updateUser($users); //Add the user in the DataSheet
        tryLogin($username, $truePassword); //Log the user
    }
}

//Change de disponibility of an article
function changeDispo($articleWanted) {
    $articles = getSnows();

    foreach ($articles as $i => $article) {
        if ($articleWanted == $article["id"]) {
            if ($article["disponible"] == true) {
                $articles[$i]["disponible"] = false;
            }
            else {
                $articles[$i]["disponible"] = true;
            }
        }
    }

    changeArticle($articles);
    displaySnows();

}

function delUser($username) {
   $users = getUsers();

   foreach ($users as $i => $user) {
       if ($user["username"] == $username) {
           unset($users[$i]);
       }
   }

   updateUser($users);
   disconnect();
}

?>