
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


if($action=="deletefile"&&$dir!=NULL){
	if(!unlink($dir)) echo"delete failed!";
	else echo "Done!";
}

if($action=="deletefolder"&&$dir!=NULL){
	deleteFolder($dir);
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
		$fp=fopen($dir,"w");
		fclose($fp);
		echo "Done!";
	}
	else echo "Create Failed";	
}



function deleteFolder($dir){
	$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
	$files = new RecursiveIteratorIterator($it,
             RecursiveIteratorIterator::CHILD_FIRST);
	foreach($files as $file) {
		if ($file->getFilename() === '.' || $file->getFilename() === '..') {
			continue;
		}
		if ($file->isDir()){
			rmdir($file->getRealPath());
		} else {
			unlink($file->getRealPath());
		}
	}
	if(!rmdir($dir)) echo"delete failed!";
	else echo "Done!";
}
?>
