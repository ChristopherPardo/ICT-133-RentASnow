<?php
/*
 * Author : Christopher Pardo
 * Date : 24.01.2020
 * Project : Rent a snow
 */

require_once 'model/model.php';

//------------------------------ Return to the page in the view ----------------------

function home()
{
    $news = getAllNews();
    require_once 'view/home.php';
}

function displaySnows(){
    $snowTypes = getAllSnowTypes();
    require_once 'view/displaySnows.php';
}

function login(){
    require_once 'view/login.php';
}

function articlePage($article){
    $article = getAnArticle($article);
    require_once  'view/articlePage.php';
}

function modelPage($model){
    $model = getAModel($model);
    require_once  'view/modelPage.php';
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

function tryLogin($firstname, $lastname, $password){
    $users = getUsers(); //Puts the values of the data sheet users in a table

    foreach ($users as $user) {
        //If the username and the password are true the user connect to the session
        if($user["firstname"] == $firstname && $user["lastname"] == $lastname && $user["password"] == $password){
            $_SESSION["firstname"] = $user["firstname"];
            $_SESSION["lastname"] = $user["lastname"];
            $_SESSION["password"] = $user["password"];

            home(); //Return to de page home
        }
    }

    //If the form is false the page show a error
    if(!isset($_SESSION["firstname"])){
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
    $users = getUsers(); //Puts the values of the data sheet users in a table

    foreach ($users as $user){
        //Check if the user is unique and show a error if not
        if($user["username"] == $username){
            $_SESSION["flashmessage"] = "Le nom d'utilisateur est déjà utiliser";
            $inscription = false;
            inscription(); //Return to the page of inscription
        }
    }

    //If the username is unique the user is register in the data and log to the session
    if (!isset($inscription)){
        $employe = valueForm($employe); //Converts the value
        $wantnews = valueForm($wantnews); //Converts the value

        //Puts the values in a table
        $users[] = ["username" => $username, "password" => $password, "birthdate" => $birthdate, "wantnews" => $wantnews, "date-inscription" => date("Y-m-d", time()), "employe" => $employe];
        updateUser($users); //Add the user in the data sheet
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

            changeArticle($articles); //Update the data sheet
            articlePage($article); //return to the article page of the article selected
        }
    }



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