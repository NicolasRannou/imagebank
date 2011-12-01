<?
require("login.php");
?>
<? 
session_start();
if(!session_is_registered(myusername)){
    echo "Wrong Username or Password";
    echo "<meta http-equiv='refresh' content='3;url=index.php'>";
}
?>

<html>
<head>
<title>jQuery Dock from Queness WebBlog</title>
<script type="text/javascript" src="libs/js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="libs/js/jquery.easing.1.3.js"></script>
<script src="libs/jqueryFileTree.js" type="text/javascript"></script>
<link href="libs/jqueryFileTree.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript">

$(document).ready( function() {
                  
                  $('#fileTreeDemo_1').fileTree({ root: '../../bank/', script: 'libs/connectors/jqueryFileTree.php' }, function(file) { 
                                                alert(file);
                                                });
                  
                  });
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
<h2>Default options</h2>
<div id="fileTreeDemo_1" class="demo"></div>
</div>
</div>

</body>
</head>
</html>