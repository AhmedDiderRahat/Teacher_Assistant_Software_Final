<html>
	<head> 
		<style>
.st {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: auto;
    background-color: #3CB371;
	width:170px;
	height:80px;
}
.lis {
    list-style-type: none;
	width:145px;
	height:20px;
	margin-top:2px;
    padding: 0;
}

		</style>
	</head>
</html>

<?php
//insert.php
include("../include/config.php");

if(isset($_POST["query"]))
{
	$output = '';
	
	$sql = "SELECT * FROM students WHERE std_reg LIKE '%" . $_POST["query"] . "%' and status='Active' order by std_reg";
	
	$result=mysql_query($sql);

	$output = '<ul class="st">';  
	if(mysql_num_rows ($result) == 0)
		$output .= '<li class="lis">' . "No Match" . '</li>'; 
	else	
		while ($array=mysql_fetch_array($result))
		{
			$output .= '<li class="lis">' . $array['std_reg'] . '</li>'; 
		}
	$output .= '</ul>';
	echo $output;
}
?>