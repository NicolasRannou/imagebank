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

function HandleResponse(response, filename)
{
    //document.getElementById('preview').innerHTML = ag.concat("/>\"");
    document.getElementById('filtered').innerHTML = response;
}

function openFile(file) {
    //document.getElementById('preview').innerHTML = "<img src=bank/rannou/25696c5.jpg>";
    var im = "<img id=\"myimage\" src=";
    var ag = im.concat(file.substring(6));
    document.getElementById('preview').innerHTML = ag.concat(" height=\"200\" width=\"200\" />");
    //RequestImage(file);
}

function preview(file) {
    var getvalue=document.getElementById("myimage").getAttribute("src")
    
    document.getElementById('filtered').innerHTML = file;
    //RequestImage();
    // get image name
    // get filter
    // server process
    // server sends new image location
}