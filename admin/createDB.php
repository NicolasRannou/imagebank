<?php        
    // parse file to get password
    $cnf = parse_ini_file(".my.cnf");
    
    $host=$cnf['host']; // Host name 
    $username=$cnf['user']; // Mysql username 
    $password=$cnf['password']; // Mysql password 
    $db_name=$cnf['database']; // Database name 
    $tbl_name="users"; // Table name
    
    // Connect to server and select databse.
    $con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    
    // select DB
    mysql_select_db("$db_name")or die("cannot select DB");
    
    // assume db exists (create from phpmyadmin with user
    // database should exist
    // create tables
    $sql="CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT, 
    PRIMARY KEY(id),
    name VARCHAR(100), 
    email VARCHAR(100),
    password VARCHAR(100))";
    
    if (mysql_query($sql, $con))
    {
        echo "Table users created";
    }
    else
    {
        echo "Error creating table users: " . mysql_error();
    }
    
    // create tables
    $sql="CREATE TABLE images(
    id INT NOT NULL AUTO_INCREMENT, 
    PRIMARY KEY(id),
    owner INT, 
    name VARCHAR(100),
    modified VARCHAR(100),
    type VARCHAR(100),
    date VARCHAR(100))";
    
    if (mysql_query($sql, $con))
    {
        echo "Table images created";
    }
    else
    {
        echo "Error creating table images: " . mysql_error();
    }
    
    mysql_close($con);
?>
