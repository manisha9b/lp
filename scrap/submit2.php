<?php 
	ob_start();
	session_start();
	include("includes/connectdb.php");
	error_reporting (E_ALL ^ E_NOTICE);

	$name=$_POST['name'];
	$email=$_POST['email'];
    $phone=$_POST['contact'];
    $source=$_POST['source'];
    $frmtype="SSP_Footer";
	
	if($name=="" && $email=="")
	{
		echo '';
	}else{
	echo"<br>==".$insert_query="INSERT INTO `ssp_landing` (`id`, `name`, `contact`, `email`, `create_date`, `modified_date`,`frmtype`,`post_date`) VALUES ('', '".$name."', '".$phone."', '".$email."', now(), '','".$frmtype."', now());";		
		
	mysql_query($insert_query);
	
	/*****send mail**/
	$msg =  "<table border='0' align='center' width='600' cellpadding='0' cellspacing='0' style='color:#666666;font-family:verdana;font-family:verdana;font-size:12;'><tr><td height='10'></td></tr>";		
	$msg .= "<tr><td height='20'></td></tr>";
	$msg .= "<tr><td width='35%' align='left' valign='top' style='padding-left:10px;'><font face=verdana size=2>Name</font></td><td width='65%' align='left'><font face=verdana size=2>:&nbsp;&nbsp;$name </font></td></tr><tr><td height='5'></td></tr>";
	$msg .= "<tr><td width='35%' align='left' valign='top' style='padding-left:10px;'><font face=verdana size=2>Phone No.</font></td><td width='65%' align='left'><font face=verdana size=2>:&nbsp;&nbsp;$phone </font></td></tr><tr><td height='5'></td></tr>";
	$msg .= "<tr><td width='35%' align='left' valign='top' style='padding-left:10px;'><font face=verdana size=2>Email Id</font></td><td width='65%' align='left'><font face=verdana size=2>:&nbsp;&nbsp;<a href='mailto:$email' title=$email>$email</a></font></td></tr><tr><td height='5'></td></tr>";
	$msg .= "<tr><td width='35%' align='left' valign='top' style='padding-left:10px;'><font face=verdana size=2>From</font></td><td width='65%' align='left'><font face=verdana size=2>:&nbsp;&nbsp;$source</font></td></tr><tr><td height='5'></td></tr>";		
	$msg .= "</table>";
		
	//$mailheaders ="From: $name<$email>\nContent-Type: text/html; charset=iso-8859-1";		
	$mailheaders = "MIME-Version: 1.0" . "\r\n";
	$mailheaders .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	// More headers
	$mailheaders .= "From: $name<$email>" . "\r\n";
	$mailheaders .= "Bcc:  digirepservices@gmail.com" . "\r\n";
	$newto1 ="info@sspadvantage.com";
					
	mail($newto1,"Enquiry from SSP Landing Page", $msg, $mailheaders);
			
	$msg1 = "<table cellpadding='0' cellspacing='2' width='450' style='font-family:Verdana; font-size:16px; margin:0 auto; font-weight:500; color:#000; line-height:22px;' border='0'><tr><td align='center'><a href='http://sspadvantage.com/' style='outline:none;'><img src='http://digitalrepublik.com/approval/SSP/landingpage/images/ssp.png' height='125px' alt='SSP' /></a></td></tr><tr><td colspan='2' height='20'>Dear  $name,</td></tr><tr><td colspan='2' height='20'></td></tr><tr><td colspan='2'>We are delighted to inform you that your enquiry with SSP has been successfully received.</td></tr><tr><td colspan='2' height='20'></td></tr><tr><td colspan='2'>Thank you! We assure you that our Expert will get back to you at the earliest.</td></tr><tr><td colspan='2' height='20'></td></tr><tr><td colspan='2'>Regards,</td></tr><tr><td colspan='2' style='font-weight:bold;'>SSP</td></tr><tr><td colspan='2'></td></tr></table>";
	
	$newto ="info@sspadvantage.com";
	$mailheaders1 ="From: SSP <$newto>\nContent-Type: text/html; charset=iso-8859-1";
				
	mail($email, "Thank You for your Enquiry with SSP", $msg1, $mailheaders1);
	
	$insert_id=base64_encode(mysql_insert_id());	
	header("location:thankyou.php?name=$name#thankyou");
}

?>