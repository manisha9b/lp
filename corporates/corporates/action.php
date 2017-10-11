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
						 $emp_size 		= isset($_POST['emp_size'])?$_POST['emp_size']:'';		
						 $email 		= isset($_POST['email'])?$_POST['email']:''; 		
						 $mobile 		= isset($_POST['mobile'])?$_POST['mobile']:''; 		 
						  $sql = "INSERT INTO `tbl_request_call` (`organization`, `emp_size`, `mobile`, `email`, `cdate`) VALUES ('$organization','$emp_size','$mobile','$email', NOW())";
							$database->query($sql);
							echo "Thank You! for your request.";
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
