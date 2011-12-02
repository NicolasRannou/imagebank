// helper method
//
//

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


// When we open an image
//
//

function openImage(file) {
    var im = "<img id=\"myimage\" src=";
    var ag = im.concat(file.substring(6));
    document.getElementById('preview').innerHTML = ag.concat(" height=\"200\" width=\"200\" />");
    RequestOpenImage(file.substring(6));
}

function RequestOpenImage(filename)
{
  var xmlHttp = getXMLHttp();
  
  xmlHttp.onreadystatechange = function()
  {
    if(xmlHttp.readyState == 4)
    {
      HandleOpenImage(xmlHttp.responseText, filename);
    }
  }

  
  var im = "ajax/loadimage.php?var1=";
  var ag = im.concat(filename);
  
  xmlHttp.open("GET", ag, true); 
  xmlHttp.send(null);
}

function HandleOpenImage(response, filename)
{
}

// When we refresh the page
//
//

function UpdateImages()
{
  RequestUpdateImage();
}

function RequestUpdateImage()
{
  var xmlHttp = getXMLHttp();
  
  xmlHttp.onreadystatechange = function()
  {
    if(xmlHttp.readyState == 4)
    {
      HandleResponseUpdateImage(xmlHttp.responseText);
    }
  }
    
  xmlHttp.open("GET", "ajax/updateimages.php", true); 
  xmlHttp.send(null);
}

function HandleResponseUpdateImage(response)
{
    images = response.split(" ");
    //
    var im = "<img id=\"myimage\" src=";
    var ag = im.concat(images[0]);
    document.getElementById('preview').innerHTML = ag.concat(" height=\"200\" width=\"200\" />");
    
    // set new image
    var im = "<img id=\"myimage\" src=";
    var ag = im.concat(images[1]);
    document.getElementById('filtered').innerHTML = ag.concat(" height=\"200\" width=\"200\" />");
}

// When a command is executed
//
//

function executeCommand(file) {
    UpdateExecuteCommand(file);
}

function UpdateExecuteCommand(file)
{
  var xmlHttp = getXMLHttp();
  
  xmlHttp.onreadystatechange = function()
  {
    if(xmlHttp.readyState == 4)
    {
      HandleResponseExecuteCommand(xmlHttp.responseText);
    }
  }
  
  var im = "ajax/executecommand.php?var1=";
  var ag = im.concat(file);
  
  xmlHttp.open("GET", ag, true);
  xmlHttp.send(null);
}

function HandleResponseExecuteCommand(response)
{
    document.getElementById('ajaxecho').innerHTML = response;
    
    images = response.split(" ");
    
    // set new image
    var im = "<img id=\"myimage\" src=";
    var ag = im.concat(images[1]);
    document.getElementById('filtered').innerHTML = ag.concat(" height=\"200\" width=\"200\" />");
}