<?php
    session_start();
    $command = &$_GET['var1'];
    $image = $_SESSION["currentimage"];
    
    $newimage = $image . "-new";
    
    
    
    // In my case $HTTP_ENV_VARS['PATH'] = bin:usr/bin
    $env_vars = "/Users/nr52/INSTALL/ImageMagick-6.7.3/bin/";

    $fullcommand = $env_vars . $command . " " . $image . " " . $newimage . " 2>&1";
    
    //echo $fullcommand;
    echo system($fullcommand);
?>