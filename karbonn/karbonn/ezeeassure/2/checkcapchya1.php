<?php ob_start();
session_start();
include_once("includes/define.php");
if($_SESSION[BRAND_NAME]['capcode1']==$_POST['ccode'])
{
	echo 'OK';	
}else{
	echo 'NO';	
}