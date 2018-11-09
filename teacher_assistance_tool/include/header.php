<?php
include("include/config.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>TA@Admin</title>
		
		<link rel="stylesheet" type="text/css" href="css/menu.css" />
		<script src="js/jquery.js"> </script>
		<script src="js/jquery-1.12.3.min.js"> </script>
		<script src="js/jspdf.min.js"> </script>
		
		<style>
		   ul{
		    width:750px;
			margin: 0px 0 5px 180px;
			text-align:center;
			list-style:none;
		   }
		   ul li{
		   float:left;
		   text-decoration:none;
		   width:100px;
		   margin:5px;
		   margin-left:50px;
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
				<div style="height:60px; background:golden;" >
					<ul style="">
						<li style="" ><a href="index.php">Home</a></li>
						
						
						<li style=""><a href="landing_page_result.php">Result</a></li>
						
						<li style=""><a href="admin/index.php?action=logout">LogIn</a></li>
					</ul>
				</div>
			</div>
			
		