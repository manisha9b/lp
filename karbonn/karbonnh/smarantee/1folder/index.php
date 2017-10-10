<?php
session_start();
		   unset($_SESSION['ord_status']);
							unset($_SESSION['txnid']);
							unset($_SESSION['firstname']);
							unset($_SESSION['amount']);
							unset($_SESSION['otp_uid']);
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
	include("includes/connectdb.php");
	include_once("includes/define.php");
	$model_result = getModelLess();
	$model_options = $model_result['html'];
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Karbonn</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    	<meta name="description" content="" />
    	<meta name="keywords" content="" />
    	<link  rel="shortcut icon" href="images/favicon.png" >
    	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<link rel="stylesheet" type="text/css" href="style/responsive.css">
		<link rel="stylesheet" type="text/css" href="style/bootstrap-datepicker.css">
         <link href="style/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-99335163-1', 'auto');
		  ga('send', 'pageview');

		</script>
		<style>
		.none{
			display:none;
		}
		</style>
	</head>
    
	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" cz-shortcut-listen="true" style="">
		<header id="header">
			<div class="container">
				
			</div>
    	</header>
			
    	
    	<div class="clear"></div>
    	
	    <!--  main wrapper -->
	    <section>
	    	<div class="wrapper container" id="section_bg" >
		    	<div class="row" style="background-color: #FDC70D;">
		    		<div class="col-md-8" style="padding-right: 0px; padding-left:0px;">
					<img src="images/banner_final-5.jpg" class="img-responsive"> 
					</div>
		    		<div id="dpfrm" class="col-sm-4" style="float:right;border-top: 1.32em solid #1B242D;padding-left: 1%;">
		    			<div class="formbg">
		    				<h3 class="text-center fw-b">Buy Now</h3>
		    				<div class="heading_f text-center">
		    					    <i class="fa fa-phone" aria-hidden="true" style="color:#6fcddf"></i>&nbsp;Call us on 1800-120-2177<br>Or Fill in the form
		    				</div>
		    				<div class="fform">
		    				<div  id="DetailForm_div1" style="display:block;">
		    					<form name="DetailForm" id="DetailForm" method="post">
									<input type="hidden" name="source" value="<?=$source?>" />
									<input type="hidden" name="ccodec" id="ccodeidc" value="" />
                    				<div class="col-sm-12" style="margin-bottom:0;text-align:left;">
                    					<div id="alt_error" class="errormsg"></div>
                    				</div>
                    				<div class="col-sm-12">
	                    				<div class="frmfield">
	                    					<input type="text" name="name" maxlength="50" id="your_name" onKeyPress="return validData(event,'name')" value="" placeholder="Name*" />
	                    				</div>	
	                    			</div>
                                    <div class="col-sm-6">
		                    			<div class="frmfield">
	                          					<input type="text" name="contact" maxlength="10" id="mobile_number" onKeyPress="return validData(event,'num')"  value="" placeholder="Phone*" />
	                          				</div>
		                    		</div>
		                    		<div class="col-sm-6">
		                    			<div class="frmfield">
		                    				<input type="text" name="email" maxlength="100" id="user_email" oncopy="return false;" onpaste="return false;" oncut="return false;" value="" Placeholder="Email" />
		                    			</div>	
		                    		</div>
									<div class="row">	
										<div class="col-sm-12">
											<div class="col-sm-6">
												<div class="frmfield">
													<input type="text" name="city" maxlength="100" id="df_city"  value="" placeholder="City*" />
													
												</div>	
											</div>
										</div>
									</div>
	                    			<!-- <div class="col-sm-6">
                          				<div class="frmfield">
                          					<input type="text" name="Brand" maxlength="100" id="Brand"  value="Karbonn" readonly />
                          				</div>
	                    			</div> -->
									<div class="col-sm-6">
		                    			<div class="frmfield">
		                    				<!-- <input type="text" name="model" maxlength="100" id="df_model"  value="" placeholder="Model*" /> -->
											<select name="model" id="df_model">
											<option value="">Select Model</option>
											<?php echo $model_options;?>
                                            </select>
		                    			</div>	
		                    		</div>
	                    			<div class="col-sm-6">
                          				<div class="frmfield">
                          					<input type="text" name="imei_no" maxlength="100" id="df_imei_no"  value="" placeholder="IMEI No." />
                          				</div>
	                    			</div>
									<div class="row">	
									<div class="col-sm-12">
									
											<!-- <label for="inputEmail3" class="col-sm-6 control-label">Date of Purchase</label> -->
	                    				
												      
                <!--  <input type="text" class=" pull-right" id="datepicker" placeholder="Date of Purchase"> -->
               
											
										
										<div class="col-sm-6">
											<div class="frmfield">
	                    				
												      <input type="text" name="purchase_date" maxlength="100" id="datepicker"  value="" placeholder="Purchase Date" />
                <!--  <input type="text" class=" pull-right" id="datepicker" placeholder="Date of Purchase"> -->
               
											</div>	
										</div>
										</div>
										</div>
										<div class="row">	
										<div class="col-sm-12">
			                    			<div class="frmfield">
			                    				 <div class=" col-sm-6" >
													
													  <input type="radio" name="payment_method" id="online" value="online" checked />
													 Online Payment
													
												  </div>
												  <div class=" col-sm-6">
													
													  <input type="radio" name="payment_method" id="cod" value="cod">
													 Cash on Delivery
													
												  </div>
			                    			</div>
			                    		
			                    			<div class="clear"></div>
			                    		</div>
			                    		</div>
										<div>
		                    		
			                    		<div class="row" style="height:20px;">&nbsp;</div>
		                    		</div>
									
		                    		
										
										<div>
		                    			<div class="col-sm-6">
			                    			<div class="frmfield">
			                    				<div class="secu">
			                    					<img src="captcha/captcha_code_file.php?rand=<?php echo rand(); ?>"  />
			                    				</div>	
			                    			</div>
			                    		</div>
			                    		<div class="col-sm-6">
			                    			<div class="frmfield">
			                    				<input type="text" maxlength="3" name="captchya" id="captchya" autocomplete="off" oncopy="return false;" onpaste="return false;" oncut="return false;" onmouseleave="CheckCapchac(this.value)" onkeyup="CheckCapchac(this.value)" onmouseup="CheckCapchac(this.value)" onkeypress="CheckCapchac(this.value)" placeholder="Verify Code*" value="">
			                    			</div>
			                    		</div>
			                    		<div class="clear"></div>
		                    		</div>
									<div>
		                    			

		                    		</div>
		                    		<div>
		                    			<div class="col-sm-6" style="margin:0 auto; float:none; ">
		                    				<div class="frmfield">
		                    					<input type="button" value="Buy Now" name="submit1" name="submit1" style="font-size:24px; width:94%; height:38px; background:#fdc70d;" onClick="return validate()"  >
		                    				</div>	
		                    			</div>
		                    			<div class="clear"></div>
		                    		</div>
								</form>	
								<div class="clear"></div>
								</div>
		    				
		    				<div id="cod_div1" style="display:none;min-height:350px;">
							<form name="cod_form1" id="cod_form1" method="post">
							<input type="hidden" name="uid" id="uid1" value="" />
							<input type="hidden" name="verify_otp" value="1" />
									<div class="row-margin-top">
	                    				&nbsp;
	                    			</div>
						
								<div class="col-sm-12">
								<div class="col-sm-8">
	                    				<div class="frmfield">
	                    					<input type="text" name="otp" maxlength="50" id="otp1" onKeyPress="return validData(event,'num')" value="" placeholder="OTP*" />
	                    				</div>	
	                    			</div>
									<div class="col-sm-4">
	                    				<a href="javascript:void(0);" onClick="resendOTP(1);">Resend OTP</a>
	                    			</div>
	                    			</div>
									
                                    <div class="col-sm-12"> <div class="col-sm-12"><div  class="errormsg" style="display: block;padding-bottom:10px"><div id="msg1"></div></div></div></div>
                                   <!-- <div class="col-sm-12"><div class="alert alert-msg alert-dismissible alert-info" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-times"></i></button></div></div> -->
                                    <div class="col-sm-12">
                                    <div class="col-sm-6">
		                    			<div class="frmfield">
	                          					<input type="button" value="Verify OTP" name="submit_otp1" name="submit_otp1" style="font-size:18px;  height:28px; background:#fdc70d;" onClick="return validateOtp(1)"  >
	                          				</div>
		                    		</div>
		                    		</div>
									
		                    		
							</form>
		    				</div>
							</div>
		    			</div>
		    		</div>
		    		<div class="clear"></div>
		    		
		    	</div>	
	    	</div>
	    </section>
       
        
        <section id="resfrm" class="responsiveform">

	    	<div class="container">
		    	<div class="row">
	    			<div class="col-sm-8">
	    				<div>
		    				<h3 class="text-center fw-b">Buy Now</h3>
		    				<h4 class="text-center">
		    					    <i class="fa fa-phone" aria-hidden="true" style="color:#6fcddf"></i>&nbsp; Call us on 1800-120-2177<br/>Or Fill in the form
		    				</h4>
		    				<div class="fform" >
		    				<div  id="DetailForm_div2">
		    					<form name="DetailFormres" id="DetailFormres" method="post">
									<input type="hidden" name="source" value="<?=$source?>" />
									<input type="hidden" name="ccodec1" id="ccodeidc1" value="" />
                    				<div class="col-sm-12" style="margin-bottom:0;text-align:left;">
                    					<div id="alt_error1" class="errormsg"></div>
                    				</div>
                    				<div class="col-sm-12">
	                    				<div class="frmfield">
	                    					<input type="text" name="name" maxlength="50" id="your_name" onKeyPress="return validData(event,'name')" value="" placeholder="Name*" />
	                    				</div>	
	                    			</div>
                                    <div class="col-sm-6">
		                    			<div class="frmfield">
	                          					<input type="text" name="contact" maxlength="10" id="mobile_number" onKeyPress="return validData(event,'num')"  value="" placeholder="Phone*" />
	                          				</div>
		                    		</div>
		                    		<div class="col-sm-6">
		                    			<div class="frmfield">
		                    				<input type="text" name="email" maxlength="100" id="user_email" oncopy="return false;" onpaste="return false;" oncut="return false;" value="" Placeholder="Email*" />
		                    			</div>	
		                    		</div>
									<div class="row">	
										<div class="col-sm-12">
                                    <div class="col-sm-6">
		                    			<div class="frmfield">
		                    				<input type="text" name="city" maxlength="100" id="df2_city"  value="" placeholder="City*" />
                                            
		                    			</div>	
		                    		</div>
									</div>	
		                    		</div>
	                    			<!-- <div class="col-sm-6">
                          				<div class="frmfield">
                          					<input type="text" name="Brand" maxlength="100" id="Brand"  value="Karbaan" readonly />
                          				</div>
	                    			</div> -->

									<div class="col-sm-6">
		                    			<div class="frmfield">
		                    				<!-- <input type="text" name="model" maxlength="100" id="df_model"  value="" placeholder="Model*" /> -->
											<select name="model" id="df2_model">
											<option value="">Select Model</option>
											<?php echo $model_options;?>
                                            </select>
		                    			</div>	
		                    		</div>
	                    			<div class="col-sm-6">
                          				<div class="frmfield">
                          					<input type="text" name="imei_no" maxlength="100" id="df2_imei_no"  value="" placeholder="IMEI No." />
                          				</div>
	                    			</div>
	<div class="row">	
									<div class="col-sm-12">
									
											<!-- <label for="inputEmail3" class="col-sm-6 control-label">Date of Purchase</label> -->
	                    				
												      
                <!--  <input type="text" class=" pull-right" id="datepicker" placeholder="Date of Purchase"> -->
               
											
										
										<div class="col-sm-6">
											<div class="frmfield">
	                    				
												      <input type="text" name="purchase_date" maxlength="100" id="datepicker2"  value="" placeholder="Purchase Date" />
                <!--  <input type="text" class=" pull-right" id="datepicker" placeholder="Date of Purchase"> -->
               
											</div>	
										</div>
										</div>
										</div>
										<div class="row">	
										<div class="col-sm-12">
			                    			<div class="frmfield">
			                    				 <div class=" col-sm-6" >
													
													  <input type="radio" name="payment_method" id="online2" value="online" checked />
													 Online Payment
													
												  </div>
												  <div class=" col-sm-6">
													
													  <input type="radio" name="payment_method" id="cod2" value="cod">
													 Cash on Delivery
													
												  </div>
			                    			</div>
			                    		
			                    			<div class="clear"></div>
			                    		</div>
			                    		</div>
										<div>
		                    		
			                    		<div class="row" style="height:20px;">&nbsp;</div>
		                    		</div>
					
										
	                    											
		                    		<div>
		                    			<div class="col-sm-6">
			                    			<div class="frmfield">
			                    				<div class="secu">
			                    					<img src="captcha/captcha_code_file2.php?rand=<?php echo rand(); ?>"  />
			                    				</div>	
			                    			</div>
			                    		</div>
			                    		<div class="col-sm-6">
			                    			<div class="frmfield">
			                    				<input type="text" maxlength="3" name="captchya1" id="captchya1" autocomplete="off" oncopy="return false;" onpaste="return false;" oncut="return false;" onmouseleave="CheckCapchac1(this.value)" onKeyUp="CheckCapchac1(this.value)" onMouseUp="CheckCapchac1(this.value)" onKeyPress="CheckCapchac1(this.value)" placeholder="Verify Code*" value=""   />
											
											</div>
			                    		</div>
			                    		<div class="clear"></div>
		                    		</div>
									
									<div>
		                    		
			                    		<div class="clear"></div>
		                    		</div>
		                    		<div>
		                    			<div class="col-sm-6" style="margin:0 auto;float: none; ">
		                    				<div class="fform1 frmfield">
		                    					<input type="button" value="Buy Now" style="font-size:24px; width:94%; height:38px; background:#fdc70d;" name="submit1" onClick="return validate1()"   >
		                    				</div>	
		                    			</div>
		                    			<div class="clear"></div>
		                    		</div>
								</form>

							
								</div>
