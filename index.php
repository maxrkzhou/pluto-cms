<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pluto Technology</title>
<link href="css/index.css" rel="stylesheet" type="text/css" /><!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
</style>
<![endif]-->
<!--Context Menu CSS File-->
<link href="jQuery-contextMenu-master/src/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
<!--Jquery CSS Framework Libarary-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<!--Dialog Box CSS File-->
<link rel="stylesheet" href="css/dialog.css">


<!--The link for Jquery Library -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!--The link for Jquery UI Library-->
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<!--The link for CKEditor Library -->
<script src="ckeditor/ckeditor.js"></script>

<!--The Link for context menu e.g when right click the folder option -->
<script src="jQuery-contextMenu-master/jquery.touchSwipe.min.js"></script>
<script src="jQuery-contextMenu-master/screen.js"></script>
<script src="jQuery-contextMenu-master/src/jquery.ui.position.js"></script>
<script src="jQuery-contextMenu-master/src/jquery.contextMenu.js"></script>


<!--Inerternal Libarary -->
<script src="js/index.js"></script> 





</head>

<body>
<?php
require('content.php');
/**
 **Get the initiate value of the current directory.
 */
if($_GET['dir']!=null)$dir = $_GET['dir'];/*Not Root*/
else $dir = "/";/*Root*/
$file = $_GET['file'];/*Get the current file name*/


$contentDisplay = new Content($dir);

?>
<input type="hidden" id="dir" value="<?php echo $dir;?>"/>
<div class="container">
  <div class="header"><a href="#"><img src="http://www.pluto.com.au/images/logowithtagline.png" alt="Insert Logo Here" name="Insert_logo" width="20%" height="90" id="Insert_logo" style="background-color: #8090AB; display:block;" /></a>
    <!-- end .header --></div>
    
    
  <div class="sidebar1">
 		<?php

			if($contentDisplay->isFile()){
		?>
        	<ul class="nav">
				<li><a href="#" class="back" onclick="intepreteDir('<?php echo $dir; ?>','..')"><img src='img/back.png' height='20' width='20'/> back</a></li>
			</ul>
		<?php
			}
			else{
				$filesNames = scandir($dir);
				$contentDisplay->displayFiles($filesNames,$file);	
			}
		?>
    <!-- end .sidebar1 --></div>
  <div class="content">

    <?php
	
	if($contentDisplay->isFile()){
?>
    <h1>Text Editor Panel</h1>
 <form>
        <p>
            <textarea name="editor" id="editor"><?php echo file_get_contents($dir)?></textarea>
            <script>
                CKEDITOR.replace( 'editor' );
            </script>
        </p>
        <p>
            <input type="button" onclick="saveFile()" value="Save"/>
        </p>
    </form>
    <div id="feedback"></div>
<?php
	}
	else{
?>	
		<h1>File Control Panel</h1>
		<table id="filepanel">
        <tr>
        <td><img src='img/folder.png' height='20' width='20'/><a href="#" onclick="createFolders()">New Folder</a></td>
        <td><img src='img/file.png' height='20' width='20'/><a href="#" onclick="createFiles()">New File</a></td>
        </tr>
        </table>
    <div id="feedback"></div>


	

<?php
	}

?>
	<div id="renameBox">
    <table>
    <tr><td>Enter the name you want to change:</td></tr>
    <tr><td colspan="2"><input type="text" id="rename" name="rename" /></td></tr>
    </table>
	</div>
    
    
    <div id="deleteBox">
    <table>
    <tr><td>Do you want to delete this file?</td></tr>
    </table>
    </div>
    
    <div id="createBox">
    <table>
    <tr><td>Enter Your File's/Folder's Name:</td></tr>
    <tr><td colspan="2"><input type="text" id="create" name="create" /></td></tr>
    </table>
    </div>
    <!-- end .content --></div>

<script>
$('li').mousedown(function(event) {
    switch (event.which) {
        case 1://mouse left button
            break;
        case 2:
			//leave for mouse mid button
            break;
        case 3:
			 //$("#feedback").append(event.target.id);
             getFileName(event.target.id);
  			 $("#rename").val(event.target.id);	
            break;
        default:
            alert('You have a strange mouse');
    }

  //console.log(txt);
});



</script>
  <div class="footer">
    <p>Pluto Technology</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
