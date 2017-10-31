<?php ob_start();include_once("includes/define.php");
session_start();
include_once("includes/define.php");//print_r($_SESSION);
if($_SESSION[BRAND_NAME]['capcode']==$_POST['ccode'])
{
echo 'OK';	
}else{
echo 'NO';	
}