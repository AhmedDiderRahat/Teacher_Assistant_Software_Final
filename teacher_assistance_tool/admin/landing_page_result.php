<?php
include("../include/function.php");
include("../include/admin_header.php");

$number_of_student=0;

function fetch($var_id)
{
	$sql="SELECT COUNT(std_id) FROM results WHERE ssn_crs_id='$var_id'";
						
	$result=mysql_query($sql);
	while ($array_st=mysql_fetch_array($result))
	{ 
		$number_of_student=$array_st['COUNT(std_id)']; 	
	} 
	return $number_of_student;
}

if(isset($_REQUEST['action'])=='delete')
{
	$sql="delete from session_courses where ssn_crs_id='$_REQUEST[id]'";
	mysql_query($sql);
}
?>

<div class="body">

	<div id="body-left"></div>
	
	<div id="body-middle">
		
		<div id="view_session" style="margin-top:10px; margin-bottom:20px;">
			<div style="height:40px; width:120px;float:left;background:#ac5353;margin-left:6px;">
				<input type="button" name="back_button" id="back_button"  value="Back" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
			</div>	

			<div style="height:40px; width:120px;float:left;background:#ac5353;margin-left:438px;">
				<input type="button" name="add_button" id="add_button"  value="Add Course" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
			</div>				
		</div>	
		
		<div id="course" style="height: 480px;overflow:auto">
			<table align="center" border='0px' cellspacing='1' cellpadding='2' style='margin-top:0 auto;border:0px solid red; width:680px; text-align:center;'>
				<tr bgcolor='#999' >									
					<th colspan='8' style="height:35px;">Results</th>
				</tr>
					
				<tr bgcolor='#ddd' style="height:25px;">
					<th >SL#</th>
					<th>Course</th>
					<th>Session</th>
					<th>Dept.</th>
					<th>Credit</th>
					<th style="width:15px;">Stu- dent No.</th>
					<th>Status</th>
					<th style="width:160px;">Action</th>
				</tr>
				
				<?php
					$sql="SELECT * FROM courses cr, session sn, session_courses sc, department dt WHERE cr.crs_id = sc.crs_id and dt.sl_no = sc.sl_no and sn.ssn_id=sc.ssn_id and sc_status = 'Active' order by ssn_crs_id desc";
					
					$result=mysql_query($sql);
				
				while ($array=mysql_fetch_array($result))
				{ ?>	
					<tr bgcolor='#aaa'>
						<td> <?php echo $array['ssn_crs_id'];?> </td>
						<td> <?php echo $array['crs_title'];?> </a></td>
						<td> <?php echo $array['semester'] . '\'' . substr($array['year'], 2, 2);?> </a></td>
						<td> <?php echo $array['short_name'];?> </td>
						<td> <?php echo $array['crs_credit'];?> </td>
						<td> 
							<?php 					
								echo fetch($array['ssn_crs_id']);
							?> 
						</td>
						<td> <?php echo $array['sc_status'];?> </td>
						<td style="width:160px"> 
							<a href="course_result.php?id=<?php echo $array['ssn_crs_id']?>&action=add"style="width:50px; background: white; float:left;margin-left:5px; border-radius: 0px;"> Result </a>
							
							<a href="edit_session_course.php?id=<?php echo $array['ssn_crs_id']?>&action=edit" style="width:40px; background: white; float:left;margin-left:5px; border-radius: 0px;">Edit </a>
							
							<a href="landing_page_result.php?id=<?php echo $array['ssn_crs_id']?>&action=delete" style="width:50px; background: white; float:left;margin-left:5px; border-radius: 0px;">Delete </a>  
						</td>
					</tr> <?php 
				} ?>
		
				<?php $sql="SELECT * FROM courses cr, session sn, session_courses sc, department dt WHERE cr.crs_id = sc.crs_id and dt.sl_no = sc.sl_no and sn.ssn_id=sc.ssn_id and sc_status = 'Inactive' order by ssn_crs_id";
			
				$result=mysql_query($sql);
				
				while ($array=mysql_fetch_array($result))
				{ ?>	
					<tr bgcolor='#aaa'>
						<td> <?php echo $array['ssn_crs_id'];?> </td>
						<td> <?php echo $array['crs_title'];?> </a></td>
						<td> <?php echo $array['semester'] . '\'' . substr($array['year'], 2, 2);?></a></td>
						<td> <?php echo $array['short_name'];?> </td>
						<td> <?php echo $array['crs_credit'];?> </td>
						<td> 
						
						<?php 					
							echo fetch($array['ssn_crs_id']);
						?> 

						</td>
						<td> <?php echo $array['sc_status'];?> </td>
						<td style="width:160px"> 
							<a href="course_result.php?id=<?php echo $array['ssn_crs_id']?>&action=add"style="width:50px; background: white; float:left;margin-left:5px; border-radius: 0px;"> Result </a>
							
							<a href="edit_session_course.php?id=<?php echo $array['ssn_crs_id']?>&action=edit" style="width:40px; background: white; float:left;margin-left:5px; border-radius: 0px;"> Edit </a>
							
							<a href="landing_page_result.php?id=<?php echo $array['ssn_crs_id']?>&action=delete" style="width:50px; background: white; float:left;margin-left:5px; border-radius: 0px;"> Delete </a>  
						</td>
					</tr> 
					<?php 
				} ?>		  
			</table>						
		</div>
	</div>
	
	<div id="body-right"> </div>	
	
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
			window.location.replace("add_session_course.php?id=<?php echo -999?>");
		});
	});
</script>