<?php
require_once("login.php");
?>

<html>
<head>
<title>Registered area</title>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="libs/js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="libs/js/jquery.easing.1.3.js"></script>
<script src="libs/jqueryFileTree.js" type="text/javascript"></script>
<link href="libs/jqueryFileTree.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript">
var directory = '../../bank/';
var a = "<?php echo $_SESSION['myemail']; ?>";
var full = String(directory.concat(a));
var full2 = full.concat("/");
$(document).ready( function() {
    $('#fileTreeDemo_1').fileTree({ root: full2, script: 'libs/connectors/jqueryFileTree.php' }, function(file) {
                                  openFile(file)
                                  ;})                  ;});
$(document).ready(function() {
                  $("#target").keypress(function(event) {
                                        if(event.which == 13){
                                        testCommand( $("#target").val() );
                                        }
                                        });
                  });

//UpdateImageIfAny();
</script>

<style>
body {
margin:0; 
padding:0
}

#slidedown_top {
height: 70px;
background-color:#666;
}

#slidedown_bottom {
position: absolute;
width: 100%;
height:100%;
background-color:#666;
}

#slidedown_content {
position: absolute;
width: 100%;
height: 250px;
top: -205px;
text-align:center;
background:url(libs/bg.gif) repeat-x 0 bottom;
z-index:999;
} 

#slidedown_content .content {
margin:0 auto; 
width:830px;
height:205px;
}

/* Styles for content */

#slidedown_content .content .block {
float:left; 
width:250px;
padding:0 4px 0 4px; 
margin: 0 4px 0 4px;

text-align:left;
font-family:georgia; 
font-size:11px; 
color:#ccc; 
}

#slidedown_content .footer {
height:40px;
}

#slidedown_content .content li {
padding:0; 
margin:4px 0
}

.clear {clear:both}

.example {
    float: left;
margin: 15px;
}

.demo {
width: 200px;
height: 400px;
    border-top: solid 1px #BBB;
    border-left: solid 1px #BBB;
    border-bottom: solid 1px #FFF;
    border-right: solid 1px #FFF;
background: #FFF;
overflow: scroll;
padding: 5px;
}
</style>
</head>
<body>

<div id="slidedown_bottom">
<div class="example">
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
<td><div id="fileTreeDemo_1" class="demo"></div></td>
<td><div id="preview"></div></td>
<td><div id="fileTreeDemo_2"></div>
<input id="target" type="text" value="enter your command" />
</td>
<td><div id="filtered"></div></td>
</tr>
<tr>
<td></td>
<td><div id="ajaxecho"></div></td>
<td></td>
<td></td></td>
</tr>
</table>
</div>
</div>
</body>
</head>
</html>