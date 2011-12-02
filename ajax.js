function getXMLHttp()
{
  var xmlHttp

  try
  {
    //Firefox, Opera 8.0+, Safari
    xmlHttp = new XMLHttpRequest();
  }
  catch(e)
  {
    //Internet Explorer
    try
    {
      xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e)
    {
      try
      {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch(e)
      {
        alert("Your browser does not support AJAX!")
        return false;
      }
    }
  }
  return xmlHttp;
}

function UpdateCurrentImage(filename)
{
  var xmlHttp = getXMLHttp();
  
  xmlHttp.onreadystatechange = function()
  {
    if(xmlHttp.readyState == 4)
    {
      HandleUpdateCurrentImage(xmlHttp.responseText, filename);
    }
  }

  
  var im = "currentimage.php?var1=";
  var ag = im.concat(filename);
  
  xmlHttp.open("GET", ag, true); 
  xmlHttp.send(null);
}

function RequestImage(filename)
{
  var xmlHttp = getXMLHttp();
  
  xmlHttp.onreadystatechange = function()
  {
    if(xmlHttp.readyState == 4)
    {
      HandleResponse(xmlHttp.responseText, filename);
    }
  }
    
  xmlHttp.open("GET", "ajax.php?var1=value1&var2=value2", true); 
  xmlHttp.send(null);
}

function HandleUpdateCurrentImage(response, filename)
{
    //document.getElementById('preview').innerHTML = ag.concat("/>\"");
    document.getElementById('ajaxecho').innerHTML = response;
}

function HandleResponse(response, filename)
{
    //document.getElementById('preview').innerHTML = ag.concat("/>\"");
    document.getElementById('filtered').innerHTML = response;
}

function UpdateImageIfAny()
{
  RequestUpdateImageIfAny();
}

function RequestUpdateImageIfAny()
{
  var xmlHttp = getXMLHttp();
  
  xmlHttp.onreadystatechange = function()
  {
    if(xmlHttp.readyState == 4)
    {
      HandleResponseUpdateImageIfAny(xmlHttp.responseText);
    }
  }
    
  xmlHttp.open("GET", "currentimage.php", true); 
  xmlHttp.send(null);
}

function HandleResponseUpdateImageIfAny(response)
{
    //document.getElementById('preview').innerHTML = ag.concat("/>\"");
    document.getElementById('ajaxecho').innerHTML = "heeellloo";
    document.getElementById('ajaxecho2').innerHTML = response;
}

function openFile(file) {
    //document.getElementById('preview').innerHTML = "<img src=bank/rannou/25696c5.jpg>";
    var im = "<img id=\"myimage\" src=";
    var ag = im.concat(file.substring(6));
    document.getElementById('preview').innerHTML = ag.concat(" height=\"200\" width=\"200\" />");
    UpdateCurrentImage(file.substring(6));
}

function testCommand(file) {
    //document.getElementById('ajaxecho').innerHTML = file;
    UpdateTestCommand(file);
}

function UpdateTestCommand(file)
{
  var xmlHttp = getXMLHttp();
  
  xmlHttp.onreadystatechange = function()
  {
    if(xmlHttp.readyState == 4)
    {
      HandleResponseUpdateTestCommand(xmlHttp.responseText);
    }
  }
  
  var im = "testcommand.php?var1=";
  var ag = im.concat(file);
  
  xmlHttp.open("GET", ag, true);
  xmlHttp.send(null);
}

function HandleResponseUpdateTestCommand(response)
{
    //document.getElementById('preview').innerHTML = ag.concat("/>\"");
    document.getElementById('ajaxecho').innerHTML = response;
}

function preview(file) {
    var getvalue=document.getElementById("myimage").getAttribute("value");
    
    document.getElementById('filtered').innerHTML = file;
    //RequestImage();
    // get image name
    // get filter
    // server process
    // server sends new image location
}

function clicked() {
    var getvalue=document.getElementById("command").getAttribute("value");

    document.getElementById('ajaxecho').innerHTML = getvalue;
    //RequestImage();
    // get image name
    // get filter
    // server process
    // server sends new image location
}