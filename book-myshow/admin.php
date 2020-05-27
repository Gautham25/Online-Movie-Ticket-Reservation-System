<?php
	session_start();
	include './include/config.php';
	$path = $config->base_url.'/homepage.php';
	$signin = $config->base_url.'/login.php#wrapper';
	$signup = $config->base_url.'/registration.php#wrapper';
	if(isset($_SESSION['sid'])){
		header("Location: $path");
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="shortcut icon" href="./images/favicon.ico"/>
 <title>Online MovieTicket Booking</title>
 <link rel="stylesheet" type="text/css" href="./css/style.css" />
 <link rel="stylesheet" type="text/css" href="./css/banner.css" />
 <script type='text/javascript' src="./js/jquery.js" ></script>
 <script type='text/javascript' src="./js/jquery.min.js"></script>
 <script type='text/javascript' src="./js/book_myshow.js" ></script>
 <script type='text/javascript' src="./js/banner.js" ></script>
 <script type='text/javascript' src="./js/slides.min.jquery.js"></script>
 <script type='text/javascript' src="./js/login_validation.js"></script>
</head>

<body id='login-page'>

<div class="mainWrapper">
<div><div class="header-title"><a title='Book Tickets' href="<?php echo $path; ?>">Online Movie Ticket Booking</a></div>
	<div class="userWelcome">
		<?php
			echo "<a class='homepage-sign-in' href='".$signin."'>Sign In</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class='homepage-sign-in' href='".$signup."'>Sign Up&nbsp;&nbsp;</a>";
		?>
	</div>
</div>

<div class="main" style="margin-top:30px;">
	<div id="example">
		<div id="slides">
			<div class="slides_container">
				<?php
					$sel_movies = "SELECT movie_id, movie_name, movie_poster FROM movies";
					$sel_movies_qry = mysqli_query($con,$sel_movies);
					while($sel_movies_qry_row = mysqli_fetch_object($sel_movies_qry)){
						echo "<div class='slide'>";
						echo "<a href='movie-details.php?id=".$sel_movies_qry_row->movie_id."' title='".$sel_movies_qry_row->movie_name."' ><img class='slider-image' src='./images/".$sel_movies_qry_row->movie_poster."'></a>";
						echo "</div>";
					}
				?>
			</div>
		</div>
	</div>
</div>

<div class="content" style="margin-top:30px;">
	<?php
	$error = '';
	$error_class = '';
	if(!empty($_POST)){
		$qry = "SELECT * FROM users WHERE user_name = '$_POST[username]' AND password = md5('$_POST[password]')";
		$result = mysqli_query($con,$qry);

		if(mysqli_num_rows($result)) {
			$_SESSION['sid']=session_id();
			$login_time=strtotime('now');
			$member=mysqli_fetch_assoc($result);
			$_SESSION['name'] = $member['user_name'];
			$_SESSION['first_name'] = $member['first_name'];
			$_SESSION['last_name'] = $member['last_name'];
			$_SESSION['user_id'] = $member['user_id'];
			$role=$member['rid'];
			echo "$role";

			//if(isset($_SESSION['sid'])){
				if($member['sid'] == 0){
					$sid_insert = "UPDATE users SET sid = '$_SESSION[sid]', login_time = '$login_time' WHERE user_name = '$_POST[username]'";
					$result1 = mysqli_query($con,$sid_insert);
				}

			//if(rid==1){
			//$admin_path=$config->base_url.'/admin_gui.php';
			//header("Location: $admin_path");
			//}

			//}
			header("Location: $path");
		}
		else {
			$error = "username or password is incorrect";
			$error_class = 'error';
		}
	}
	?>

	<form id='wrapper' action='login.php' method='post'>
		<fieldset>
			<legend>Sign In</legend>
				<div class='<?php echo $error_class; ?>'><?php echo $error; ?></div>
				<label for='username' >User Name<span class='field-required'> *</span>:</label>
				<input type='text' name='username' id='username' maxlength="50" /><br/>
				<label for='password' >Password<span class='field-required'> *</span>:</label>
				<input type='password' name='password' id='password' maxlength="50" /><br/>
				<input type='submit' name='Submit' id='signin' value='Sign In' />
				<span class="signup-button">
				<a id="link-signup" class="g-button g-button-red" href="<?php echo $signup; ?>">Sign Up</a>
				</span>
		</fieldset>
	</form>

</div>
<div class="footer-div"><p class="footer-bottom"> <a title="Online Movie Ticket Booking" href="<?php echo $path;?>"> &copy;Online Movie Ticket Booking.</a></p></div>


</body>
</html>
