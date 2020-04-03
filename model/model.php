<?php
/*
 * Author : Christopher Pardo
 * Date : 24.01.2020
 * Project : Rent a snow
 */

function getPDO()
{
    require ".const.php";
    return new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
}

function getAllItems($table)
{
    try {
        $dbh = getPDO();
        $query = "SELECT * FROM $table";
        $statment = $dbh->prepare($query); //Prepare query
        $statment->execute(); //Execute query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC); //Prepare result for client
        return $queryResult;
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getAnItems($table)
{
    try {
        $dbh = getPDO();
        $query = "SELECT * FROM $table";
        $statment = $dbh->prepare($query); //Prepare query
        $statment->execute(); //Execute query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC); //Prepare result for client
        return $queryResult;
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getAllNews(){
    $news = getAllItems("users inner join news on user_id = users.id");
    return $news;
}

function getAllSnowTypes(){
    $snows = getAllItems("snowtypes");
    return $snows;
}

function getAModel($name){
    $model = getAllItems("snowtypes inner join snows on snowtypes.id = snowtype_id where snowtypes.model = '$name'");
    foreach ($model as $key => $snow){
        $snow["price"] = convertPrice($snow);
        $model[$key] = $snow;
    }
    return $model;
}

function getRents($snow_id){
    $rents = getAllItems("rents inner join rentsdetails on rents.id = rent_id where snow_id = $snow_id order by start_on");
    return $rents;
}

function getUsers(){
    $users = getAllItems("users");
    return $users;
}

function getAnUser($email){
    $user = getAnItems("users where email = '$email'");
    return $user;
}

function addAnItem($table){
    try {
        $dbh = getPDO();
        $query = "INSERT INTO $table";
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute();//execute query
        $queryResult = $statement->fetch();//prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function addAUser($user){
    addAnItem("users (firstname,lastname,password,email,phonenumber,type)
    VALUES ('{$user["firstname"]}', '{$user["lastname"]}', '{$user["password"]}', '{$user["email"]}', '{$user["phonenumber"]}', {$user["type"]})");
}

function dellAnItem($table){
    try {
        $dbh = getPDO();
        $query = "DELETE FROM $table";
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute();//execute query
        $queryResult = $statement->fetch();//prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function delUser($email){
    dellAnItem("users where email = '$email'");
}

function delNew($id){
    dellAnItem("news where id = '$id'");
}

function addNew($new){
    addAnItem("news (date, title, text, user_id)
    VALUES ('{$new["date"]}', '{$new["title"]}', '{$new["text"]}', '{$new["user_id"]}')");
}

//Find an article with him ID and return all the informations in a table
function getAnArticle($id) {
    $snow = getAnItems("snows inner join snowtypes on snowtypes.id = snowtype_id where snows.id = '$id'");
    $snow["price"] = convertPrice($snow);
    return $snow;
}

function changeAllPasswords(){
    $users = getUsers();

    foreach ($users as $user) {
        $password = password_hash($user["firstname"], PASSWORD_DEFAULT);
        $user["password"] = $password;

        try {
            $dbh = getPDO();
            $query = "update users set password = :password where id = :id";
            $statement = $dbh->prepare($query);//prepare query
            $statement->execute(["password" => $password, "id" => $user["id"]]);//execute query
            $queryResult = $statement->fetchAll();//prepare result for client
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return null;
        }

    }
}

function getAnUserById($id){
    $user = getAnItems("users where id = $id");
    return $user;
}

function convertPrice($snow){
    switch ($snow["state"]){
        case 1 :
            return $snow["pricenew"];
        case 2 :
            return $snow["pricegood"];
        case 3 :
            return $snow["priceold"];
        case 4 :
            return null;
    }
}

function UpdateAnItem($table){
    try {
        $dbh = getPDO();
        $query = "update $table";
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute();//execute query
        $queryResult = $statement->fetch();//prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function addARent($itemId){
    date_default_timezone_set('Europe/Zurich');
    $timestamp = date("Y-m-j");
    $userId = $_SESSION["id"];

    addAnItem("Rents (status, start_on, user_id)
    VALUES ('ouvert', '{$timestamp}', $userId)");
}

//Change de disponibility of an article
function changeDispo($articleId)
{
    updateAnItem("snows set available = 0 where id = $articleId");
}

function changeInfo($article){
    foreach (array_keys($article) as $info) {
        updateanItem("snows set $info = {$article["$info"]} where id = {$article["id"]}");
    }
}

?>
