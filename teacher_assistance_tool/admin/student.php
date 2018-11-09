<?php
include("../include/function.php");
include("../include/admin_header.php");

if(isset($_REQUEST['action'])=='delete')
{			
	$sql="delete from students where std_id='$_REQUEST[id]'";		
	mysql_query($sql);
	redirect("student.php");
}
   
function get_dept($sl_no)
{
	$sql = "SELECT * FROM department WHERE sl_no = '$sl_no'";
	$dept = "N/A";
	$result=mysql_query($sql);
	while ($array=mysql_fetch_array($result))
	{
		$dept = $array['short_name'];
	}
	return $dept;
}

function get_session($ssn_id)
{
	$sql = "SELECT * FROM session WHERE ssn_id = '$ssn_id'";
	
	$result=mysql_query($sql);
	while ($array=mysql_fetch_array($result))
	{
		$year = $array['year'];
		$year = substr($year, 2, 2);
		$semester = $array['semester'];
	}
	return $semester . '\'' . $year;
}   
   
?>
<div class="body">
	<div id="body-left"></div>
		
	<div id="body-middle" style="overflow:auto;">
		
		<div id="view_session" style="margin-top:0px; margin-bottom:30px;">
			<div style="height:40px; width:120px;float:left;background:#ac5353;margin-left:12px;">
				<input type="button" name="back_button" id="back_button"  value="Back" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
			</div>	

			<div style="height:40px; width:120px;float:right;background:#ac5353;margin-right:11px;">
				<input type="button" name="add_button" id="add_button"  value="Add Student" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
			</div>				
		</div>
			
			
		<table align="center" border='0px' cellspacing='1' cellpadding='2'  style='width:670px; margin-top:15px; auto; border:2px;text-align:center;'>
					
			<tr bgcolor='#aaa'>
				<th style="height:30px" colspan='6'>STUDENT</th>
			</tr>
				
			<tr bgcolor='#ddd'>
				<th style="width:100px;">ID No.</th>
				<th>Name</th>
				<th style="width:40px"> Dept.</th>
				<th style="width:70px">Session</th>
				<th style="width:50px">Status</th>
				<th style="width:150px">Action</th>
			</tr>
					
			<?php
				$sql="select * from students";
				$result=mysql_query($sql);
				while ($array=mysql_fetch_array($result))
				{
			?>	
					
			<tr bgcolor='#aaa'>
				<td> 
					<?php echo $array['std_reg'];?>
				</td>
				
				<td>
					<?php echo $array['std_name'];?>
				</td>
				
				<td>
					<?php 
						echo get_dept($array['sl_no']);
					?>
				</td>
				
				<td>
					<?php
						echo get_session($array['ssn_id']);
					?>
				</td>
				<td>
					<?php echo $array['status'];?>
				</td>
				<td style="width=250px">   
					<a href="view_student.php?id=<?php echo  $array['std_id'] ?> &action=view" style="width:45px; background: white; float:left;margin-left:5px; border-radius: 0px;">View </a>
					
					<a href="edit_student.php?id=<?php echo $array['std_id']?>&action=edit" style="width:40px; background: white; float:left;margin-left:5px; border-radius: 0px;">Edit </a>
					
					<a href="student.php?id=<?php echo $array['std_id']?>&action=delete" style="width:45px; background: white; float:left;margin-left:5px; border-radius: 0px;">Delete </a>
				</td>
			</tr> 
			<?php } ?> 		
		</table>
	</div>
	<div id="body-right"></div>	
</div>		
<?php
include("../include/admin_footer.php");
?>

<script>
	$(document).ready(function()
	{
		$('#back_button').click(function()
		{
			window.location.replace("landing_page.php");
		});
		$('#add_button').click(function()
		{
			window.location.replace("add_student.php");
		});
	});
</script>