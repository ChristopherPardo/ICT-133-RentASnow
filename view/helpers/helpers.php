<?php
/*
 * Author : Christopher Pardo
 * Date : 22.01.2020
 * Project : Rent a snow
 */

//Shows the butons in the menu bar if a user is connected or no
function login_bt()
{
    if (isset($_SESSION["firstname"])) {
        return "<li><a href='index.php?action=disconnect'>Disconnect</a></li>
                <li><a href='index.php?action=personalPage'>".$_SESSION["firstname"]." ".$_SESSION["lastname"]."</a></li>
                <li><a href='index.php?action=cartPage'>Pannier</a></li>";
    } else {
        return "<li><a href='index.php?action=login'>Login</a></li>
                <li><a href='index.php?action=inscription'>Inscription</a></li>";
    }

}

//Set a flash message
function flashMessage()
{
    if (isset($_SESSION["flashmessage"])) {
        $res = "<div id='flashmessage' class='alert alert-danger'>" . $_SESSION["flashmessage"] . "</div>";
    }
    unset($_SESSION["flashmessage"]);
    return $res;
}

?>
