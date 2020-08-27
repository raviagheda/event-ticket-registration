<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>BMCET I/O </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
<?php
include 'base.php';

session_start();
if(isset($_POST['submit']))
{
	$check_email = mysqli_query($conn,"select * from members where email = '{$_POST['email']}'");
	if(mysqli_num_rows($check_email) > 0)
	{
		echo "<script>window.alert('Email has been taken')</script>";
	}
	else
	{
		$_SESSION['email'] = $_POST['email'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$fname = strtolower($_POST['fname']);
		$fname = ucfirst($fname);

		$lname = strtolower($_POST['lname']);
		$lname = ucfirst($lname);

		mysqli_query($conn,"insert into members (fname,lname,mobile,email,college,branch,sem) values('{$_POST['fname']}','{$_POST['lname']}','{$_POST['mobile']}','{$_POST['email']}','{$_POST['college']}','{$_POST['branch']}','{$_POST['sem']}')");
		
		header('Location:msg.php');
	}
}
?>

		
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<!-- <img src="images/image-1.png" alt="" class="image-1"> -->
				<form action="index.php" method="post">
					<div class="mob-logo">
					<img src="images/io_black.png" alt="" class="image-2-moblie">
					</div>


					<div>
					<h3>New Account?</h3>
					<div class="form-holder f_name_list">
						<span class="lnr lnr-user"></span>
						<input type="text" name="fname" class="form-control" placeholder="First Name" required>
					</div>
					<div class="form-holder l_name_list">
						<span class="lnr lnr-user"></span>
						<input type="text" name="lname" class="form-control" placeholder="Last Name" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-phone-handset"></span>
						<input type="tel" name="mobile" class="form-control" placeholder="Phone Number" maxlength="10" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="email" name="email" class="form-control" placeholder="Mail" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="text" name="college" class="form-control" placeholder="College" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="text" name="branch" class="form-control" placeholder="Branch" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="text" name="sem" class="form-control" placeholder="Semester" required>
					</div>
					<button type="submit" name="submit">
						<span>Register</span>
					</button>

				</form>



				<img src="images/io_white.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>