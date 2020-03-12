<?php
/*
  Author : Christopher Pardo
  Project : 
  Date : 12.03.2020
*/

require_once "model/model.php";

print "Fonction getAllItem : ";

$news = getAllItems("news");

if (count($news) == 3){
    print "OK\n";
}
else{
    print "BUG\n";
}

?>