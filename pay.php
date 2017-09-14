<?php 
	//ob_start();
	session_start();

	include("includes/connectdb.php");
	include_once("includes/define.php");
	print_R($_POST);
	error_reporting (E_ALL ^ E_NOTICE);
	//$_POST['firstname'] = $_POST['name'];
	//$_POST['phone'] = $_POST['contact'];
	$name=$_POST['name'];
	$email=$_POST['email'];
    $phone=$_POST['contact'];
    $Brand=$_POST['Brand'];
   // $frmtype="SSP_float";
   // $source=$_POST['source'];
	$city=$_POST['city'];
	$model=$_POST['model'];
	$imei_no=$_POST['imei_no'];
	$amount=$_POST['amount'] = 1;
	$p_range=$_POST['price'];
	/*$_POST['productinfo'] = $_POST['Brand'];
	$_POST['udf1'] = $_POST['model'];
	$_POST['surl'] = SUCCESS_URL;
	$_POST['furl'] = FAILURE_URL;
	$_POST['curl'] = FAILURE_URL;
	$_POST['service_provider'] = 'payu_paisa';
	$_POST['key'] = 'rjQUPktU';*/
	if($name=="" && $email=="")
	{
		echo '';
	}else{
	 $insert_query="INSERT INTO `user` (`user_id`, `name`, `contact`, `email`,`city`, `Brand`,`model`, `amount`, `imei_no`, `p_range`,`cdate`) VALUES
	('', '".$name."', '".$phone."', '".$email."','".$city."','".$Brand."','".$model."', '".$amount."', '".$imei_no."','".$p_range."', now());";		
	mysql_query($insert_query);
	$user_id = mysql_insert_id();
	
	$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
 $insert_query="INSERT INTO `orders` (`user_id`, `amount`, `transaction_id`, `cdate`) VALUES
	( '".$user_id."', '".$amount."', '".$txnid."', now());";		
	mysql_query($insert_query);
	$ord_id = mysql_insert_id()	;
	echo $insert_query="INSERT INTO `order_log` (`ord_id`, `cdate`) VALUES
	( '".$ord_id."',  now());";		
	mysql_query($insert_query);
	
}

?>
<form action="PayUMoney_form.php"  name="payuform" method=POST >
<input type="hidden" name="key"value="rjQUPktU" />
<input type="hidden" name="hash_string" value="" />
<input type="hidden" name="hash" />
<input type="hidden" name="txnid" value="<?php echo $txnid;?>"/>
<table>
<tr>
<td><b>Mandatory Parameters</b></td>
</tr>
<tr>
<td>Amount: </td>
<td><input name="amount"  value="<?php echo $amount;?>"/></td>
<td>First Name: </td>
<td><input name="firstname" id="firstname" value="<?php echo $name;?>" /></td>
</tr>
<tr>
<td>Email: </td>
<td><input name="email" id="email"  value="<?php echo $email;?>" /></td>
<td>Phone: </td>
<td><input name="phone"  value="<?php echo $phone;?>"/></td>
</tr>
<tr>
<td>Product Info: </td>
<td colspan="3"><textarea name="productinfo"><?php echo $Brand;?></textarea></td>
</tr>
<tr>
<td>Success URI: </td>
<td colspan="3"><input name="surl"  size="64" value="<?php echo SUCCESS_URL;?>"/></td>
</tr>
<tr>
<td>Failure URI: </td>
<td colspan="3"><input name="furl"  size="64" value="<?php echo FAILURE_URL;?>"/></td>
</tr>
<tr>
<td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" /></td>
</tr>
<tr>
<td><b>Optional Parameters</b></td>
</tr>
<tr>
<td>Last Name: </td>
<td><input name="lastname" id="lastname"  /></td>
<td>Cancel URI: </td>
<td><input name="curl" value="" /></td>
</tr>
<tr>
<td>Address1: </td>
<td><input name="address1" /></td>
<td>Address2: </td>
<td><input name="address2"  /></td>
</tr>
<tr>
<td>City: </td>
<td><input name="city" value="<?php echo $city;?>" /></td>
<td>State: </td>
<td><input name="state"  /></td>
</tr>
<tr>
<td>Country: </td>
<td><input name="country"  /></td>
<td>Zipcode: </td>
<td><input name="zipcode"  /></td>
</tr>
<tr>
<td>UDF1: </td>
<td><input name="udf1"  value=""/></td>
<td>UDF2: </td>
<td><input name="udf2"  /></td>
</tr>
<tr>
<td>UDF3: </td>
<td><input name="udf3"   /></td>
<td>UDF4: </td>
<td><input name="udf4"  /></td>
</tr>
<tr>
<td>UDF5: </td>
<td><input name="udf5"  /></td>
<td>PG: </td>
<td><input name="pg"  /></td>
</tr>
<td colspan="4"><input type="submit" value="Submit"  /></td>
</tr>
</table>
</form>
