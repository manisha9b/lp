<?php
 $connectionflg =2;
  global $DB_HOST,$DB_USER,$DB_PASS;
  
  if($connectionflg == 1)
	{
		$DB_HOST = "localhost";
	    $DB_USER = "sspadvan_campaig";
	    $DB_PASS = "HfQO7JG4DXG5";
	    $DB_NAME = "sspadvan_campaign";	
					
	}
	if($connectionflg == 2)
	{
		$DB_HOST = "localhost";
	    $DB_USER = "root";
	    $DB_PASS = "";
	    $DB_NAME = "test";	
					
	}
  
  $db = mysql_connect($DB_HOST,$DB_USER,$DB_PASS) or die("No Connection");
  mysql_select_db($DB_NAME,$db) or  die("Error In database");
 
?>
