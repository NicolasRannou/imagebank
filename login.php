<?php
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
    $mypassword=$_POST['password'];
    $myemail=$_POST['email'];
        
    // To protect MySQL injection (more detail about MySQL injection)
    $mypassword = stripslashes($mypassword);
    $myemail = stripslashes($myemail);
    $mypassword = mysql_real_escape_string($mypassword);
    $myemail = mysql_real_escape_string($myemail);
        
    $sql="SELECT * FROM $tbl_name WHERE email='$myemail' and password='$mypassword'";
    $result=mysql_query($sql);
    
    // Mysql_num_row is counting table row
    $count=mysql_num_rows($result);
    // If result matched $myemail and $mypassword, table row must be 1 row
    if($count==1){
        // Register $myusername, $mypassword and $myemail and redirect to file "login_success.php"
        session_register("myemail");
        session_register("myusername");
        session_register("mypassword");
        header("location:registeredarea.php");
    }
    else {
        echo "Wrong Username or Password";
        echo "<meta http-equiv='refresh' content='3;url=index.php'>";
    }
?>