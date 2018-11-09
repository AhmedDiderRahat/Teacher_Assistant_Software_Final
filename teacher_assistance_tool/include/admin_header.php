<?php
include("../include/config.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>TA@Admin</title>
		
		<link rel="stylesheet" type="text/css" href="css/menu.css" />
		<script src="../js/jquery.js"> </script>
		<script src="../js/jquery-1.12.3.min.js"> </script>
		<script src="../js/jspdf.min.js"> </script>
		
		<style>
		   ul{
		    width:750px;
			margin: 0px 0 5px 95px;
			text-align:center;
			list-style:none;
		   }
		   ul li{
		   float:left;
		   text-decoration:none;
		   width:75px;
		   margin:5px;
		   height:30px;
		   padding:5px 0 0 0;
		   background:#FFFFFF;
		   border-radius:5px;
		   }
			ul li a{
			text-decoration:none;
			
		   }
		   ul li:hover{
			background:#dedede;
			color:#ff0000;
		   }		
		</style>
	</head>
	
	<body>
		<div class="container">
			<div class="header" style="width:100%;">
				<h1 style="height:70px; background:#303030; padding-top:10px; color:white;">ADMIN PANEL</h1>
				<?php if(isset($_SESSION['USERNAME'])){?>
				<div style="height:60px; background:golden;" >
					<ul style="">
						<li style="" ><a href="landing_page.php">Home</a></li>
						<li style=""><a href="department.php">Dept.</a></li>
						<li style="" ><a href="view_session.php">Session</a></li>
						<li style=""><a href="courses.php">Course</a></li>
						<li style=""><a href="student.php">Student</a></li>
						<li style=""><a href="landing_page_result.php">Result</a></li>
						<li style=""><a href="Setting.php">Setting</a></li>
						<li style=""><a href="index.php?action=logout">Logout</a></li>
					</ul>
				</div>
				<?php } ?>
			</div>
			
		