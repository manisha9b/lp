<?php ob_start();
session_start();

if($_SESSION['capcode1']==$_POST['ccode'])
{
echo 'OK';	
}else{
echo 'NO';	
}