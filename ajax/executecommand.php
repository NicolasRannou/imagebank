<?php
    session_start();
    $command = &$_GET['var1'];
    $image = $_SESSION["currentimage"];
    
    $ext = end(explode('.', $image));
    $realpath = substr($image, 0, strlen($image) - strlen($ext) -1);
    
    $imagenoextension = split("\.", $image, 2);
    $location = split("\/", $realpath, 4);
    $filter = split(" ", $command, 3);
    
    $newimage = $location[0] . "/" . $location[1] . "/modified/" . $location[3] . $filter[1] . $filter[2] ..
    "." . $ext;
    
    # session variables
    $_SESSION["newimage"] = $newimage;
    $_SESSION["command"] = $command;
    
    $env_vars = "/Users/nr52/INSTALL/ImageMagick-6.7.3/bin/";
    
    # clean the command
    $fullcommand = $env_vars . $command . " ../" . $image . " ../" . $newimage;
    
    system(escapeshellarg($fullcommand));
    
    #return 2 images to update visualization and show paths
    #echo $ext . " " . $realpath;
    echo $image . " " . $newimage;
    ?>
