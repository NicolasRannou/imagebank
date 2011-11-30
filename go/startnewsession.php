<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Formulaires</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   </head>
   <body>
		
    <form id='login' action='login.php' method='post' accept-charset='UTF-8'>
        <fieldset >
            <legend>Login</legend>
            <input type='hidden' name='submitted' id='submitted' value='1'/>
            <label for='username' >UserName*:</label>
            <input type='text' name='username' id='username'  maxlength="50" />
            <label for='password' >Password*:</label>
            <input type='password' name='password' id='password' maxlength="50" />
            <input type='submit' name='Submit' value='Submit' />
        </fieldset>
    </form>

    <form id='createnewuser' action='createnewuser.php' method='post' accept-charset='UTF-8'>
            <button type="submit"><b><i>Create new user</i></b></button>
    </form>

    <form id='createdb' action='admin/createdb.php' method='post' accept-charset='UTF-8'>
        <button type="submit"><b><i>Create database</i></b></button>
    </form>

   </body>
</html>

