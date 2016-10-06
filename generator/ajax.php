<?php
if(empty($_POST['act']))
{
        die ('');
}
include(dirname(__FILE__).'/functions.php');
$act = $_POST['act'];
$userId = getUserId();
if($act == 'saveFile') {
        $content = $_POST['content'];
        
        $formTitle = $userId;
        if(!empty($_POST['formTitle']))
                $formTitle = $_POST['formTitle'];
        $_SESSION['txtFileName'] = $formTitle;
        $fileUrl = generateTextFile($content,$formTitle) ;
        $_SESSION['url']=$fileUrl;
		echo $_SESSION['txtFileName'];
} else if ($act == 'generateForm') {
        $formTitle = '';
        if(!empty($_POST['formTitle']))
					$formTitle = $_POST['formTitle'];
        $_SESSION['txtFileName'] = $formTitle;
        $content = $_POST['content'];
		if(isset($_POST['admin']))
				$admin = $_POST['admin']==1?1:0;
				$admin=0;
        $fileUrl = generateFormFile($formTitle,$content,$userId,$admin) ;
        die($fileUrl);
} else {
        die('');
}
        
