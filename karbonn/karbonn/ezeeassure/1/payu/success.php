<?php
	include("../includes/connectdb.php");
	include_once("../includes/define.php");
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt=PAYU_SALT;
session_start();
echo "I am here";
If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		/* echo "<pre>";
		 print_r($_POST);
		 echo $posted_hash;
		 echo "<br/>
		 ";
		 echo $retHashSeq;
		
		 ";
		 echo $hash;*/ 
		 $hash = hash("sha512", $retHashSeq);
		  
       if ($hash != $posted_hash) {
	     //  echo "Invalid Transaction. Please try again";
		   }
	   else {
		  
            $update_query="update `orders` set status = 1, udate = NOW() where transaction_id = '".$txnid."'";		
			//echo "<br/>
			//";
			 mysql_query($update_query);
			 $select_query="select ord_id from orders where transaction_id = '".$txnid."'";		
			$query = mysql_query($select_query);
			//echo "<br/>
			//";
			//echo $query."";
			if ($query) {
				$r = mysql_fetch_array($query);
				$ord_id = $r['ord_id']	;
				 $insert_query="INSERT INTO `order_log` (`ord_id`, `cdate`,status) VALUES
								( '".$ord_id."',  now(),1);";		
				mysql_query($insert_query);
			}	
			$_SESSION['firstname'] = 	$firstname;		
			$_SESSION['ord_id'] = 	$ord_id;		
			$_SESSION['ord_status'] = 	'1';		
			$_SESSION['amount'] = 	$amount;		
			$_SESSION['txnid'] = 	$txnid;		
			
         /* echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
           */
		  // session_destroy();
		   header('Location: '.WEBSITE_URL.'/thankyou.php');
		   }         
?>	