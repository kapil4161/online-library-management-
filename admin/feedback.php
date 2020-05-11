<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fedback</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		body
		{
			background-color: green;

		}
		.wrapper
		{
			padding: 10px;
			margin: -20px auto;
			width: 900px;
			height:600px;
			background-color: black;
			opacity:0.8;
			color:white;
		}
		.form-control
		{
			height:70px;
			width: 60%;
		}
		.scroll
		{
			width:100%;
			height:300px;
			overflow:auto;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<h4>if you have any suggestion or questions please comment below</h4>
		<form style="" action="" method="post">
			<input class="form-control" type="text" name="comment" placeholder="write something..."><br>
			<input class="btn btn-default" type="submit" name="submit" value="comment" style="width: 100px; height: 35px;">

		</form>
<br><br>
	
	<div class="scroll">
		<?php
			if(isset($_POST['submit']))
			{
				$sql="INSERT into `comments` Values('', '$_POST[comment]')";
				//mysqli_query($db,$sql);
				if(mysqli_query($db,$sql))
				{
					$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
					$res=mysqli_query($db,$q);
					echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) {
						echo "<tr>";
							echo "<td>";	echo $row['comment'];	echo "</td>";
						echo "</tr>";
					}
				}
			}
			else
			{
				$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
					$res=mysqli_query($db,$q);
					echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) {
						echo "<tr>";
							echo "<td>";	echo $row['comment'];	echo "</td>";
						echo "</tr>";
					}
			}

		?>
	</div>
	</div>
</body>
</html>