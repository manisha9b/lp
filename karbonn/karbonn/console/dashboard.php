<?php 

include_once('includes/define.php');
include_once('includes/connectdb.php');
session_start();
if(!isset($_SESSION['userLoginId']) || $_SESSION['userLoginId']<1){
	header("Location: ".ADMIN_WEBSITE_URL.'/index.php');
}


include_once('partials/main_header.php');
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include_once('partials/header.php')?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include_once('partials/sidebar.php')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include_once('content.php')?>

    
  </div>
  <!-- /.content-wrapper -->
 <?php include_once('partials/footer.php')?>
<!-- AdminLTE for demo purposes -->
</body>
</html>
