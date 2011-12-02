<?php
    session_start();
    $command = &$_GET['var1'];
    $image = $_SESSION["currentimage"];
    
    $newimage = $image . "-new";
    
    $fullcommand = $command . " " . $image . " " . $newimage;
    
    echo $fullcommand;
    
    //system($fullcommand);
?>