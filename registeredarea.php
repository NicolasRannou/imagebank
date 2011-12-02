<?php
require("login.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
<title>Registered area</title>

<!-- requiered scripts -->

<script type="text/javascript" src="js/ajax.js"></script>
<link href="css/registeredarea.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="libs/js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="libs/js/jquery.easing.1.3.js"></script>
<script src="libs/jqueryFileTree.js" type="text/javascript"></script>
<link href="libs/jqueryFileTree.css" rel="stylesheet" type="text/css" media="screen" />

<!-- Create the tree and input in javascript -->

<script type="text/javascript">
var directory = '../../bank/';
var myemail = "<?php echo $_SESSION['myemail']; ?>";
var fullpath = directory.concat(myemail);

$(document).ready( function() {
    $('#fileTree').fileTree({ root: fullpath.concat("/"), script: 'libs/connectors/jqueryFileTree.php' }, function(file) {
                                  openImage(file)
                                  ;})                  ;});
$(document).ready(function() {
                  $("#target").keypress(function(event) {
                                        if(event.which == 13){
                                        executeCommand( $("#target").val() );
                                        }
                                        });
                  });

// update images on refresh
UpdateImages();
</script>

</head>
<body>

    <div id="slidedown_bottom">
    <div class="demo">
    <h2>
    <?php echo 'Welcome ' ?>
    <?php echo $_SESSION["myemail"] ?>
    <br /></h2>

    <form enctype="multipart/form-data" action="upload.php" method="POST">
    Please choose a file: <input name="uploaded" type="file" /><br />
    <input type="submit" value="Upload" />
    </form>

    <table border="1">
        <tr>
            <td>Your images</td>
            <td>Preview</td>
            <td>Filters</td>
            <td>Filtered image</td>
        </tr>
        <tr>
            <td><div id="fileTree" class="fileTree"></div></td>
            <td><div id="preview"></div></td>
            <td><input id="target" type="text" value="enter your command" /></td>
            <td><div id="filtered"></div></td>
        </tr>
    </table>

    <div id="ajaxecho"></div>

    </div>
    </div>
</body>
</head>
</html>