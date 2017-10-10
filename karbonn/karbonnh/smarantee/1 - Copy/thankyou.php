<?php
session_start();
//print_r($_SESSION);
include("includes/connectdb.php");
	include_once("includes/define.php");
if (isset($_GET["sourcetype"]))
{
	$_SESSION["sourcetype"]=$_GET["sourcetype"];
}
if(isset($_SESSION["sourcetype"]))
{
	$source=$_SESSION["sourcetype"];
}
else
{
	$source="Adwords";	
}
$invoice_date = "";
$order_no = "";
 $select_query="select ord_id,DATE_FORMAT(udate,'%d, %M %Y') AS invoice_date from orders where transaction_id = '".$_SESSION['txnid']."'";		
			$query = mysql_query($select_query);
			if ($query) {
				$r = mysql_fetch_assoc($query);
				$invoice_date = $r['invoice_date'];
				$order_no = $r['ord_id'];
			}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>SSP</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    	<meta name="description" content="" />
    	<meta name="keywords" content="" />
    	<link  rel="shortcut icon" href="images/favicon.png" >
    	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<link rel="stylesheet" type="text/css" href="style/responsive.css">
         <link href="style/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
 
	</head>
	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" >
		<header id="header">
			<div class="container">
				
			</div>
    	</header>
			
    	
    	<div class="clear"></div>
    	<!-- <nav class="navbar navbar-default top-nav-collapse" role="navigation" >
	        <div class="container">
	            <div class="navbar-header page-scroll">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	            </div>
 
	            <div class="collapse navbar-collapse navbar-ex1-collapse">
	                <ul class="nav navbar-nav">
	                    <li class="hidden">
	                        <a class="page-scroll" href="#page-top"></a>
	                    </li>
	                   
	                </ul>
	                <div style="float:right; padding-top:17px; margin-right:80px;"> <img src="images/Karbonn_logo.png" width="105px" /></div>
	            </div>
	        </div>
		</nav> -->
	    <!--  main wrapper -->
			
           <section id="thankyou" class="main-row no-pb">
	    	<div class="container">
		    	<div class="row">
	    			<div class="col-sm-3 col-sm-offset-4">
						<a href="<?php echo WEBSITE_URL;?>"><img src="images/Karbonn_logo.png" width="105px" class="center-block" /></a>
					</div>
				</div>
					<div class="row">
	    			<div class="col-sm-8 col-sm-offset-3">
	    				<div>
	    					<br/><br/>
	    					Dear <?php echo $_SESSION['firstname']; ?>,<br/><br/>
	    					<?php 
							if($_SESSION['ord_status']==1){
								echo "Thank You. Your order status is place successfully<br/><br/>";
							    echo "Your Transaction ID for this transaction is ".$_SESSION['txnid'].".<br/><br/>";
							    echo "We have received a payment of Rs. " .$_SESSION['amount'] . ".";
							}
							else
							{
								echo "Your transaction is failed .Please try again later.<br/><br/>";
								echo "Your transaction transaction id for this transaction is".$_SESSION['txnid'];
							}
							
		  
		  ?>
		    			</div>
	    			</div>
		    	</div>
	    	</div>
	    </section>
           <section id="invoice"  class="main-row no-pb">
		   <div class="container" style="min-height:230px;">
		    	<div class="row">
	    			<div class="col-sm-8 col-sm-offset-3">
		   <?php if($_SESSION['ord_status']==1){include_once('invoice.php');}
		   //unset($_SESSION['ord_status']);
			//				unset($_SESSION['txnid']);
			//				unset($_SESSION['amount']);
		   ?>
		   </div>
	    			</div>
		    	</div>
		   </section>
	 
	    <script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.min.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
		<script type="text/javascript" src="js/requirement.js"></script>
		<!--
		Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
		-->
	
	</body>
</html>