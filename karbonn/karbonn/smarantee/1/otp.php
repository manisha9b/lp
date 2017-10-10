<?php 
	//ob_start();
	session_start();

	include("includes/connectdb.php");
	include_once("includes/define.php");
	if(isset($_POST['verify_otp'])){
		$otp = isset($_POST['otp'])?$_POST['otp']:'';
		$uid = isset($_POST['uid'])?$_POST['uid']:'';
		$session_uid = $_SESSION['otp_uid'];
		$return['error'] = 1;
		$return['verified'] = 0;
		$return['msg'] = 'Invalid OTP';
		if($session_uid == $_SESSION['otp_uid']){
			 $sql = "select otp_id from tbl_otp where otp = $otp and user_id = $uid and is_active=1 and is_used=0 and exptime>NOW()";
			$query = mysql_query($sql);
			$r = mysql_fetch_array($query);
			if(isset($r['otp_id']) && $r['otp_id']>0){
				$otp_id = $r['otp_id']	;
				$sql = "UPDATE `tbl_otp` SET `is_used`='1' WHERE  `otp_id`=$otp_id";
				mysql_query($sql);
				$return['error'] = 0;
				$return['msg'] = 'Verified';
				$return['verified'] = 1;
				
			    $select_query="select ord_id from orders where user_id = '".$uid."'";	
				$query = mysql_query($select_query);
				if ($query) {
					$r = mysql_fetch_array($query);
					$ord_id = $r['ord_id']	;
					$query = mysql_query($select_query); 
					$update_query="update `orders` set status = 1, udate = NOW() where ord_id = '".$ord_id."'";	
					mysql_query($update_query);					
					 $insert_query="INSERT INTO `order_log` (`ord_id`, `cdate`,status) VALUES
									( '".$ord_id."',  now(),1);";		
					mysql_query($insert_query);
					$_SESSION['ord_status'] = 1;
				}							  
			
			//echo "<br/>
			//";
			
			}
		}
		echo json_encode($return);
		
	}else{
		
		if(isset($_POST['resend'])){
			$user_id = $_SESSION['otp_uid'] ;
		}else{
			include('submit_user.php');
			$update_query="update `orders` set payment_mode = 'cod', udate = NOW() where ord_id = '".$ord_id."'";	
					mysql_query($update_query);
			$_SESSION['txnid'] = $txnid;					
			$_SESSION['firstname'] = $name;					
			$_SESSION['amount'] = $amount;					
		}
		$_SESSION['ord_status'] = 0;
		$otp = rand(100000,999999);
		$sql = "INSERT INTO `tbl_otp` (`otp`, `cdate`, `exptime`, `user_id`) VALUES ($otp , NOW(), SUBDATE(NOW(),INTERVAL -10 Minute), $user_id);";
		mysql_query($sql);
	//	$return['otp'] = $otp;
		$return['uid'] = $user_id;
		$_SESSION['otp_uid'] = $user_id;
		//print_r($_SESSION);
		echo json_encode($return);
	}