<?php
    if (    isset($_POST['email']) AND !empty($_POST['email'])
        AND isset($_POST['pass'])  AND !empty($_POST['pass']))
    {
        // parse file to get password
        $cnf = parse_ini_file("admin/.my.cnf");
        
        $host=$cnf['host']; // Host name 
        $username=$cnf['user']; // Mysql username 
        $password=$cnf['password']; // Mysql password 
        $db_name=$cnf['database']; // Database name 
        $tbl_name="users"; // Table name
        
        // Connect to server and select databse.
        $con = mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
        mysql_select_db("$db_name", $con)or die("cannot select DB");
        
        // username and password sent from form 
        $myemail=$_POST['email'];
        $mypassword=$_POST['pass'];
        
        // To protect MySQL injection (more detail about MySQL injection)
        $myemail = stripslashes($myemail);
        $mypassword = stripslashes($mypassword);
        $myemail = mysql_real_escape_string($myemail);
        $mypassword = mysql_real_escape_string($mypassword);
        
        $mypassword = md5($mypassword);
        
        //
        $sql="select COUNT(*) from users where email='$myemail'";
        $result = mysql_query($sql, $con);
        
        if (mysql_result($result, 0) == 0)
        {
            //echo "User doesnt not exist, let's create one!";
            $sql="INSERT INTO users(email, password) VALUES('$myemail', '$mypassword')";
            $result=mysql_query($sql, $con);
            
            // create folders
            $thisdir = getcwd();
            
            $path = $thisdir . "/bank/" . $myemail;
            mkdir( $path, 0777);
            $pathdata = $path . "/original";
            mkdir( $pathdata, 0777);
            $pathmodified = $path . "/modified";
            mkdir( $pathmodified, 0777);

            
            //back to main page
            echo "User registered";
            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        }
        else
        {
            // back to same page
            echo "User: '". $myemail ."' already exists in database";
            echo "<meta http-equiv='refresh' content='1;url=register.php'>";
        }
    }
    
    else
    {
    ?>

    <p>Enter account informations</p>
    <form method="post">
    <p>
    Email*: <input type="text" name="email"><br>
    Password*: <input type="text" name="pass"><br>
    <input type="submit" value="Register">
    </p>
    <p>* Required fields</p>
    </form>

<?php
    }
    ?>
