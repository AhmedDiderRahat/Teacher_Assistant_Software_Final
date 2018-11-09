<?php
include("../include/function.php");
include("../include/admin_header.php");

$number_of_course = 0;
$sql="SELECT * FROM session sn, students sd, department dt WHERE sd.ssn_id=sn.ssn_id and sd.sl_no = dt.sl_no and sd.std_id = '$_REQUEST[id]'";

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
					
		<div style="height:500px; width:600px; bgcolor:#ffffff; margin-top:100px; margin-left:90px">
		
			<table width="500px;" style='margin-left:0px; margin-top:10px; padding-left:5px;'>
			
				<tr width="">
					<td colspan='3' bgcolor='#333333' style='text-align:center; height:40px;' >
						<h3 style='color:white;'>Student Details</h3>
					</td>
				</tr>
				
				<tr>
					<td style="padding-left:5px;" width="30%" bgcolor='#afafaf'>serial number</td>
					<td width="5%" bgcolor='#bafcfc' align='center'> : </td>
					<td width="65%" bgcolor='#cfcfcf' style="padding-left:5px;">
						<?php echo $array['std_id'] ?>
					</td>
				</tr>
				
				<tr>
					<td bgcolor='#afafaf' style="padding-left:5px;">Student Id</td>
					<td width="5%" bgcolor='#bafcfc' align='center'> : </td>
					<td bgcolor='#cfcfcf' style="padding-left:5px;">
						<?php echo $array['std_reg'] ?>
					</td>
				</tr>	
				
				<tr>
					<td bgcolor='#afafaf' style="padding-left:5px;">Student Name</td>
					<td width="5%" bgcolor='#bafcfc' align='center'> : </td>
					<td bgcolor='#cfcfcf' style="padding-left:5px;">
						<?php echo $array['std_name'] ?>
					</td>
				</tr> 
				
				<tr>
					<td bgcolor='#afafaf' style="padding-left:5px;">Department Name</td>
					<td width="5%" bgcolor='#bafcfc' align='center'> : </td>
					<td bgcolor='#cfcfcf' style="padding-left:5px;">
						<?php echo $array['dept_name']  . ' (' . $array['short_name'] . ')'?>
					</td>
				</tr>
				
				<tr>
					<td bgcolor='#afafaf' style="padding-left:5px;">Session</td>
					<td width="5%" bgcolor='#bafcfc' align='center'> : </td>
					<td bgcolor='#cfcfcf' style="padding-left:5px;">
						<?php echo $array['semester'] . '\'' . substr($array['year'], 2,2) ?>
					</td>
				</tr>
				
				<tr>
					<td bgcolor='#afafaf' style="padding-left:5px;">No of Course Taken</td>
					<td width="5%" bgcolor='#bafcfc' align='center'> : </td>
					<td bgcolor='#cfcfcf' style="padding-left:5px;"><?php 
					
						$sql="SELECT COUNT(rsl_id)  FROM results WHERE std_id = '$_REQUEST[id]'";
						$result=mysql_query($sql);
					
						while ($array_st=mysql_fetch_array($result))
						{ 
							$number_of_course=$array_st['COUNT(rsl_id)'];
						} 	
						echo $number_of_course;
						?>	
					</td>
				</tr>
				
				<tr>
					<td bgcolor='#afafaf' style="padding-left:5px;">Status</td>
					<td width="5%" bgcolor='#bafcfc' align='center'> : </td>
					<td bgcolor='#cfcfcf' style="padding-left:5px;">
						<?php echo $array['status']; ?>
					</td>
				</tr> 			 
			</table>
		</div>
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
			window.location.replace("student.php");	
		});
	});
</script>