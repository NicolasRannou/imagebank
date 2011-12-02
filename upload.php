<?php
    session_start();
    $image = $_SESSION["myemail"];
    
    $target = "bank/".$image."/original/";
    $target = escapeshellarg($target);

    echo $target;
    
    $target = $target . basename( $_FILES['uploaded']['name']) ; 
    $ok=1; 
    if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
    {
        echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
    } 
    else {
        echo "Sorry, there was a problem uploading your file.";
    }
    echo "<meta http-equiv='refresh' content='2;url=registeredarea.php'>";
    ?>
