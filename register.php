<?php
    if (    isset($_POST['login']) AND !empty($_POST['login'])
        AND isset($_POST['pass'])  AND !empty($_POST['pass'])
        AND isset($_POST['email']) AND !empty($_POST['email']))
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
        
        $mypassword = md5($mypassword);
        
        //
        $sql="select COUNT(*) from users where name='$myusername'";
        $result = mysql_query($sql, $con);
        //echo mysql_result($result, 0);
        
        if (mysql_result($result, 0) == 0)
        {
            //echo "User doesnt not exist, let's create one!";
            $sql="INSERT INTO users(name, email, password) VALUES('$myusername', '$myemail', '$mypassword')";
            $result=mysql_query($sql, $con);
            
            // create folders
            $thisdir = getcwd();
            
            $path = $thisdir . "/bank/" . $myusername;
            mkdir( $path, 0777);
            $pathdata = $path . "/original";
            mkdir( $pathdata, 0777);
            $pathmodified = $path . "/modified";
            mkdir( $pathmodified, 0777);

            
            //back to main page
            echo "User registered";
            echo "<meta http-equiv='refresh' content='3;url=index.php'>";
        }
        else
        {
            // back to same page
            echo "User: '". $myusername ."' already exists";
            echo "<meta http-equiv='refresh' content='3;url=register.php'>";
        }
    }
    
    else
    {
    ?>

<p>Enter account informations</p>
<form method="post">
<p>
Username*: <input type="text" name="login"><br>
Password*: <input type="text" name="pass"><br>
Email*: <input type="text" name="email"><br><br>
<input type="submit" value="Register">
</p>
<p>* Required fields</p>
</form>

<?php
    }
    ?>
