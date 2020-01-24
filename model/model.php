<?php
/*
 * Author : Christopher Pardo
 * Date : 24.01.2020
 * Project : Rent a snow
 */


//Get the values of the file news
function getNews()
{
    return json_decode(file_get_contents("model/dataStorage/news.json"),true);
}

//Get the values of the file users
function getUsers()
{
    return json_decode(file_get_contents("model/dataStorage/users.json"),true);
}

//Get the values of the file snow
function getSnows()
{
    return json_decode(file_get_contents("model/dataStorage/snows.json"),true);
}

//Change the values of the file users
function updateUser($users)
{
    file_put_contents('model/dataStorage/users.json', json_encode($users));
}

//Change the values of the file snow
function changeArticle($articles)
{
    file_put_contents('model/dataStorage/snows.json', json_encode($articles));
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
