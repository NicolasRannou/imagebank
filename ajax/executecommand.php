<?php
    session_start();
    $command = &$_GET['var1'];
    $image = $_SESSION["currentimage"];
    
    
    $imagenoextension = split("\.", $image, 2);
    $location = split("\/", $imagenoextension[0], 4);
    $filter = split(" ", $command, 3);
    
    $newimage = $location[0] . "/" . $location[1] . "/modified/" . $location[3] . $filter[1] . $filter[2] . "." . $imagenoextension[1];
    
    # session variables
    $_SESSION["newimage"] = $newimage;
    $_SESSION["command"] = $command;
    
    $env_vars = "/Users/nr52/INSTALL/ImageMagick-6.7.3/bin/";

    # clean the command
    $fullcommand = $env_vars . $command . " ../" . $image . " ../" . $newimage;
    
    system($fullcommand);
    
    #return 2 images to update visualization and show paths
    echo $image . " " . $newimage;
?>