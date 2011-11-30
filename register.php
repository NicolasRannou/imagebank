<?php
    
    if (isset($_POST['login']) AND isset($_POST['pass']))
    {
        // parse file to get password
        $cnf = parse_ini_file("admin/.my.cnf");
        
        $host=$cnf['host']; // Host name 
        $username=$cnf['user']; // Mysql username 
        $password=$cnf['password']; // Mysql password 
        $db_name=$cnf['database']; // Database name 
        $tbl_name="users"; // Table name
        
        // Connect to server and select databse.
        mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
        mysql_select_db("$db_name")or die("cannot select DB");
        
        // username and password sent from form 
        $myusername=$_POST['myusername']; 
        $mypassword=$_POST['mypassword'];
        
        // To protect MySQL injection (more detail about MySQL injection)
        $myusername = stripslashes($myusername);
        $mypassword = stripslashes($mypassword);
        $myusername = mysql_real_escape_string($myusername);
        $mypassword = mysql_real_escape_string($mypassword);
        
        //$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
        $sql="INSERT INTO users(name, email, password) VALUES('nicol2as2', 'nico2lasemail2', 'password22')";
        $result=mysql_query($sql);
        
        // Mysql_num_row is counting table row
        $count=mysql_num_rows($result);
        // If result matched $myusername and $mypassword, table row must be 1 row
        
        if($count==1){
            // Register $myusername, $mypassword and redirect to file "login_success.php"
            session_register("myusername");
            session_register("mypassword"); 
            header("location:login_success.php");
        }
        else {
            echo "Wrong Username or Password";
        }
    
        //connect to DB with info from my.conf
        /*try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO("mysql:host=".$cnf['host'].";dbname=".$cnf['database'],
                           $cnf['user'],$cnf['password'], $pdo_options);
            
            // insert new user
            echo 'show tables';
            $reponse = $bdd->query('show tables');
            
            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch())
            {
                echo '-'.$donnees[Database];
            }
    
            $reponse->closeCursor(); // Termine le traitement de la requête
        }
        catch (Exception $e)
        {
            die('Error : ' . $e->getMessage());
        }
        */
        //check if user doesnt exist
        
        // encrypt password
        
        //insert
        
        //$login = $_POST['login'];
        //$pass_crypte = crypt($_POST['pass']);
        // modify .htpasswd
        /*$myFile = "admin/.htpasswd";
        $fh = fopen($myFile, 'a') or die("can't open file");
        $test = $login . ':' . $pass_crypte . PHP_EOL;
        fwrite($fh, $test);
        fclose($fh);*/
        
        //back to main page
        header('Location: index.php');
    }
    
    else
    {
    ?>

<p>Enter personnal informations</p>

<form method="post">
<p>
Username: <input type="text" name="login"><br />
Password: <input type="text" name="pass"><br />
Email: <input type="text" name="email"><br /><br />
<input type="submit" value="Register">
</p>
</form>

<?php
    }
    ?>
