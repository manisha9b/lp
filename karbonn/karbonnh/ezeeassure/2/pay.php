<?php 
	//ob_start();
	session_start();

	include("includes/connectdb.php");
	include_once("includes/define.php");
	//print_R($_POST);
	error_reporting (E_ALL ^ E_NOTICE);
	//$_POST['firstname'] = $_POST['name'];
	//$_POST['phone'] = $_POST['contact'];
include('submit_user.php');
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