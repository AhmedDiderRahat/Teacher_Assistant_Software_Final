<?php
include("../include/function.php");
include("../include/admin_header.php");

if(isset($_REQUEST['submit']))
{	
	$err_msg = "";	
	$std_reg = $_POST['reg_number'];
	
	if($std_reg==null or $_POST['name']==null or $_POST['status']=="err")
	{
		$err_msg = "Fill the Data Properly";
	}
	else{
		$ssn_id = 0;
		$dept_id = 0;
		$id_info = array('ssn_info' => $ssn_id, 'dept_info' => $dept_id);
	
		$id_info = get_dept_ssn($id_info, $std_reg);
		
		if($id_info['ssn_info']==0 or $id_info['dept_info']==0)
		{
			$err_msg = "Student ID is Not Valid";
		}
		else{
			$sql="insert students set
				std_reg='$std_reg',
				std_name='$_REQUEST[name]',
				ssn_id='$id_info[ssn_info]',
				sl_no='$id_info[dept_info]',
				status='$_REQUEST[status]'";
			mysql_query($sql);
			redirect("student.php");
		}
	}
}

function student_info($std_id){
	return $id_info;
}

function get_sem_name($sem_no){
	switch ($sem_no){
		case 1:
			return "spring";
		case 2:
			return "summer";
		case 3:
			return "fall";
		default:
			return "error";
	}
}

function get_dept($dept_code)
{
	$sl_no = 0;
	$sql = "SELECT sl_no FROM department WHERE dept_code = '$dept_code'";
	$result=mysql_query($sql);
	while ($array=mysql_fetch_array($result))
	{
		$sl_no = $array['sl_no'];
	}
	
	return $sl_no;
}

function get_session_id($year, $semester_name)
{
	$ssn_id = 0;
	$sql = "SELECT ssn_id FROM session WHERE year = '$year' && semester = '$semester_name'";
	$result=mysql_query($sql);
	while ($array=mysql_fetch_array($result))
	{
		$ssn_id = $array['ssn_id'];
	}
	
	return $ssn_id;
}

function get_dept_ssn($id_info, $std_reg)
{
	$year = "20" . substr($std_reg, 0, 2);	
	$semester_no = substr($std_reg, 3, 1);
	$semester_name = get_sem_name($semester_no);
	$dept_code = substr($std_reg, 4, 4); // 14 02 0302	
	
	$ssn_id = get_session_id($year, $semester_name);
	$dept_id = get_dept($dept_code);
	
	$id_info['ssn_info'] = $ssn_id;
	$id_info['dept_info'] = $dept_id;	
	
	return $id_info;
}

?>	
	
<div class="body">
	<div id="body-left"></div>
		
	<div id="body-middle">
				
		<div id="view_session">
			<div style="height:40px; width:120px;float:center;background:#ac5353;margin-top:10px;">
				<input type="button" name="back_button" id="back_button"  value="Back" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
			</div>				
		</div>
				
		<div id="add_student" style="margin-top:60px;">
			<h4  style='padding-left:0px; padding-bottom:10px; text-align:center'>
					<font color="red"><?php  if((isset($err_msg))) echo $err_msg; ?></font>
			</h4>
				<h3> <center>Add Student</center> </h3>
			<form action="add_student.php" method="POST" style='padding-top:30px;'>
				<p style='margin-left:62px;'>Student ID:
				<input type="text" name="reg_number" value="" style='width:120px;'></p></br>
				<p style='margin-left:40px;'>Student Name:
				<input type="text" name="name" value="" style='width:120px;'></p></br>
				
				<p style='margin-left:95px;'>status:
					<select name="status" style='padding-left:5px; padding-top:4px; width:125px;'>
						<option value="err">--Select--</option>
						<option value="Active">Active</option>
						<option value="Inactive">Inactive</option>
					</select>
				</p><br/>
					
				<input type="submit" name="submit" value="submit"  style='margin-left:210px;'/></br>
			</form>		
		</div>
	</div>
		
	<div id="body-right"></div>
	
</div>
	
<?php
include("include/footer.php");
?>

<script>
	$(document).ready(function()
	{
		$('#back_button').click(function()
		{
			window.location.replace("student.php");	
		});
	});
</script>