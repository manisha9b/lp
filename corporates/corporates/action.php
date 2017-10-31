<?php
include_once 'includes/define.php';
include_once 'classes/Class_Database.php';
include_once 'classes/Util.php';

global $database;
$database=new Database();
$database->connect();

$action = Util::getControllerAction('view');
//echo $action;
switch($action) {
	case 'request_demo':
						 $name 			= isset($_POST['name'])?$_POST['name']:''; 		
						 $website 		= isset($_POST['website'])?$_POST['website']:''; 		
						 $designation 	= isset($_POST['designation'])?$_POST['designation']:''; 	
						 $emp_size 		= isset($_POST['emp_size'])?$_POST['emp_size']:'';		
						 $industry 		= isset($_POST['industry'])?$_POST['industry']:''; 	
						 $interested_in = isset($_POST['interested_in'])?$_POST['interested_in']:'';
						 $email 		= isset($_POST['email'])?$_POST['email']:''; 		
						 $mobile 		= isset($_POST['mobile'])?$_POST['mobile']:''; 		
						 $contact_thru 	= isset($_POST['contact_thru'])?$_POST['contact_thru']:''; 
						  $sql = "INSERT INTO `tbl_request_demo` (`name`, `website`, `designation`, `emp_size`, `industry`, `interested_in`, `email`, `mobile`, `contact_thru`, `cdate`) VALUES ('$name','$website','$designation',$emp_size,'$industry',$interested_in,'$email',$mobile,'$contact_thru', NOW())";
							$database->query($sql);
							echo " Thank You! for your request.";
			break;
	case 'request_call':
	
						 $organization 	= isset($_POST['organization'])?$_POST['organization']:''; 	
						 $website 	= isset($_POST['website'])?$_POST['website']:''; 	
						 $emp_size 		= isset($_POST['emp_size'])?$_POST['emp_size']:'';		
						 $email 		= isset($_POST['email'])?$_POST['email']:''; 		
						 $mobile 		= isset($_POST['mobile'])?$_POST['mobile']:''; 		
$first_name = "";						 
						  $sql = "INSERT INTO `tbl_request_call` (`organization`, `emp_size`, `mobile`, `email`,website, `cdate`) VALUES ('$organization','$emp_size','$mobile','$email','$website', NOW())";
							$database->query($sql);
							echo  "Thank You! for your request.";
							$email_header="<html><head></head><body>";

							$content="Hi ".$first_name.",
							<p>
							
Thank you for your interest in our Employee Healthcare Management packages.
Our Sales Team will contact you within One Business Day to discuss your specific needs
</p>
Thanks,<br/>
Pankaj	<br/>
<a href=\"www.EasyBuyHealth.com\">www.EasyBuyHealth.com</a>";
								
							$email_footer="</body></html>";		

							 $email_content	=	$email_header.$content;
							$database->sendSmtpEmail('', $email_content, 'EasyBuyHealth: We’ve Got Your Request!', $email, $first_name);
							$email_content ="<table border=\"0\">
<tr><td>Organization</td><td>:$organization</td></tr>
<tr><td>website</td><td>:$website</td></tr>
<tr><td>Employee Size</td><td>:$emp_size</td></tr>
<tr><td>website</td><td>:$email</td></tr>
<tr><td>Designation</td><td>:$mobile</td></tr>
</table>";
							// $email_content	=	$email_header.$content;
							$database->sendSmtpEmail('', $email_content, 'New Enquiry', 'manisha.yadav@easybuyhealth.com', $first_name);
			break;
	case 'contact':
						include_once 'assets/php/mail.php';
						if ( !empty($fname) && !empty($lname) && !empty($subject) && !empty($email) && !empty($msg) ){
						$sql = "INSERT INTO `tbl_contact` (`fname`, `lname`, `subject`, `email`, `message`, `cdate`) VALUES ('$fname','$lname','$subject','$email','$msg', 'now()');";
							$database->query($sql);
							echo 1;
						}
			break;
}
