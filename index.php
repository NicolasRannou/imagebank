<?
session_name("MyLogin");
session_start();
session_destroy();

if($_GET['login'] == "failed") {
    print $_GET['cause'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Login</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   </head>
   //<?php mail('huko.rannou@gmail.com', 'My Subject', 'Hello'); ?>
   <?php include("body.php"); ?>
</html>

