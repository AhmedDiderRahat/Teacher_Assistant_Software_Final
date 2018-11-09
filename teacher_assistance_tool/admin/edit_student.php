<?php
include("../include/function.php");
include("../include/admin_header.php");

$err_msg = "";
$id_pk = $_REQUEST['id'];

if(isset($_REQUEST['submit']))
{
	$std_reg = $_REQUEST['std_reg'];
	$ssn_id = 0;
	$dept_id = 0;
	$id_info = array('ssn_info' => $ssn_id, 'dept_info' => $dept_id);
	
	$id_info = get_dept_ssn($id_info, $std_reg);
	$ssn_id = $id_info['ssn_info'];	
	$dept_id = $id_info['dept_info'];
	
	if($ssn_id==0 or $dept_id==0)
	{
		$err_msg = "Student ID is Not Valid";
	}
	else
	{
		$sql="update students set
			std_reg='$std_reg',
			std_name='$_REQUEST[std_name]',
			ssn_id='$ssn_id',
			sl_no = '$dept_id',
			status='$_REQUEST[status]'
			where std_id='$id_pk'";		
	
		mysql_query($sql);						
		redirect("student.php");
	}	
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

$sql="select * from students where std_id='$_REQUEST[id]'";
$result=mysql_query($sql);
$array=mysql_fetch_array($result);

?>

<div class="body">
	
	<div id="body-left"></div>
	
	<div id="body-middle">
		
		<div id="view_session">
				<div style="height:40px; width:120px;float:center; background:#ac5353;margin-top:10px;">
					<input type="button" name="back_button" id="back_button"  value="Back" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
				</div>				
		</div>
		
		<div style='height:300px; width:400px; margin-top: 30px; background:white;'>
			
						
			<h2 style="color:green; text-align:center; margin-top:50px; padding-top:5px;">
				Edit Student
			</h2>
			
			<form action="edit_student.php?id=<?php echo $_REQUEST['id']?>" method='post'>
				
				<p style='margin-left:30px; padding-top:20px;'>Student ID:
				<input style="width:230px; height:25px;  padding-left:5px;" type="text" name="std_reg" value="<?php if($array['std_reg']){echo $array['std_reg'];}?>">
				</p><br/>
				
				<p style='margin-left:9px;'>Student Name:
				<input style='width:230px; height:25px; padding-left:5px;' type="text" name="std_name" value="<?php if($array['std_name']){echo $array['std_name'];}?>">
				</p><br/>

				<p style='margin-left:61px;'>Status:
					<select name="status" style='padding-left:5px; padding-top:2px; height:25px; width:239px;'>
						<option value="Active" <?php if($array['status']=='Active'){echo "selected";}?>>Active</option>
						
						<option value="Inactive" <?php if($array['status']=='Inactive'){echo "selected";}?>>Inactive</option>
					</select>
				</p><br/>
					
				
				<input type="submit" name="submit" value="submit"  style='margin-left:292px;'>
			</form>									
		</div>	
	</div>	
	
	<div id="body-right"></div>
				
<?php
include("../include/admin_footer.php");
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