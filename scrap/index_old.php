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
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-99335163-1', 'auto');
		  ga('send', 'pageview');

		</script>
	</head>
    
	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" >
		<header id="header">
			<div class="container">
				
			</div>
    	</header>
			
    	
    	<div class="clear"></div>
    	<nav class="navbar navbar-default top-nav-collapse" role="navigation">
	        <div class="container">
	            <div class="navbar-header page-scroll">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-head"><img src="images/ssp.png" title="SSP Advantage" align="middle"></a>	                
	            </div>
 
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse navbar-ex1-collapse">
	                <ul class="nav navbar-nav">
	                    <li> </li><!-- Hidden li included to remove active class from about link when scrolled up past about section -->
	                    <li class="hidden">
	                        <a class="page-scroll" href="#page-top"></a>
	                    </li>
	                    <li>
	                        <a class="page-scroll" href="#about">HOW SSP WORKS</a>
	                    </li>
	                    <li>
	                        <a class="page-scroll" href="#how">HOW WILL SSP HELP YOU</a>
	                    <li>
	                        <a class="page-scroll" href="#contact">GET IN TOUCH</a>
	                    </li>
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
		</nav>
	    <!--  main wrapper -->
	    <section class="bg">
	    	<div class="container">
		    	<div class="row">
		    		<div class="col-sm-8">
		    			<h1 class="heading">
		    				The Smart Addition
		    			</h1>
                        <h1 class="heading1">to your Smartphone</h1><br><br>
                      
                       <i class="fa fa-check" aria-hidden="true" style="color:#f5bb4c;font-size: 25px;"></i> <span class="bg-text">Doorstep Inspection, Pickup & Drop</span><br><br>
                       <i class="fa fa-check" aria-hidden="true" style="color:#f5bb4c;font-size: 25px;"> </i> <span class="bg-text">Genuine Assessment for your Device</span><br><br>
                       <i class="fa fa-check" aria-hidden="true" style="color:#f5bb4c;font-size: 25px;"></i> <span class="bg-text">FREE Antivirus Coupon worth Rs. 500/-</span><br><br/>
                       <i class="fa fa-check" aria-hidden="true" style="color:#f5bb4c;font-size: 25px;"></i> <span class="bg-text">Genuine Quotation</span>
                      
		    		</div>
		    		<div class="col-sm-4">
		    			<div class="formbg">
		    				<h3 class="text-center fw-b">ENQUIRE NOW</h3>
		    				<div class="heading_f text-center">
		    					    <i class="fa fa-phone" aria-hidden="true" style="color:#6fcddf"></i>&nbsp;Call us on 022-32240000<br/>Or Fill in the Form
		    				</div>
		    				<div class="fform">
		    					<form name="DetailForm" id="DetailForm" method="post">
									<input type="hidden" name="source" value="<?=$source?>" />
                    				<input type="hidden" name="frmtype" value="" />
                    				<input type="hidden" name="ccodec" id="ccodeidc" value="" />
                    				<div class="col-sm-12" style="margin-bottom:0;text-align:left;">
                    					<div id="alt_error" class="errormsg"></div>
                    				</div>
                    				<div class="col-sm-12">
	                    				<div class="frmfield">
	                    					<input type="text" name="name" maxlength="50" id="your_name" onKeyPress="return validData(event,'name')" value="Name*" onFocus="if(this.value=='Name*'){this.value=''}" onBlur="if(this.value==''){this.value='Name*'}" />
	                    				</div>	
	                    			</div>
                                    <div class="col-sm-12">
		                    			<div class="frmfield">
	                          					<input type="text" name="contact" maxlength="10" id="mobile_number" onKeyPress="return validData(event,'num')"  value="Mobile No.*" onFocus="if(this.value=='Mobile No.*'){this.value=''}" onBlur="if(this.value==''){this.value='Mobile No.*'}" />
	                          				</div>
		                    		</div>
		                    		<div class="col-sm-12">
		                    			<div class="frmfield">
		                    				<input type="text" name="email" maxlength="100" id="user_email" oncopy="return false;" onpaste="return false;" oncut="return false;" value="Email*" onFocus="if(this.value=='Email*'){this.value=''}" onBlur="if(this.value==''){this.value='Email*'}" />
		                    			</div>	
		                    		</div>
                                    <div class="col-sm-12">
		                    			<div class="frmfield">
		                    				<input type="text" name="city" maxlength="100" id="city"  value="Mumbai" readonly />
                                            
		                    			</div>	
		                    		</div>
	                    			<div class="col-sm-12">
                          				<div class="frmfield">
                          					<select name="Brand" id="Brand">
												<option value="">Brand*</option>
												<option value="Asus">Asus</option>
												<option value="Gionee">Gionee</option>
												<option value="HTC">HTC</option>
												<option value="Huawei">Huawei</option>
												<option value="Intex">Intex</option>
												<option value="Lava">Lava</option>
												<option value="Le Eco">Le Eco</option>
												<option value="Lenovo">Lenovo</option>
												<option value="LG">LG</option>
												<option value="LYF">LYF</option>
												<option value="Micromax">Micromax</option>
												<option value="Motorola">Motorola</option>
												<option value="Nokia">Nokia</option>
												<option value="One Plus">One Plus</option>
												<option value="Oppo">Oppo</option>
												<option value="Samsung">Samsung</option>
												<option value="Sony">Sony</option>
												<option value="Vivo">Vivo</option>
												<option value="Xiaomi">Xiaomi</option>
											</select>
                          				</div>
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
			                    				<input type="text" maxlength="3" name="captchya" id="captchya" autocomplete="off" oncopy="return false;" onpaste="return false;" oncut="return false;" onmouseleave="CheckCapchac(this.value)" onKeyUp="CheckCapchac(this.value)" onMouseUp="CheckCapchac(this.value)" onKeyPress="CheckCapchac(this.value)" onBlur="if(this.value==''){this.value='Verify Code*'}" onFocus="if(this.value=='Verify Code*'){this.value=''}" value="Verify Code*"  />
			                    			</div>
			                    		</div>
			                    		<div class="clear"></div>
		                    		</div>
		                    		<div>
		                    			<div class="col-sm-6" style="margin:0 auto; float:none; ">
		                    				<div class="frmfield" >
		                    					<input type="button" value="I want to know more" name="submit1" onClick="return validate()"  >
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
		    		<div class="padding-20 no-pt"></div>
		    	</div>	
	    	</div>
	    </section>
        <section id="aftersales"  class="aftersales-bg">
	    	<div class="container" >
	    		<div class="row">
	    			<div class="col-sm-8 aftersales1">
	    				<h1 class="hblue" style="color:#FFFFFF;">
							SMART After Sales Solutions for your Smartphone
	    				</h1>
						<span class="horgange">@ Rs. 249/- </span><span class="hwhite">(for the Whole Year!)</span>
                       </div>
                 </div>
           </div>
        </section>
        
        <section class="responsiveform">
	    	<div class="container">
		    	<div class="row">
	    			<div class="col-sm-8">
	    				<div>
		    				<h3 class="text-center fw-b">ENQUIRE NOW</h3>
		    				<h4 class="text-center">
		    					    <i class="fa fa-phone" aria-hidden="true" style="color:#6fcddf"></i>&nbsp; Call us on 022-32240000<br/>Or Fill in the Form
		    				</h4>
		    				<div class="fform">
		    					<form name="DetailFormres" id="DetailFormres" method="post">
									<input type="hidden" name="source" value="<?=$source?>" />
                    				<input type="hidden" name="frmtype" value="" />
                    				<input type="hidden" name="ccodec1" id="ccodeidc1" value="" />
                    				<div class="col-sm-12" style="margin-bottom:0;text-align:left;">
                    					<div id="alt_error1" class="errormsg"></div>
                    				</div>
                    				<div class="col-sm-12">
	                    				<div class="frmfield">
	                    					<input type="text" name="name" maxlength="50" id="your_name" onKeyPress="return validData(event,'name')" value="Name*" onFocus="if(this.value=='Name*'){this.value=''}" onBlur="if(this.value==''){this.value='Name*'}" />
	                    				</div>	
	                    			</div>
		                    		
	                    			<div>
	                          			<div class="col-sm-12">
	                          				<div class="frmfield">
	                          					<input type="text" name="contact" maxlength="10" id="mobile_number" onKeyPress="return validData(event,'num')"  value="Mobile No.*" onFocus="if(this.value=='Mobile No.*'){this.value=''}" onBlur="if(this.value==''){this.value='Mobile No.*'}" />
	                          				</div>
	                          			</div>
                                        <div class="col-sm-12">
		                    			<div class="frmfield">
		                    				<input type="text" name="email" maxlength="100" id="user_email" oncopy="return false;" onpaste="return false;" oncut="return false;" value="Email*" onFocus="if(this.value=='Email*'){this.value=''}" onBlur="if(this.value==''){this.value='Email*'}" />
		                    			</div>	
		                    		</div>
                                     <div class="col-sm-12">
		                    			<div class="frmfield">
		                    				<input type="text" name="city" maxlength="100" id="city"  value="Mumbai" readonly />
                                            
		                    			</div>	
		                    		</div>
	                    			<div>
										<div class="col-sm-12">
                          				<div class="frmfield">
                          					<select name="Brand" id="Brand">
												<option value="">Brand*</option>
												<option value="Asus">Asus</option>
												<option value="Gionee">Gionee</option>
												<option value="HTC">HTC</option>
												<option value="Huawei">Huawei</option>
												<option value="Intex">Intex</option>
												<option value="Lava">Lava</option>
												<option value="Le Eco">Le Eco</option>
												<option value="Lenovo">Lenovo</option>
												<option value="LG">LG</option>
												<option value="LYF">LYF</option>
												<option value="Micromax">Micromax</option>
												<option value="Motorola">Motorola</option>
												<option value="Nokia">Nokia</option>
												<option value="One Plus">One Plus</option>
												<option value="Oppo">Oppo</option>
												<option value="Samsung">Samsung</option>
												<option value="Sony">Sony</option>
												<option value="Vivo">Vivo</option>
												<option value="Xiaomi">Xiaomi</option>
											</select>
                          				</div>
										</div>	
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
			                    				<input type="text" maxlength="3" name="captchya1" id="captchya1" autocomplete="off" oncopy="return false;" onpaste="return false;" oncut="return false;" onmouseleave="CheckCapchac1(this.value)" onKeyUp="CheckCapchac1(this.value)" onMouseUp="CheckCapchac1(this.value)" onKeyPress="CheckCapchac1(this.value)" onBlur="if(this.value==''){this.value='Verify Code*'}" onFocus="if(this.value=='Verify Code*'){this.value=''}" value="Verify Code*"  />
			                    			</div>
			                    		</div>
			                    		<div class="clear"></div>
		                    		</div>
		                    		<div>
		                    			<div class="col-sm-6" style="margin:0 auto;float: none; ">
		                    				<div class="fform1 frmfield">
		                    					<input type="button" value="I want to know more" name="submit1" onClick="return validate1()"   >
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
	    	</div>
	    </section>
        <section id="about" class="main-row no-pb">
			<div class="container">
	    		<div class="row">
					<div class="col-sm-8">
						<h1 class="text-uppercase fw-b abt-h1" >
	    					SIMPLEST WAY TO GET YOUR PHONE REPAIRED
	    				</h1>
						<div style="margin-top:30px;">
							<div class="col-sm-2 abt-img">
								<div class="abt-img1"><img src="images/abt1.png"/></div>
								<div class="abt-text">
								<b>Pay &<br/> Register</b><br/>
								(Online+Call)
								</div>
							</div>
							<div class="col-sm-1">
								<img src="images/abt-arrow.png" class="abt-arrow"/>
							</div>
							<div class="col-sm-2 abt-img">
								<div class="abt-img1"><img src="images/abt2.png"/></div>
								<div class="abt-text"><b>Professional <br/>Assistance</b> at your <br/>
								Doorstep</div>
							</div>
							<div class="col-sm-1">
								<img src="images/abt-arrow.png" class="abt-arrow"/>
							</div>
							<div class="col-sm-2 abt-img">
								<div class="abt-img1"><img src="images/abt3.png"/></div>
								<div class="abt-text"><b>Doorstep <br/>Inspection,</b><br/>
								 Pick up & Drop</div>
							</div>
							<div class="col-sm-1">
								<img src="images/abt-arrow.png" class="abt-arrow"/>
							</div>
							<div class="col-sm-2 abt-img">
								<div class="abt-img1"><img src="images/abt4.png"/></div>
								<div class="abt-text"><b>Hi-tech repair hub</b><br/>
								 provides Genuine <br/>Quotation</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
			<div class="clear"></div>
			<div class="padding-40"></div>
	    </section>
		
		<section id="buynow" class="main-row no-pb buynow-bg">
			<div class="container">
	    		<div class="row">
					<div class="col-sm-8" class="buynow">
						<div class="buynow-text1">Whether a NEW Phone or an OLD Phone</div>
						<div class="buynow-text2">#GetSmart <span style="color:#ffffff;font-weight:normal;">with</span></div>
						<div class="buynow-text3">Smart Services Pack</div>
						<div class="buynow-text4"><a href="#" class="btnbuynow">BUY NOW</a></div>
					</div>
				</div>
			</div>
		</section>
        
		<section id="how" class="main-row no-pb how-bg">
			<div class="container">
	    		<div class="row">
					<div class="col-sm-8" class="how">
					<div class="abt-h1">HOW SSP WILL HELP YOU?</div>
					<div style="font-size: 16px;">Our Smart After Sales Solutions are not only CONVENIENT, <br/>but are also <b>100% Secure & Genuine.</b></div>
					<div class="col-sm-4" style="padding-top: 30px;">
						<img src="images/how.png"/>
					</div>
					<div class="col-sm-8" style="padding-top: 30px;">
						<img src="images/how1.png" class="how-img"/>&nbsp; &nbsp;Doorstep Inspection, Pickup & Drop<br/>
						<img src="images/how2.png" class="how-img"/>&nbsp; &nbsp;Genuine Assessment for your Device<br/>
						<img src="images/how3.png" class="how-img"/>&nbsp; &nbsp;Free Antivirus Coupon worth Rs. 500/-<br/>
						<img src="images/how4.png" class="how-img"/>&nbsp; &nbsp;Genuine Quotation
					</div>
					</div>
					
				</div>
			</div>
		</section>
		
	    <section id="contact"  style="background-color:#031f44;" >
	    	<div class="container" >
	    		<div class="row">
	    			<div class="col-sm-8">
	    				<h1 class="fw-b" style=" color:#FFFFFF;" >
	    					#SSPLiyaKya - GET SMART
	    				</h1>
	    				<div class="formbox">
	    					<form name="getintouch" id="getintouch" method="post">
								<input type="hidden" name="source" value="<?=$source?>" />
								<div class="col-sm-12" style="margin-bottom:0;text-align:left;">
                    				<div id="alt_error2" class="errormsg"></div>
                    			</div>           				
    							<div class="col-sm-3">
    								<div class="frmfield1">
    									<input type="text" name="name" maxlength="50" id="your_name" onKeyPress="return validData(event,'name')" value="Name*" onFocus="if(this.value=='Name*'){this.value=''}" onBlur="if(this.value==''){this.value='Name*'}" />
		    						</div>
		    					</div>
			    				<div class="col-sm-3">
    								<div class="frmfield1">
			    						<input type="text" name="email" maxlength="100" id="user_email" oncopy="return false;" onpaste="return false;" oncut="return false;"   value="Email*" onFocus="if(this.value=='Email*'){this.value=''}" onBlur="if(this.value==''){this.value='Email*'}" />
			    					</div>
			    				</div>
			    				<div class="col-sm-3">
    								<div class="frmfield1">
			    						<input type="text" name="contact" maxlength="10" id="mobile_number" onKeyPress="return validData(event,'num')"  value="Mobile No.*" onFocus="if(this.value=='Mobile No.*'){this.value=''}" onBlur="if(this.value==''){this.value='Mobile No.*'}" />
			    					</div>
			    				</div>
			    				<div class="col-sm-3">
			    					<div class="frmfield1 text-center">
			    						<input type="button" value="Submit" name="submit2" onClick="return getintouchf()">
			    					</div>
			    				</div>                                
			    			</form>
			    			<div class="col-sm-12">
			    				<div class="padding-20">
			    					<span class="or">OR</span> <a href="tel:022 32240000"> <img src="images/call_no.png"></a>
			    				</div>	
			    			</div>
	    					<div class="clear"></div>
	    				</div>
	    			</div>
	    			<div class="clear"></div>
	    		</div>
	    	</div>
	    </section>
	    <footer>
	    	<div class="container">
	    		<div class="row">
	    			<div class="col-sm-12 no-padding">
	    				<div class="col-sm-9 ftext">
	    					&copy;  <?php echo date('Y'); ?>   All Rights Reserved
                              
	    				</div>
	    				<div class="col-sm-3">
	    					<div class="text-right" >
	                            *T & C Not for Iphones
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
		<!--
		Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
		-->
		<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = 851370080;
		var google_custom_params = window.google_tag_params;
		var google_remarketing_only = true;
		/* ]]> */
		</script>
		<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
		</script>
		<noscript>
		<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/851370080/?guid=ON&amp;script=0"/>
		</div>
		</noscript>
	</body>
</html>