<div id="cod_div2" style="display:none;">
							<form name="cod_form2" id="cod_form2" method="post">
							<input type="hidden" name="uid" id="uid2" value="" />
							<input type="hidden" name="verify_otp" value="1" />
									<div class="row-margin-top">
	                    				&nbsp;
	                    			</div>
						
								<div class="col-sm-12">
								<div class="col-sm-8">
	                    				<div class="frmfield">
	                    					<input type="text" name="otp" maxlength="50" id="otp1" onKeyPress="return validData(event,'num')" value="" placeholder="OTP*" />
	                    				</div>	
	                    			</div>
									<div class="col-sm-4">
	                    				<a href="javascript:void(0);" onClick="resendOTP(2);">Resend OTP</a>
	                    			</div>
	                    			</div>
									
                                    <div class="col-sm-12"> <div class="col-sm-12"><div  class="errormsg" style="display: block;padding-bottom:10px"><div id="msg2"></div></div></div></div>
                                   <!-- <div class="col-sm-12"><div class="alert alert-msg alert-dismissible alert-info" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-times"></i></button></div></div> -->
                                    <div class="col-sm-12">
                                    <div class="col-sm-6">
		                    			<div class="frmfield">
	                          					<input type="button" value="Verify OTP" name="submit_otp2" name="submit_otp2" style="font-size:18px;  height:28px; background:#fdc70d;" onClick="return validateOtp(2)"  >
	                          				</div>
		                    		</div>
		                    		</div>
									
		                    		
							</form>
		    				</div>								
								</div>	
								<div class="clear"></div>
		    				</div>
		    			</div>
	    			</div>
		    	</div>
	    	
	    </section>
       <section id="aftersales" class="aftersales-bg">
	    	<div class="container">
	    		<div class="row">
	    			<div class="col-sm-12 aftersales1">
	    				<h1 class="hblue text-center" style="color:#FFFFFF;">
							SMARANTEE 
	    				</h1><center>
						<span class="horgange">@ ₹ 499/- </span><span class="hwhite"></span></center>
                       </div>
                 </div>
           </div>
        </section>
	  
	  <footer>
	    	<div class="container">
	    		<div class="row">
	    			<div class="col-sm-12 no-padding">
	    				<div class="col-sm-12 ftext" style="text-align:center; color:#fff;">
	    					&copy;  <?php echo date('Y'); ?>   All Rights Reserved
                              
	    				</div>
	    				<!--<div class="col-sm-3">
	    					<div class="text-right">
	                         
	    					</div>
	    				</div>-->
	    			</div>
	    		</div>
	    	</div>		
	    </footer>
        
	    <script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.min.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
		<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
		
		<script type="text/javascript" src="js/requirement.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.smoothscroll').on('click', function(){
					$target = $($(this).attr('href')).offset().top;
					$('body, html').animate({scrollTop : $target}, "slow");
					return false;
				});
				
				//if($("#resfrm").is(':visible')==true){
					//$("#section_bg").addcslashes
				//}
				
				//$( window ).resize(function() {
					//alert($("#resfrm").is(':visible')+"--- resize");
				//});
				$('#section_bg').on('click', function(){
					if($("#resfrm").is(':visible')==true)
					{	
						$target = $("#resfrm").offset().top;
						$('body, html').animate({scrollTop : $target}, "slow");
						$("#resfrm #your_name").focus();
					}else{
						//$("#dpfrm #your_name").focus();
					}
				});
			});
		</script>
		<!--
		Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
		-->
		<script>
  $(function () {
		 $('#datepicker').datepicker({
			  autoclose: true,
			   format: 'dd/mm/yyyy'
			});
		
	$('#datepicker2').datepicker({
			  autoclose: true,
			   format: 'dd/mm/yyyy'
			});
	});
		</script>
		<style>
		.row-margin-top{
			margin-top:35px;
		}
		</style>
</body>
</html>