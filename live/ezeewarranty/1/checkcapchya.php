<?php ob_start();
session_start();

if($_SESSION[BRAND_NAME]['capcode']==$_POST['ccode'])
{
echo 'OK';	
}else{
echo 'NO';	
}