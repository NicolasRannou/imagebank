<?php echo 'in login';
    if ($_POST['username'] == 'admin')
    {
        echo 'admin';
        // start session with passwd
        // go the the admin page
    }
    else
    {
        echo 'user';
        // start session with pass
        // go to logged page
        // change password
        // show all its images (checkable)
        // upload button
        // list filters of imageJ
        //else go back to main menu
    }
    
    
    ?>
// check if user name == admin -> create db page

// else test mysql with user and (encrypted?) password
// start session
// else go back to login
