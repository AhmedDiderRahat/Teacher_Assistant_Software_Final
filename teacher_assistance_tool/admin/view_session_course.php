<?php
include("../include/function.php");
include("../include/admin_header.php");

$ssn_id = $_REQUEST['id'];
$test_data = $_REQUEST['id'];
if($_REQUEST['action']=='delete')
{
	$sql="SELECT * FROM session_courses WHERE ssn_crs_id='$_REQUEST[id]'";
	
	$result=mysql_query($sql);
	while ($array=mysql_fetch_array($result))
	{
		$ssn_id = $array['ssn_id'];
	} 

	$sql="delete from session_courses where ssn_crs_id='$_REQUEST[id]'";
	mysql_query($sql);
	redirect("view_session_course.php?id=" . $ssn_id . "&action=courses");
}
	
if($_REQUEST['action']=='add')
{
	$sql="SELECT * FROM session_courses WHERE ssn_crs_id='$_REQUEST[id]'";
	$result=mysql_query($sql);
	while ($array=mysql_fetch_array($result))
	{
		$ssn_id = $array['ssn_id'];
	} 
}
elseif($_REQUEST['action']=='courses')
{
	$ssn_id = $_REQUEST['id'];
}

?>
<div class="body">
	<div id="body-left"></div>
	<div id="body-middle" >
							
		<div id="view_session" style="margin-top:0px; margin-bottom:30px;">
			<div style="height:40px; width:120px;float:left;background:#ac5353;margin-left:20px;">
				<input type="button" name="back_button" id="back_button"  value="Back" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
			</div>	

			<div style="height:40px; width:120px;float:right;background:#ac5353;margin-right:20px;">
				<input type="button" name="add_button" id="add_button"  value="Add Course" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
			</div>				
		</div>
		
		<div style="height:480px; border:0px red solid; overflow:auto;" >
			<table align="center" border='0px' cellspacing='1' cellpadding='2' style='margin-top:0 auto;border:2px solid blue; width:650px; text-align:center;'>
				<tr bgcolor='#999' >							
					<?php
						$sql="SELECT * FROM session where ssn_id = '$ssn_id'";
							$result=mysql_query($sql);
							while ($array=mysql_fetch_array($result))
							{
								$year = $array['year'];
								$semester =  $array['semester'];
							} ?>

					<th colspan='2' style="height:35px; text-align:right">Courses of &nbsp
					</th>
					
					<th colspan='5' style="height:35px; text-align:left; color: green;">
					&nbsp
					<?php								
						echo "(" . $semester . "'" . $year . ")";
					?>
					</th>
				</tr>
					
				<tr bgcolor='#ddd' style="height:25px;">
					<th style="width:15px;">SL#</th>
					<th style="width:60px;">course code</th>
					<th>course name</th>
					<th style="width:25px;">Dept.</th>
					<th style="width:35px;">credit</th>
					<th style="width:35px;">status</th>
					<th style="width:115px;">action</th>
				</tr>
				
				<?php
				$sql="SELECT * FROM courses cr, session_courses sc, department dt WHERE cr.crs_id = sc.crs_id and dt.sl_no = sc.sl_no and ssn_id = '$ssn_id'";
			
				$result=mysql_query($sql);
				while ($array=mysql_fetch_array($result))
				{?>	
					<tr bgcolor='#aaa'>
						<td><?php echo $array['crs_id'];?></td>
						<td><?php echo $array['crs_code'];?></td>
						<td><?php echo $array['crs_title'];?></td>
						<td><?php echo $array['short_name'];?></td>
						<td><?php echo $array['crs_credit'];?></td>
						<td><?php echo $array['status'];?></td>
						<td> 
						<a href="course_result.php?id=<?php echo $array['ssn_crs_id']?> &action=view" style="width:50px; background: white; float:left;margin-left:5px; border-radius: 0px;">Result</a>  
						
						<a href="view_session_course.php?id=<?php echo $array['ssn_crs_id']?>&action=delete" style="width:50px; background: white; float:left; margin-left:5px; border-radius: 0px;">Delete </a>
						</td>
					</tr> <?php 
				} ?>		
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
			window.location.replace("view_session.php");	
		});
		$('#add_button').click(function()
		{
			window.location.replace("add_session_course.php?id=<?php echo $test_data;?>");
		});
	});
</script>