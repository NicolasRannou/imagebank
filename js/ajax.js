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

function HandleUpdateCurrentImage(response, filename)
{
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
    
  xmlHttp.open("GET", "currentimageupdate.php", true); 
  xmlHttp.send(null);
}

function HandleResponseUpdateImageIfAny(response)
{
    var im = "<img id=\"myimage\" src=";
    var ag = im.concat(file.substring(6));
    document.getElementById('preview').innerHTML = ag.concat(" height=\"200\" width=\"200\" />");
}

function openFile(file) {
    var im = "<img id=\"myimage\" src=";
    var ag = im.concat(file.substring(6));
    document.getElementById('preview').innerHTML = ag.concat(" height=\"200\" width=\"200\" />");
    UpdateCurrentImage(file.substring(6));
}

function testCommand(file) {
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
    document.getElementById('ajaxecho').innerHTML = response;
    
    images = response.split(" ");
    
    // set new image
    var im = "<img id=\"myimage\" src=";
    var ag = im.concat(images[1]);
    document.getElementById('filtered').innerHTML = ag.concat(" height=\"200\" width=\"200\" />");
}