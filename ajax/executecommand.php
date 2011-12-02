<?php
    session_start();
    $command = &$_GET['var1'];
    $image = $_SESSION["currentimage"];
    
    
    $test = split("\.", $image, 2);
    $test2 = split("\/", $test[0], 4);
    $filter = split(" ", $command, 3);
    
    $newimage = $test2[0] . "/" . $test2[1] . "/modified/" . $test2[3] . $filter[1] . "." . $test[1];
    $_SESSION["newimage"] = $newimage;
    $_SESSION["command"] = $command;
    
    $env_vars = "/Users/nr52/INSTALL/ImageMagick-6.7.3/bin/";

    # clean the command
    $fullcommand = $env_vars . escapeshellarg($command) . " ../" . $image . " ../" . $newimage;
    
    system($fullcommand);
    
    #return 2 images to update visualization and show paths
    echo $image . " " . $newimage;
?>