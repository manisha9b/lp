<?php 
include_once('includes/define.php');
session_start();
session_unset();
session_destroy();

header("Location: ".ADMIN_WEBSITE_URL);
?>