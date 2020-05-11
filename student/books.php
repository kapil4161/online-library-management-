<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch
		{
			padding-left:1000px;
		}
		body {
        font-family: "Lato", sans-serif;
        transition: background-color .5s;
      }

      .sidenav {
        height: 100%;
        margin-top: 70px;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #222;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
      }

      .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
      }

      .sidenav a:hover {
        color: #f1f1f1;
      }

      .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
      }

      #main {
        transition: margin-left .5s;
        padding: 16px;
      }

      @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
      }
      .h:hover
      {
      	  color:white ;
      	  width: 300px;
      	  height: 50px;
      	  background-color: #00544c;
      }
	</style>
</head>
<body>
	<!-- ____________________________________sidenav___________________-->
	<div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

		<div style="color: white">
			<?php
			if(isset($_SESSION['login_user']))
			{
				echo "<img class='img-circle profile_img' height=30 width=30 src='images/".$_SESSION['pic']."'>";
				echo " ".$_SESSION['login_user'];
			}
			?>
		</div><br><br>   
        <div class="h"><a href="books.php">Add Books</a></div>
        <div class="h"><a href="request.php">Books Request</a></div>
        <div class="h"><a href="issue_info.php">Issue Information</a></div>
      </div>

      <div id="main">
        
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
      <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
        document.getElementById("main").style.marginLeft = "300px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "white";
      }
      </script>
         
	</style>
</head>
<body>
	<!-- ________________________________________search bar______________ -->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
				<input class="form-control" type="text" name="search" placeholder="search books..." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>
	<!-- ________________________________________________request page_______________________________-->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
				<input class="form-control" type="text" name="bid" placeholder="Enter Book Id.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit2" class="btn btn-default">Request
				</button>
		</form>
	</div>
	<h2>List Of books</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%'");
			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! no books found.";
			}
			else
			{
				echo "<table class='table table-borderd table-hover' >";
				echo "<tr style='background-color: #6db6b9e6;'>";
			//Table Header
						echo "<th>";	echo "ID";	echo "</th>";
						echo "<th>";	echo "BOOK-NAME";	echo "</th>";
						echo "<th>";	echo "AUTHOR-NAME";	echo "</th>";
						echo "<th>";	echo "EDITION";	echo "</th>";
						echo "<th>";	echo "STATUS";	echo "</th>";
						echo "<th>";	echo "QUANTITY";	echo "</th>";
						echo "<th>";	echo "DEPARTMENT";	echo "</th>";
				echo "</tr>";
						while($row=mysqli_fetch_assoc($q))
						{
							echo "<tr>";

							echo "<td>";	echo $row['bid'];	echo "</td>";
							echo "<td>";	echo $row['name'];	echo "</td>";
							echo "<td>";	echo $row['authors'];	echo "</td>";
							echo "<td>";	echo $row['edition'];	echo "</td>";
							echo "<td>";	echo $row['status'];	echo "</td>";
							echo "<td>";	echo $row['quantity'];	echo "</td>";
							echo "<td>";	echo $row['department'];	echo "</td>";

							echo "</tr>";
						}
						echo "</table>";
			}
		}
		/* if button is not pressed */
		else
		{
			$res=mysqli_query($db,"SELECT * from `books` order by `books`.`name` asc;");
			echo "<table class='table table-borderd table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
			//Table Header
				echo "<th>";	echo "ID";	echo "</th>";
				echo "<th>";	echo "BOOK-NAME";	echo "</th>";
				echo "<th>";	echo "AUTHOR-NAME";	echo "</th>";
				echo "<th>";	echo "EDITION";	echo "</th>";
				echo "<th>";	echo "STATUS";	echo "</th>";
				echo "<th>";	echo "QUANTITY";	echo "</th>";
				echo "<th>";	echo "DEPARTMENT";	echo "</th>";
				echo "</tr>";
			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";

				echo "<td>";	echo $row['bid'];	echo "</td>";
				echo "<td>";	echo $row['name'];	echo "</td>";
				echo "<td>";	echo $row['authors'];	echo "</td>";
				echo "<td>";	echo $row['edition'];	echo "</td>";
				echo "<td>";	echo $row['status'];	echo "</td>";
				echo "<td>";	echo $row['quantity'];	echo "</td>";
				echo "<td>";	echo $row['department'];	echo "</td>";

				echo "</tr>";
			}
			echo "</table>";
		}
		if(isset($_POST['submit2']))
		{
			if(isset($_SESSION['login_user']))
			{
				mysqli_query($db,"INSERT INTO issue_book values ('$_SESSION[login_user]', '$_POST[bid]', '', '', '');");
				?>
					<script type="text/javascript">
						window.location="request.php";
					</script>
				<?php
			}
			else
			{
				?>
					<script type="text/javascript">
						alert("You need to login first to Request......");
					</script>
				<?php
			}
		}
	?>
</body>
</html>