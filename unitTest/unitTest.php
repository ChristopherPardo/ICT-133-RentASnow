<?php
/*
  Author : Christopher Pardo
  Project : 
  Date : 12.03.2020
*/

require_once "model/model.php";
require 'model/.const.php';
$cmd = 'mysql -u $user -p$pass < model/dataStorage/SQL/Restore-Snows.sql';
exec($cmd);

print "Fonction getAllItem : ";

$news = getAllItems("news");

if (count($news) == 3){
    print "OK\n";
}
else{
    print "BUG\n";
}

print "Fonction getAllNews : ";

$news = getAllNews();

var_dump($news);

?>