<?php
	include("../includes/connectdb.php");
	include_once("../includes/define.php");
	session_start();
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];

$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="GQs7yium";
$_SESSION['firstname'] = 	$firstname;		
			$_SESSION['ord_id'] = 	$ord_id;		
			$_SESSION['ord_status'] = 	0;		
			$_SESSION['amount'] = 	$amount;		
			$_SESSION['txnid'] = 	$txnid;
			$update_query="update `orders` set status = 0, udate = NOW() where transaction_id = '".$txnid."'";		
			mysql_query($update_query);
			$select_query="select ord_id from  where transaction_id = '".$txnid."'";		
			$query = mysql_query($select_query);
If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
	      // echo "Invalid Transaction. Please try again";
		   }
	   else {
			
			//echo "<br/>
			//";
			//echo $query."";
			if ($query) {
				$r = mysql_fetch_array($query);
				$ord_id = mysql_insert_id()	;
				 $insert_query="INSERT INTO `order_log` (`ord_id`, `cdate`,status) VALUES
								( '".$ord_id."',  now(),1);";		
				mysql_query($insert_query);
			}	
			
			/*echo "<h3>Your order status is ". $status .".</h3>";
			echo "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
          */
		 } 
		 header('Location: '.WEBSITE_URL.'/thankyou.php');
?>
<!--Please enter your website homepagge URL -->

