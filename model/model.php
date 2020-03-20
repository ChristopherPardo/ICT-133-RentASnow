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
    $news = getAllItems("news inner join users on user_id = users.id");
    return $news;
}

function getAllSnowTypes(){
    $snows = getAllItems("snowtypes");
    return $snows;
}

function getAModel($name){
    $model = getAllItems("snows inner join snowtypes on snowtypes.id = snowtype_id where snowtypes.model = '$name'");
    return $model;
}

function getUsers(){
    $users = getAllItems("users");
    return $users;
}

function getAnUser($firstname){
    $user = getAnItems("users where firstname = '{$firstname}'");
    return $user;
}

function addAUser($user){
    try {
        $dbh = getPDO();
        $query = "INSERT INTO users (firstname,lastname,password,email,phonenumber,type) VALUES ('{$user["firstname"]}', '{$user["lastname"]}', '{$user["password"]}', '{$user["email"]}', '{$user["phonenumber"]}', {$user["type"]})";
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

//Find an article with him ID and return all the informations in a table
function findArticle($id) {
    $snows = getSnows();

    foreach ($snows as $snow){
        if ($snow["id"] == $id){
            $article = [

                "id" => $snow["id"],
                "modele" => $snow["modele"],
                "marque" => $snow["marque"],
                "bigimage" => $snow["bigimage"],
                "smallimage" => $snow["smallimage"],
                "dateretour" => $snow["dateretour"],
                "disponible" => $snow["disponible"]
            ];

            return $article;
        }
    }
}
?>
