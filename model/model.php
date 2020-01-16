<?php

function getNews()
{
    return json_decode(file_get_contents("model/dataStorage/news.json"),true);
}

function getUsers()
{
    return json_decode(file_get_contents("model/dataStorage/users.json"),true);
}
?>
