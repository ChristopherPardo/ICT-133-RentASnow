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

function articlePage($article, $rents){
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
    $user = getAnUser($_SESSION["email"]);
    require_once 'view/personalPage.php';
}

function cartPage($cart){
    require_once 'view/cartPage.php';
}

//Disconnect and return the the disconnection's page
function disconnect(){
    session_unset();
    require_once 'view/disconnection.php';
}

function tryLogin($email, $password){
    $users = getUsers(); //Puts the values of the data sheet users in a table

    foreach ($users as $user) {
        //If the username and the password are true the user connect to the session
        if($user["email"] == $email && password_verify($password, $user["password"])){
            $_SESSION["firstname"] = $user["firstname"];
            $_SESSION["lastname"] = $user["lastname"];
            $_SESSION["password"] = $user["password"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["id"] = $user["id"];

            home(); //Return to de page home
        }
    }

    //If the form is false the page show a error
    if(!isset($_SESSION["firstname"])){
        $_SESSION["flashmessage"] = "L'e-amil ou le mot de passe est incorrect";
        login();
    }
}

//Covert the value "on" to "true"
function valueForm($value){
    if ($value == "on"){
        return 2;
    }
    else{
        return 1;
    }
}

//Function to register a user
function tryInscription($firstname,$lastname,$password,$email,$phonenumber,$type,$truePassword){
    $users = getUsers(); //Puts the values of the data sheet users in a table

    foreach ($users as $user){
        //Check if the user is unique and show a error if not
        if($user["email"] == $email){
            $_SESSION["flashmessage"] = "L'e-mail est déjà utilisé";
            $inscription = false;
            inscription(); //Return to the page of inscription
        }
    }

    //If the username is unique the user is register in the data and log to the session
    if (!isset($inscription)){
        $type = valueForm($type); //Converts the value


        $newUser = ["firstname" => $firstname,
                    "lastname" => $lastname,
                    "password" => $password,
                    "email" => $email,
                    "phonenumber" => $phonenumber,
                    "type" => $type];
        addAUser($newUser); //Add the user in the data sheet
        tryLogin($firstname,$lastname, $truePassword); //Log the user
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

function prepareNew($title, $text){
    $date = date("Y-m-j G:i:s", time());
    $user = getAnUser($_SESSION["firstname"]);

    $new = ["title" => $title,
            "text" => $text,
            "date" => $date,
            "user_id" => $user["id"]];

    addNew($new);
    home();

}

function addToCart($article){
    $_SESSION["cart"][] = $article;
    modelPage($article["model"]);
}

?>