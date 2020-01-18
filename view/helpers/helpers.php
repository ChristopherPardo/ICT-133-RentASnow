<?php

function login_bt()
{
    if (isset($_SESSION["user"])) {
        return "<li><a href='index.php?action=disconnect'>Disconnect</a></li>
                <li><a href='index.php?action=personalPage'>".$_SESSION["user"]."</a></li>";
    } else {
        return "<li><a href='index.php?action=login'>Login</a></li>
                <li><a href='index.php?action=inscription'>Inscription</a></li>";
    }

}

function flashMessage()
{
    if (isset($_SESSION["flashmessage"])) {
        $res = "<div id='flashmessage' class='alert alert-danger'>" . $_SESSION["flashmessage"] . "</div>";
    }
    unset($_SESSION["flashmessage"]);
    return $res;
}

?>
