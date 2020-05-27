<?php
session_start();

include '../include/config.php';
$_SESSION['sid']=session_id();
$login_time=strtotime('now');
$login_date = date('Y-m-d',$login_time);
$sql="INSERT INTO users (`user_name`,`password`,`email`,`first_name`,`last_name`,`address`,`mobile_number`,`sid`,`login_time`)
VALUES
('$_POST[user_name]',md5('$_POST[password]'),'$_POST[email]','$_POST[first_name]','$_POST[last_name]','$_POST[address]','$_POST[mobileno]','$_SESSION[sid]','$login_date')";

mysqli_query($con,$sql);

$_SESSION['name'] = $_POST['user_name'];
$_SESSION['first_name'] = $_POST['first_name'];
$_SESSION['last_name'] = $_POST['last_name'];

$qry = "SELECT user_id FROM users WHERE user_name='".$_POST['user_name']."'";

$qry_q = mysqli_query($con,$qry);
$qry_q_row = mysqli_fetch_object($qry_q);

$_SESSION['user_id'] = $qry_q_row->user_id;

mysqli_close($con);

if(isset($_SESSION['sid'])){
	$path = $config->base_url."/homepage.php";
	header("Location: $path");
}

?>
