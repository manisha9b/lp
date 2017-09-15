<?php ob_start();
session_start();

if($_SESSION['capcode']==$_POST['ccode'])
{
echo 'OK';	
}else{
echo 'NO';	
}