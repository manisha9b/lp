<?php 
	//ob_start();
	session_start();

	include("includes/connectdb.php");
	include_once("includes/define.php");
	//print_R($_POST);
	error_reporting (E_ALL ^ E_NOTICE);
	//$_POST['firstname'] = $_POST['name'];
	//$_POST['phone'] = $_POST['contact'];
	$name=$_POST['name'];
	$email=$_POST['email'];
    $phone=$_POST['contact'];
    $Brand='eazeeassure1';
   // $frmtype="SSP_float";
   // $source=$_POST['source'];
	$city=$_POST['city'];
	$model=$_POST['model'];
	$imei_no=$_POST['imei_no'];
	$amount= 400;
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
		//echo '';
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
	 $insert_query="INSERT INTO `order_log` (`ord_id`, `cdate`) VALUES
	( '".$ord_id."',  now());";		
	mysql_query($insert_query);
	
}

?>
<html>
<head>
<script>
   
    function submitPayuForm() {
      //alert("hello");
      var payuForm = document.forms.payuForm;
	 // alert(payuForm);
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
<form action="PayUMoney_form.php"  name="payuForm" method=POST >
<input type="hidden" name="key"value="<?php echo PAYU_KEY;?>" />
<input type="hidden" name="hash_string" value="" />
<input type="hidden" name="hash" />
<input type="hidden" name="txnid" value="<?php echo $txnid;?>"/>
<table>

<tr>

<td><input type="hidden" name="amount"  value="<?php echo $amount;?>"/></td>

<td><input type="hidden" name="firstname" id="firstname" value="<?php echo $name;?>" /></td>
</tr>
<tr>

<td><input type="hidden" name="email" id="email"  value="<?php echo $email;?>" /></td>

<td><input type="hidden" name="phone"  value="<?php echo $phone;?>"/></td>
</tr>
<tr>

<td colspan="3"><input type="hidden" name="productinfo"  value="<?php echo $Brand;?>"/>
</tr>
<tr>

<td colspan="3"><input type="hidden" name="surl"  size="64" value="<?php echo SUCCESS_URL;?>"/></td>
</tr>
<tr>

<td colspan="3"><input type="hidden" name="furl"  size="64" value="<?php echo FAILURE_URL;?>"/></td>
</tr>
<tr>
<td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" /></td>
</tr>

<tr>

<td><input type="hidden" name="lastname" id="lastname"  /></td>

<td><input type="hidden" name="curl" value="" /></td>
</tr>
<tr>

<td><input type="hidden" name="address1" /></td>

<td><input type="hidden" name="address2"  /></td>
</tr>
<tr>

<td><input type="hidden" name="city" value="<?php echo $city;?>" /></td>

<td><input type="hidden" name="state"  /></td>
</tr>
<tr>

<td><input type="hidden" name="country"  /></td>

<td><input type="hidden" name="zipcode"  /></td>
</tr>
<tr>

<td><input type="hidden" name="udf1"  value=""/></td>

<td><input type="hidden" name="udf2"  /></td>
</tr>
<tr>

<td><input type="hidden" name="udf3"   /></td>

<td><input type="hidden" name="udf4"  /></td>
</tr>
<tr>

<td><input type="hidden" name="udf5"  /></td>

<td><input type="hidden" name="pg"  /></td>
</tr>

</table>
</form>
<div class="loader">
	Please wait...
	</div>
</body>
</html>