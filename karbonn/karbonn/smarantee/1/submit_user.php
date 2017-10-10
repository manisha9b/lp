<?php

	$name=$_POST['name'];
	$email=$_POST['email'];
    $phone=$_POST['contact'];
    $Brand='smarantee1';
   // $frmtype="SSP_float";
   // $source=$_POST['source'];
	$city=$_POST['city'];
	$model=$_POST['model'];
	$imei_no=$_POST['imei_no'];
	$amount= 499;
	//$p_range=$_POST['price'];
	$purchase_date_arr=explode('/',$_POST['purchase_date']);;
	$purchase_date = $purchase_date_arr['2'].'-'.$purchase_date_arr['1'].'-'.$purchase_date_arr['0'];
	/*$_POST['productinfo'] = $_POST['Brand'];
	$_POST['udf1'] = $_POST['model'];
	$_POST['surl'] = SUCCESS_URL;
	$_POST['furl'] = FAILURE_URL;
	$_POST['curl'] = FAILURE_URL;
	$_POST['service_provider'] = 'payu_paisa';
	$_POST['key'] = 'rjQUPktU';*/
	if($name=="" && $email=="")
	{
		//echo '';
	}else{
	 $insert_query="INSERT INTO `user` (`user_id`, `name`, `contact`, `email`,`city`, `Brand`,`model`, `amount`, `imei_no`, purchase_date,`cdate`) VALUES
	('', '".$name."', '".$phone."', '".$email."','".$city."','".$Brand."','".$model."', '".$amount."', '".$imei_no."', '".$purchase_date."', now());";		
	mysql_query($insert_query);
	$user_id = mysql_insert_id();
	
	$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
 $insert_query="INSERT INTO `orders` (`user_id`, `amount`, `transaction_id`, `cdate`) VALUES
	( '".$user_id."', '".$amount."', '".$txnid."', now());";		
	mysql_query($insert_query);
	$ord_id = mysql_insert_id()	;
	 $insert_query="INSERT INTO `order_log` (`ord_id`, `cdate`) VALUES
	( '".$ord_id."',  now());";		
	mysql_query($insert_query);
	
}
