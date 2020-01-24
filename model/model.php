<?php

function getNews()
{
    return json_decode(file_get_contents("model/dataStorage/news.json"),true);
}

function getUsers()
{
    return json_decode(file_get_contents("model/dataStorage/users.json"),true);
}

function getSnows()
{
    return json_decode(file_get_contents("model/dataStorage/snows.json"),true);
}

function updateUser($users)
{
    file_put_contents('model/dataStorage/users.json', json_encode($users));
}
function changeArticle($articles)
{
    file_put_contents('model/dataStorage/snows.json', json_encode($articles));
}
?>
