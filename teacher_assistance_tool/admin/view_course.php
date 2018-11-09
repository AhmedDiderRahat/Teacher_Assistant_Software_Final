<?php
include("../include/function.php");
include("../include/admin_header.php");

$num_of_sem = 0;
$sql="select * from courses where crs_id='$_REQUEST[id]'";
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
					
		<div id="view_course">
			<table width="450px;" style='float:center; margin-top:70px; padding-left:5px;'>
				<tr width="">
					<td colspan='3' bgcolor='#333333' style='text-align:center; height:40px;' >
						<h3 style='color:white;'>Course Details</h3>
					</td>
				</tr>
				
				<tr>
					<td style="padding-left:5px;" width="25%" bgcolor='#afafaf'>serial number</td>
					<td width="5%" bgcolor='#bafcfc' align='center'> : </td>
					<td width="70%" bgcolor='#cfcfcf' style="padding-left:5px;">
						<?php echo $array['crs_id'] ?>
					</td>
				</tr>
				
				<tr>
					<td bgcolor='#afafaf' style="padding-left:5px;">course code</td>
					<td width="5%" bgcolor='#bafcfc' align='center'> : </td>
					<td bgcolor='#cfcfcf' style="padding-left:5px;">
						<?php echo $array['crs_code'] ?>
					</td>
				</tr>	
				
				<tr>
					<td bgcolor='#afafaf' style="padding-left:5px;">course name</td>
					<td width="5%" bgcolor='#bafcfc' align='center'> : </td>
					<td bgcolor='#cfcfcf' style="padding-left:5px;">
						<?php echo $array['crs_title'] ?>
					</td>
				</tr> 
				
				<tr>
					<td bgcolor='#afafaf' style="padding-left:5px;">credit</td>
					<td width="5%" bgcolor='#bafcfc' align='center'> : </td>
					<td bgcolor='#cfcfcf' style="padding-left:5px;">
						<?php echo $array['crs_credit'] ?>
					</td>
				</tr>

				<tr>
					<td bgcolor='#afafaf' style="padding-left:5px;">semester(s)</td>
					<td width="5%" bgcolor='#bafcfc' align='center'> : </td>
					<td bgcolor='#cfcfcf' style="padding-left:5px;">
						<?php
							$sql_sem="SELECT * FROM session INNER JOIN session_courses ON session.ssn_id=session_courses.ssn_id where crs_id = '$_REQUEST[id]'";
							$semesters = "";
							$result=mysql_query($sql_sem);
							while ($array_sem=mysql_fetch_array($result))
							{ 
								$num_of_sem++;
								$cur_year = substr($array_sem['year'], 2);
								$curr = $array_sem['semester'] . '\'' . $cur_year;
								$semesters = $semesters .', ' . $curr;
							}
							$semesters = substr($semesters, 1);	
							if(strlen($semesters) == 0)
								echo "Not Taken";
							else
								echo $semesters; 
						?>
					</td>
				</tr> 
				
				<tr>
					<td bgcolor='#afafaf' style="padding-left:5px;">No of Semester</td>
					<td width="5%" bgcolor='#bafcfc' align='center'> : </td>
					<td bgcolor='#cfcfcf' style="padding-left:5px;">
						<?php echo $num_of_sem?>
					</td>
				</tr>
				
				<tr>
					<td bgcolor='#afafaf' style="padding-left:5px;">No of Student</td>
					<td width="5%" bgcolor='#bafcfc' align='center'> : </td>
					<td bgcolor='#cfcfcf' style="padding-left:5px;">
						<?php 
							$sql="SELECT COUNT(rsl_id) FROM results rs, session_courses sc WHERE rs.ssn_crs_id = sc.ssn_crs_id and crs_id='$_REQUEST[id]'";

							$result=mysql_query($sql);

							while ($array_new=mysql_fetch_array($result))
							{ 
								echo $array_new['COUNT(rsl_id)'] . '</br>'; 	
							}
						?>
					</td>
				</tr>

				<tr>
					<td bgcolor='#afafaf' style="padding-left:5px;">status</td>
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
	$(document).ready(function(){
		
		$('#back_button').click(function()
		{
			window.location.replace("courses.php");
		});
	});
</script>