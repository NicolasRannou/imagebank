<?php
    session_start();
    $command = &$_GET['var1'];
    $image = $_SESSION["currentimage"];
    
    
    $test = split("\.", $image, 2);
    $test2 = split("\.", $image, 2);
    $filter = split(" ", $command, 3);
    
    $newimage = $test[0] . $filter[1] . "." . $test[1];
    $_SESSION["newimage"] = $newimage;
    $_SESSION["command"] = $command;
    
    
    
    // In my case $HTTP_ENV_VARS['PATH'] = bin:usr/bin
    $env_vars = "/Users/nr52/INSTALL/ImageMagick-6.7.3/bin/";

    $fullcommand = $env_vars . $command . " " . $image . " " . $newimage;
    
    system($fullcommand);
    
    //echo $fullcommand;
    echo $image. " " . $newimage;
?>