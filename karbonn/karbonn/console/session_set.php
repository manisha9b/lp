<?php
session_start();
session_unset();
//session_set_cookie_params(0, '/', 'easybuyhealth.com');
include_once 'includes/define.php';
include_once 'includes/connectdb.php';
$success=0;
$login = isset($_POST['username'])?$_POST['username']:'';
$password = isset($_POST['password'])?md5($_POST['password']):'';
$result['mesg'] = "Invalid Login Credentials";
$result['error'] = 1;
if(!empty($login) && !empty($password)){
	$select_query = "select ul_id,firstname,count(1) as count from user_login where username = '".$login."' and password = '".$password."' " ;
	$query = mysql_query($select_query);
	if ($query) {
				$r = mysql_fetch_assoc($query);
				
				if($r['count']>0){
					$userId = $r['ul_id']	;
					$firstname = $r['firstname']	;
					$_SESSION['userLoginId'] = $userId;	
					$_SESSION['name'] = $firstname;
					$result['mesg'] = "";
					$result['error'] = 0;
					$result['url'] = ADMIN_WEBSITE_URL;
				}
			}	
}

echo json_encode($result);
?>