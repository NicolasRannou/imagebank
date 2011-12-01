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
    
    <form id='forgot' action='lost.php' method='forgot' accept-charset='UTF-8'>
            <button type="submit"><b><i>Forgot password?</i></b></button>
    </form>

   </body>
