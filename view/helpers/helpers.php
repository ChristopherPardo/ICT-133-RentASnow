<?php

function login_bt(){
    if(isset($_SESSION["user"])){
        return "<a href='index.php?action=disconnect'>Disconnect</a>";
    }
    else{
        return "<a href='index.php?action=login'>Login</a>";
    }

}

?>
