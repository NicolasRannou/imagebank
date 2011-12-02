# imagebank

FEATURES:
-AMP, javascipt and html
-easy setup
-use jquery
-admin secured area via htpsswd
-encrypted passwords in db (md5)
-php page requires login (if user not logged in an tries to access page, he is redirected to login page)
-secured against sql injection (TODO: check the command too)
-upload image
-can run any command from convert (maybe not enough restricted...?)
-for each user: 1 folder for original and 1 folder for processed images


# Pre requiered
MySQL
Php
Apache
ImageMagick

# Extract files
1-copy this folder to your websites directory

# Create MySQL user
2-phpMyadmin: add user that we will use
2-check create table with same name
3-update user and pass in admin/.my.conf

# Install image magick
5-http://www.imagemagick.org/script/binary-releases.php
6-update "$env_vars" in ajax/executecommand.php (mac issue?)

# Choose admin password
7-get new username and passord
http://www.addedbytes.com/lab/password-protect-a-directory-with-htaccess/#result
8- update admin/.htpasswd and admin/.htaccess

# Create the tables
9- go to the website, to the admin section: imagebank/admin
10- enter your username, password then create DB

# Mke the bank folder writeable
11- see chmod


# Everything is setup now!

TODO:
-preview not saved
-refresh issue
-user/admin modify password
-more secured?
-prettier (css)
-email image
-login page refresh
-upload/process update DB
-2 images with same name..?
-save images in db
-user modifies password
-admin modifies pass
-admin can do more stuffs -> send emails to user, 
-limit size max of image directory
-some refresh issues, field are getting empty, etc.
-check valid emails, etc.
-check command input
