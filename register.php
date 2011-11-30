<?php
    
    if (isset($_POST['login']) AND isset($_POST['pass']) AND isset($_POST['email']))
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
        $myusername=$_POST['login']; 
        $mypassword=$_POST['pass'];
        $myemail=$_POST['email'];
        
        // To protect MySQL injection (more detail about MySQL injection)
        $myusername = stripslashes($myusername);
        $mypassword = stripslashes($mypassword);
        $myemail = stripslashes($myemail);
        $myusername = mysql_real_escape_string($myusername);
        $mypassword = mysql_real_escape_string($mypassword);
        $myemail = mysql_real_escape_string($myemail);
        
        //
        $sql="select * from users where name=$myusername";
        
        if (!mysql_query($sql, $con))
        {
            echo "User doesnt not exist, let's create one!";
            //$sql2="INSERT INTO users(name, email, password) VALUES('name', 'email', 'pass')";
            //mysql_query($sql2, $con);
        }
        else
        {
            echo "User already exists";
        }
        
        // password md5()
        
        // create folders
        /* Step 1. I need to know the absolute path to where I am now, ie where this script is running from...*/ 
        //$thisdir = getcwd(); 
        
        /* Step 2. From this folder, I want to create a subfolder called "myfiles".  Also, I want to try and make this folder world-writable (CHMOD 0777). Tell me if success or failure... */
        
        /*$path = $thisdir . "/bank/hello";
        echo "$path";
        
        if(mkdir( $path, 0777)) 
        { 
            echo "Directory has been created successfully..."; 
        } 
        else 
        { 
            $error = error_get_last();
            echo $error['message'];
            echo "Failed to create directory..."; 
            
            
        }*/
        
        
        //$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
        $sql="INSERT INTO users(name, email, password) VALUES('$myusername', '$myemail', '$mypassword')";
        $result=mysql_query($sql);
        /*
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
    */
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
