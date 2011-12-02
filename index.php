<?
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
#<?php mail('huko.rannou@gmail.com', 'My Subject', 'Hello'); ?>
   <body>

   <form id='login' action='login.php?action=login' method='post' accept-charset='UTF-8'>
   <label for='username' >Email:</label>
   <input type='text' name='email' id='email'  maxlength="50" /> <br />
   <label for='password' >Password:</label>
   <input type='password' name='password' id='password' maxlength="50" /> <br />
   <button type="submit"><b><i>Login</i></b></button>
   </form>

   <form id='register' action='register.php' method='post' accept-charset='UTF-8'>
   <button type="submit"><b><i>Register</i></b></button>
   </form>

</body>
</html>

