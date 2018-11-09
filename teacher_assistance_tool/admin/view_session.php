<?php
include("../include/function.php");
include("../include/admin_header.php");

if(isset($_REQUEST['action'])=='delete')
{			
	$sql="delete from session where ssn_id='$_REQUEST[id]'";		
	mysql_query($sql);
	redirect("view_session.php");
}

?>

<div class="body" >
	<div id="body-left"></div>
	<div id="body-middle" style="margin-top:0px;" >	
	
		<div id="view_session">
			<div style="height:40px; width:120px;float:left;background:#ac5353;margin-left:95px;">
				<input type="button" name="back_button" id="back_button"  value="Back" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
			</div>	
			
			<div style="height:40px; width:120px;float:left;background:#ac5353;margin-left:258px;">
				<input type="button" name="add_button" id="add_button"  value="Add Session" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
			</div>				
		</div>	

		<table align="center" border='2px' cellspacing='1' cellpadding='2' style='margin-top:40px; auto; border:2px; width:500px; text-align:center;'>
		
			<tr bgcolor='#aaa' style="height:40px;">
					<th colspan='5'>Sessions</th>
			</tr>
			<tr bgcolor='#ddd' style="height:40px;">
				<th>serial number</th>
				<th>year</th>
				<th>semester</th>
				<th>status</th>
				<th style="width:190px">action</th>
			</tr> <?php
			
			
			$sql="select * from session order by ssn_id desc";
			$result=mysql_query($sql);
			while ($array=mysql_fetch_array($result))
			{ ?>	
			
			<tr bgcolor='#aaa'>
				<td> 
					<?php echo $array['ssn_id'];?>
				</td>
				
				<td>
					<?php echo $array['year'];?>
				</td>
				<td>
					<?php echo $array['semester'];?>
				</td>
				<td>
					<?php echo $array['status'];?>
				</td>
				<td>
					<a href="view_session_course.php?id=<?php echo $array['ssn_id']?>&action=courses" style="width:65px; background: white; float:left;margin-left:10px; border-radius: 0px;">Courses </a>
					
					<a href="edit_session.php?id=<?php echo $array['ssn_id']?>&action=edit" style="width:35px; background: white; float:left;margin-left:10px; border-radius: 0px;">Edit</a>
					
					<a href="view_session.php?id=<?php echo $array['ssn_id']?>&action=delete" style="width:50px; background: white; float:left;margin-left:10px; border-radius: 0px;">Delete</a>
				</td>
			</tr> <?php 
			} ?> 
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
			window.location.replace("add_session.php");
		});
	});
</script>
