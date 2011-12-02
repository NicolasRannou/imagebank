<?php
    session_start();
    $_SESSION["currentimage"] = 'image';
    // pass variable (command)
    $cat=&$_GET['var1'];
    
    echo $cat;
?>
