<?php
//update.php
include("../include/config.php");

if(isset($_POST["std_id"]))
{
	$id_pk=-999;
	
	$sql_std = "SELECT std_id FROM students WHERE std_reg='$_POST[std_id]'";
	$result=mysql_query($sql_std);
	while ($array=mysql_fetch_array($result))
	{
			$id_pk = $array['std_id'];
	}
	
	if($id_pk != -999){
		$sql="update results set
			ssn_crs_id='$_POST[ssn_crs_id]',
			std_id=$id_pk,
			attendance='$_POST[attendance]',
			class_test='$_POST[class_test]',
			viva_presentation='$_POST[viva_pres]',
			mid_sem='$_POST[mid_sem]',
			final_sem='$_POST[final_sem]',
			remarks='$_POST[remarks]'
			WHERE rsl_id='$_POST[rsl_id]'";	
		
		mysql_query($sql);
	}
	else
		echo "Student Id Not Found";
}
?>