<?php

function login_bt()
{
    if (isset($_SESSION["user"])) {
        return "<a href='index.php?action=disconnect'>Disconnect</a>";
    } else {
        return "<a href='index.php?action=login'>Login</a>";
    }

}

function flashMessage()
{
    if (isset($_SESSION["flashmessage"])) {
        $res = "<div class='alert alert-danger'>" . $_SESSION["flashmessage"] . "</div>";
    }
    unset($_SESSION["flashmessage"]);
    return $res;
}

?>
