<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Student Login
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<style type="text/css">
		section
		{
			margin-top: -20px;
		}
	</style>
</head>
<body>
<!--
<header style="height: 80px;"></header> -->
<!--
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">	
				<a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a1>	
			    </div>	
					<ul class="nav navbar-nav">
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
					</ul>	
					<ul class="nav navbar-nav navbar-right">
						<li><a href="student_login.php"><span class="gliphycon glyphicon-log-in"> LOGIN</span></a></li>
						<li><a href="student_login.php"><span class="gliphycon glyphicon-log-out"> LOGOUT</span></a></li>
						<li><a href="registration.php"><span  class="gliphycon glyphicon-user"> SIGN UP</span></a></li>
					</ul>
			</div>
		</nav>
-->
<section>
	<div class="log_img">
		<br><br><br>
		<div class="box1">
			<h1 style="text-align: center;font-size: 35px;font-family: Lucida Console;">Library Management System</h1>
			<h1 style="text-align: center;font-size: 25px;">User Login Form</h1><br>
			<form align="center" name="login" action="" method="post">
				<div class="login">
				<input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
				<input class="form-control" type="password" name="password" placeholder="password"required=""><br>
				<input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px;height: 30px">
				</div>
			<p style="color: white; padding-left: 15px;">
				<br><br>
				<a style="color: white;" href="update_password.php">Forget Password?</a><br>
				new to this website? &nbsp  &nbsp  &nbsp  &nbsp  &nbsp
				<a style="color: white;" href="registration.html">Sign Up</a>
			</p>
			</form>
		</div>
	</div>
</section>

	<?php
		if(isset($_POST['submit']))
		{
			$count=0;
			$res=mysqli_query($db,"SELECT * FROM `admin` where username='$_POST[username]' && password='$_POST[password]';");
			$row=mysqli_fetch_assoc($res);
			$count=mysqli_num_rows($res);
			if($count==0)
			{
				?>
				<!--
				<script type="text/javascript">
					alert("the username and password does not match.");
				</script>
				-->
				<div class="alert alert-danger" style="width: 400px ; background-color: #de1313; color: white">
					<strong>the username and password does not match</strong>
				</div>
				<?php
			}
			else
			{
				/*------------------------ if username and password matches-------------------------------------*/

				$_SESSION['login_user']=$_POST['username'];
				$_SESSION['pic']=$row['pic'];

				?>
				<script type="text/javascript">
					window.location="index.php";
				</script>
				<?php
			}
		}

	?>
</body>
</html>