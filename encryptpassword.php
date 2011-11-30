<?php echo '<p>User created</p>';
    <form id='index' action='index.php' method='post' accept-charset='UTF-8'>
    <button type="submit"><b><i>Go back to menu</i></b></button>
    </form>
    ?> 
    /*
    if (isset($_POST['login']) AND isset($_POST['pass']))
    {
        $login = $_POST['login'];
        $pass_crypte = crypt($_POST['pass']);
        // modify .htpasswd
        $myFile = "admin/.htpasswd";
        $fh = fopen($myFile, 'a') or die("can't open file");
        $test = $login . ':' . $pass_crypte . PHP_EOL;
        fwrite($fh, $test);
        fclose($fh);
        
        echo 'Ligne à copier dans le .htpasswd :<br />' . $login . ':' . $pass_crypte;
    }*/
