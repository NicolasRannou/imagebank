# Pre requiered
MySQL
Php
Apache

ImageMagick
http://www.imagemagick.org/script/binary-releases.php
put location in script

# Extract files
1-copy this folder to your websites directory

# Create MySQL user
2-phpMyadmin: add user that we will use
2- check create table with same name
3-update user and pass in admin/.my.conf

# Choose admin password
4-update admin password
http://www.addedbytes.com/lab/password-protect-a-directory-with-htaccess/#result

FEATURES:
-MAMP, javascipt and html
-easy setup
-admin secured area
-encrypted passwords in db
-php page requires login (if user not logged in an tries to access page, he is redirected to login page)
-secured against sql injection (TODO: check the command too)
-upload image
-can run any command from convert (maybe not enough restricted...?)
-for each user: 1 folder for original and 1 folder for processed images
-if file already on server it's fine

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

user modifies password
admin modifies pass
admin can do more stuffs -> send emails to user, 

limit size max of image directory
some refresh issues, field are getting empty, etc.

chmod 777 some files
images still visible after refresh

command modified
check command input
