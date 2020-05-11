
<?php
	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Online Library management  System
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<style type="text/css">
	nav
	{
	    float: right;
	    word-spacing: 30px;
	    padding: 20px;
	}
	nav li
	{
	    display: inline-block;
	    line-height: 80px;
	}
	</style>
</head>
<body>
	<div class="wrapper">
		<header>
		<div class="logo">
			<img src="images/download1.jpg">
			<h1 style="color: white">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
		 </div>
		 <?php
			 if(isset($_SESSION['login_user']))
			 {
			 	?>
				 	<nav>
						<ul>
							<li><a href="index.php">HOME</a></li>
							<li><a href="books.php">BOOKS</a></li>
							<li><a href="logout.php">LOGOUT</a></li>
							<li><a href="feedback.php">FEEDBACK</a></li>
						</ul>
					</nav>
				<?php
			 }
			 else
			 {
			 	?>
			 	<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="admin_login.php">LOGIN</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
					</ul>
				</nav>
			 	<?php
			 }
		 ?>
		</header>
		<section>
		<div class="sec_img">
			<br><br><br>
		<!--	<div class="w3-content w3-section" style="width: 800px;">
		<img class="mySlides w3-animate-left"src="images/1.jpg" style="width: 100%">
		<img class="mySlides w3-animate-left"src="images/2.jpg" style="width: 100%">
		<img class="mySlides w3-animate-fading"src="images/3.jpg" style="width: 100%">
		<img class="mySlides w3-animate-fading"src="images/4.jpg" style="width: 100%">
		<img class="mySlides w3-animate-fading"src="images/5.jpg" style="width: 100%">
	</div>
<script type="text/javascript">
	var a=0;
	carousel();
	function carousel()
	{
		var i;
		var x=document.getElementsByClassName("mySlides");
		
		for(i=0; i<x.length; i++)
		{
			x[i].style.display="none";
		}
		a++;
		if(a>x.length){a=1}
			x[a-1].style.display="block";
			setTimeout(carousel,5000);
	}
</script> -->
			<div class="box">
				<br><br><br>
				<h1 style="text-align: center;font-size: 35px;">WELCOME TO LIBRARY</h1><br>
				<h1 style="text-align: center;font-size: 25px;">Opens at: 9 am</h1><br>
				<h1 style="text-align: center;font-size: 25px;">Closes at: 15 pm</h1>
			</div>
		</div>
		</section>
	</div>
	<?php
		include "footer.php";
	?>
</body>
</html>