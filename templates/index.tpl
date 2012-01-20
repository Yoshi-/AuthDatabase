<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>RSCoders - AuthDB</title>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
  <script src="http://infodocs.org/library/fileNice/fileNice.js" type="text/javascript">
</script>
  <link rel="stylesheet" type="text/css" href=
  "http://infodocs.org/library/fileNice/skins/modulation/fileNice.css" />
  <link rel="stylesheet" type="text/css" href=
  "http://infodocs.org/library/fileNice/skins/modulation/icons.php" />
  <!-- script for applying the javascript events -->

  <script type="text/javascript">
//<![CDATA[
function divTog(id) {
    var element = document.getElementById(id);
    if (element.style.display == "none" || !element.style.display) {
        element.style.display = "block";
    } else if (element.style.display == "block") {
        element.style.display = "none";
    }
}
  //]]>
  </script>
</head>

<body>
    <div id="header">
      <h1 style="text-shadow: 0px 0px 1px black;"><a onclick="alert('Programming: Yoshi-, Contra');" href="#"
      title="About RSCoders AuthDB">AuthDB</a></h1>
      <h2><a href='index.php'>Home</a></h2>
      <h2><a href='index.php?site=new'>Submit Codes</a></h2>
	  <h2 style="float:right;">You can still view <?=_Auths_Left;?>/<?=_Auths_Per_Day?> codes</h2>
    </div>
  <br />
  <br />
  <?=$content;?>
  </body>
</html>
