<?php
    session_start();
    $_SESSION["currentimage"] = &$_GET['var1'];
    echo $_SESSION["currentimage"];
?>
