<?php 
include_once('includes/define.php');
session_start();
if(isset($_SESSION['userLoginId']) && $_SESSION['userLoginId']>0){
	header("Location: ".ADMIN_WEBSITE_URL.'/dashboard.php');
}
?>
<?php// include_once('session_set.php');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Karbonn | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo ADMIN_WEBSITE_URL?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo ADMIN_WEBSITE_URL?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo ADMIN_WEBSITE_URL?>/dist/css/AdminLTE.min.css">
  <!-- iCheck -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo ADMIN_WEBSITE_URL?>">Karbonn</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="" method="post" id="login-form" >
	<input type="hidden" name="ajaxlogin" value="on">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" required placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control"  name="password" required  placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="col-sm-12" id="login_message_div_row" style="display:none;">
	   <div id="login_message_div" class="response text-center text-danger"></div><br/>
	  </div>
      <div class="row">
       
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" id="submit_button"  class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
    <!-- /.social-auth-links -->

    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo ADMIN_WEBSITE_URL?>/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo ADMIN_WEBSITE_URL?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/validate.js"></script>
<!-- iCheck -->
<script>


$(document).ready(function() {	


	$("#login-form").validate({        
		rules:{            
			required:{
				required:true
			},
		},        
		errorClass: "help-inline text-danger",        
		errorElement: "span",        
		highlight:function(element, errorClass, validClass) {            
		$(element).parents('.form-group').addClass('has-error');        
		},        unhighlight: function(element, errorClass, validClass) {            
		$(element).parents('.form-group').removeClass('has-error');            
		$(element).parents('.form-group').addClass('has-success');        
		},		
		submitHandler: function(form, event) {
			$('#login_message_div_row').hide();
			//alert("dsf");
			$.ajax({				
				url: 'session_set.php',				
				type: 'POST',				
				dataType: 'json',				
				async: false,				
				data: $('#login-form').serialize(),				
				success: function(response) {	
	//alert("t");
					if(response.error==1){				
						$('#login_message_div').html(response.mesg);
						$('#login_message_div_row').show();
					}
					else{
						window.location.href = response.url; 
					}
				}			
			});
			return false;
		}  ,  
	});
});

</script>
</body>
</html>
