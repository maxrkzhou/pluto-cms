
<?php
$action = $_GET['action'];
$dir = $_GET['dir'];
$plainContent = $_GET['plaincontent'];
$webContent = $_GET['webcontent'];
$name = $_GET['name'];
$sourceDir = $_GET['sourcedir'];
$destDir = $_GET['destdir'];

if($action=="save"&&$dir!=NULL&&$webContent!=NULL) {
	file_put_contents($dir,$webContent);
	echo "save successfully";
}
if($action=="rename"&&$dir!=NULL&&$name!=NULL) {
	if(!rename($dir, $name)) echo"rename failed!";
	else echo "Done!";
}


if($action=="delete"&&$dir!=NULL){
	if(!unlink($dir)) echo"delete failed!";
	else echo "Done!";
}


if($action=="copy"&&$sourceDir!=NULL&&$destDir!=NULL) {
	if(!copy($sourceDir,$destDir)) echo"copy failed!";
	else echo "Done!";
}

	
if($action=='cut'){
	if(!rename($sourceDir, $destDir)) echo"cut failed!";
	else echo "Done!";
}


if($action=='newfolder'){
	if(!file_exists($dir)){
		if(!mkdir($dir)) echo"create failed!";
		else echo "Done!";
	}
	else echo "Create Failed";	
}

if($action=='newfile'){
	if(!file_exists($dir)){
		$fp = fopen($dir,"w");
		fclose($fp);
		echo "Done!";
	}
	else echo "Create Failed";	
}
?>
