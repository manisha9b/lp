<?php
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
		    	<div class="row" style="
    background-color: #FDC70D;
">
		    		<div class="col-md-8" style="
    padding-right: 0px;
">
					<img src="images/banner.jpg" class="img-responsive"> 
					</div>
		    		<div id="dpfrm" class="col-sm-4" style="float:right;border-top: 1.32em solid #1B242D;padding-left: 0px;">
		    			<div class="formbg">
		    				<h3 class="text-center fw-b">Buy NOW</h3>
		    				<div class="heading_f text-center">
		    					    <i class="fa fa-phone" aria-hidden="true" style="color:#6fcddf"></i>&nbsp;Call us on 1800-120-2177<br>Or Fill in the Form
		    				</div>
		    				<div class="fform">
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
		                    				<input type="text" name="email" maxlength="100" id="user_email" oncopy="return false;" onpaste="return false;" oncut="return false;" value="" Placeholder="Email*" />
		                    			</div>	
		                    		</div>
									<div class="row">	
										<div class="col-sm-12">
											<div class="col-sm-6">
												<div class="frmfield">
													<input type="text" name="city" maxlength="100" id="df_city"  value="" placeholder="city*" />
													
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
		                    				<input type="text" name="model" maxlength="100" id="df_model"  value="" placeholder="Model*" />
                                            
		                    			</div>	
		                    		</div>
	                    			<div class="col-sm-6">
                          				<div class="frmfield">
                          					<input type="text" name="imei_no" maxlength="100" id="df_imei_no"  value="" placeholder="IMEI No." />
                          				</div>
	                    			</div>
									<div class="row">	
									<div class="col-sm-12">
										<div class="col-sm-6">
											<div class="frmfield">
	                    				
												<select name="price" id="price"> 
													<option value="">Price Range</option>
													<option value="Above_5000">Above 5000</option>
													<option value="Below_5000">Below 5000</option>
												 
												
												</select>
											</div>	
										</div>
										</div>
										</div>
										<!-- <div class="row">	
											<div class="col-sm-12">										
											<div class="col-sm-6 text-right">
												Amount :
											</div>	
											<div class="col-sm-6">
												<div class="frmfield">
											
													<input type="text" name="amount" maxlength="100" id="amount"  value="249" readonly />
												</div>	
											</div>							
	                    				</div>							
	                    				</div>	-->						
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
		                    			<div class="col-sm-6" style="margin:0 auto; float:none; ">
		                    				<div class="frmfield">
		                    					<input type="button" value="Buy Now" name="submit1" onClick="return validate()"  >
		                    				</div>	
		                    			</div>
		                    			<div class="clear"></div>
		                    		</div>
								</form>	
								<div class="clear"></div>
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
		    				<h3 class="text-center fw-b">Buy NOW</h3>
		    				<h4 class="text-center">
		    					    <i class="fa fa-phone" aria-hidden="true" style="color:#6fcddf"></i>&nbsp; Call us on 1800-120-2177<br/>Or Fill in the Form
		    				</h4>
		    				<div class="fform">
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
                                    <div class="col-sm-6">
		                    			<div class="frmfield">
		                    				<input type="text" name="city" maxlength="100" id="df2_city"  value="" placeholder="city*" />
                                            
		                    			</div>	
		                    		</div>
	                    			<!-- <div class="col-sm-6">
                          				<div class="frmfield">
                          					<input type="text" name="Brand" maxlength="100" id="Brand"  value="Karbaan" readonly />
                          				</div>
	                    			</div> -->
									<div class="col-sm-6">
		                    			<div class="frmfield">
		                    				<input type="text" name="model" maxlength="100" id="df2_model"  value="" placeholder="Model*" />
                                            
		                    			</div>	
		                    		</div>
	                    			<div class="col-sm-6">
                          				<div class="frmfield">
                          					<input type="text" name="imei_no" maxlength="100" id="imei_no"  value="" placeholder="IMEI No." />
                          				</div>
	                    			</div>
									
										<div class="row">	
									<div class="col-sm-12">
										<div class="col-sm-6">
											<div class="frmfield">
	                    				
												<select name="price" id="price"  /> 
													<option value="">Price Range</option>
													<option value="Above_5000">Above 5000</option>
													<option value="Below_5000">Below 5000</option>
												 
												
												</select>
											</div>	
										</div>
										</div>
										</div>
										<!-- <div class="row">	
											<div class="col-sm-12">										
											<div class="col-sm-6 ">
												Amount :
											</div>	
											<div class="col-sm-6">
												<div class="frmfield">
											
													<input type="text" name="amount" maxlength="100" id="amount"  value="249" readonly />
												</div>	
											</div>							
	                    				</div>							
	                    				</div>	-->			
										
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
		                    			<div class="col-sm-6" style="margin:0 auto;float: none; ">
		                    				<div class="fform1 frmfield">
		                    					<input type="button" value="Buy Now" name="submit1" onClick="return validate1()"   >
		                    				</div>	
		                    			</div>
		                    			<div class="clear"></div>
		                    		</div>
								</form>	
								<div class="clear"></div>
		    				</div>
		    			</div>
	    			</div>
		    	</div>
	    	
	    </section>
       <section id="aftersales" class="aftersales-bg">
	    	<div class="container">
	    		<div class="row">
	    			<div class="col-sm-8 aftersales1">
	    				<h1 class="hblue" style="color:#FFFFFF;">
							SMARANTEE 
	    				</h1>
						<span class="horgange">@ Rs. 499/- </span><span class="hwhite"></span>
                       </div>
                 </div>
           </div>
        </section>
	  
	  <footer>
	    	<div class="container">
	    		<div class="row">
	    			<div class="col-sm-12 no-padding">
	    				<div class="col-sm-9 ftext" style="text-align:center;">
	    					&copy;  <?php echo date('Y'); ?>   All Rights Reserved
                              
	    				</div>
	    				<div class="col-sm-3">
	    					<div class="text-right">
	                         
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>		
	    </footer>
        
	    <script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.min.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
		
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

</body>
</html>