<?php
include(dirname(__FILE__).'/functions.php');
$userId = getUserId();
if($_GET['type'] == 'txt') {
	//header("location:index.php");
       /* $realFilename = (!empty($_SESSION['txtFileName'])?$_SESSION['txtFileName']:$userId) . '.txt';//$_SESSION['txtFileName'] . '.txt';
      $filename =$_SESSION['txtFileName'].'.txt';
	   // $filename =  $userId .'.txt';
        //$filepath = DATA_PATH.'/'.$userId .'.txt';
		$filepath = DATA_PATH.'/'.$realFilename .'.txt';
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-type: text/plain");
        header("Content-Disposition: attachment; filename=".$filename);
        //header("Content-Transfer-Encoding: binary");
        //header("Content-Length: ".filesize($filepath));
        ob_end_flush();
        @readfile($filepath);
		*/
		$file = DATA_PATH.'/'.$_SESSION['txtFileName'].'.txt';
	//	$file=DATA_PATH.'/'.'57f21b11c1575.txt';
		if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
		deleteTempFiles();
		}else
		echo "not found";
} else if($_GET['type'] == 'zip') {
        $realFilename = (!empty($_SESSION['txtFileName'])?$_SESSION['txtFileName']:$userId) . '.zip';
        
        $filename =  $userId .'.zip';
        $filepath = DATA_PATH.'/zip'.$userId .'.zip';
        $content = file_get_contents(DATA_PATH.'/'.$userId . '.html');
        
        getHtml($content, $filepath);
        
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private");
        header("Content-Description: File Transfer");
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=".$filename);
        header("Content-Transfer-Encoding: binary");
        
        ob_end_flush();
        @readfile($filepath);
		deleteTempFiles();
				
}
