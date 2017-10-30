<?php

$first_name		= 	$name;
$brand		= 	PRODUCT_NAME;
//$mobile_no		= 	"9769888532";
$otp = $otp;
$senderid = urlencode('SSPADV');
 $dest_mobileno = urlencode($phone);
//$sms_message	=	"Hi ".$first_name.", ".$cluster_business_name." has gifted you a Preventive Healthcare Package. Click on ".$shortDWName." to know more and download  eVoucher. Regards, ".$hr_full_name.",HR,".$cluster_business_name;
$sms_message = "Thankyou for choosing $brand for your new Karbonn handset
Your OTP for cash on delivery is $otp.";
		
$url="http://www.smsjust.com/sms/user/urlsms.php?username=pickmesolutionsindia&pass=a8_p!1RS&senderid=".$senderid."&dest_mobileno=".$dest_mobileno."&udh=0&message=".urlencode($sms_message)."&response=Y";
$f_content = file_get_contents($url);
           $number = addslashes($dest_mobileno);
           $message = addslashes($sms_message);
            $response = addslashes($f_content);
	    $sql = "INSERT INTO karbon_sms_log(dest_mobileno,message,response,cdate) values('$number','$message','$response',NOW())";
		mysql_query($sql);	

?>