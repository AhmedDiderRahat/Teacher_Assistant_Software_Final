<?php
include("../include/function.php");
include("../include/admin_header.php");

	if(isset($_REQUEST['action'])=='delete')
    {
		$sql="delete from courses where crs_id='$_REQUEST[id]'";
		mysql_query($sql);
	}
?>
<div class="body">
	<div id="body-left"></div>
	<div id="body-middle">	
	
		<div id="view_session" style="margin-top:10px; margin-bottom:20px;">
			<div style="height:40px; width:120px;float:left;background:#ac5353;margin-left:21px;">
				<input type="button" name="back_button" id="back_button"  value="Back" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
			</div>	

			<div style="height:40px; width:120px;float:left;background:#ac5353;margin-left:408px;">
				<input type="button" name="add_button" id="add_button"  value="Add Course" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
			</div>				
		</div>	

		<div id="course">
			<table align="center" border='0px' cellspacing='1' cellpadding='2' style='margin-top:0 auto;border:0px solid red; width:650px; text-align:center;'>
				<tr bgcolor='#999' >									
					<th colspan='7' style="height:35px;">Courses</th>
				</tr>
					
				<tr bgcolor='#ddd' style="height:25px;">
					<th >Sl. number</th>
					<th>course code</th>
					<th>course name</th>
					<th>credit</th>
					<th>status</th>
					<th style="width:140px;">action</th>
				</tr> <?php
				
				$sql="select * from courses where status = '" . 'Active' . "'";
				$result=mysql_query($sql);
				while ($array=mysql_fetch_array($result))
				{ ?>	
				<tr bgcolor='#aaa'>
					<td><?php echo $array['crs_id'];?></td>
					<td><?php echo $array['crs_code'];?></td>
					<td><?php echo $array['crs_title'];?></a></td>
					<td><?php echo $array['crs_credit'];?></td>
					<td><?php echo $array['status'];?></td>
					<td style="width:170px"> 
						<a href="view_course.php?id=<?php echo $array['crs_id']?>&action=view" style="width:45px; background: white; float:left;margin-left:10px; border-radius: 0px;">View</a>
						
						<a href="edit_course.php?id=<?php echo $array['crs_id']?>&action=edit" style="width:40px; background: white; float:left;margin-left:10px; border-radius: 0px;">Edit</a>
						
						<a href="courses.php?id=<?php echo $array['crs_id']?>&action=delete" style="width:50px; background: white; float:left;margin-left:10px; border-radius: 0px;">Delete </a>  
					</td>
				</tr> <?php 
				} 
				
				$sql="select * from courses where status = '" . 'Inactive' . "'";
				$result=mysql_query($sql);
				while ($array=mysql_fetch_array($result))
				{ ?>	
				<tr bgcolor='#aaa'>
					<td><?php echo $array['crs_id'];?></td>
					<td><?php echo $array['crs_code'];?></td>
					<td><?php echo $array['crs_title'];?></a></td>
					<td><?php echo $array['crs_credit'];?></td>
					<td><?php echo $array['status'];?></td>
					<td style="width:170px"> 
						<a href="view_course.php?id=<?php echo $array['crs_id']?>&action=view" style="width:45px; background: white; float:left;margin-left:10px; border-radius: 0px;">View</a>
						
						<a href="edit_course.php?id=<?php echo $array['crs_id']?>&action=edit" style="width:40px; background: white; float:left;margin-left:10px; border-radius: 0px;">Edit</a>
						
						<a href="courses.php?id=<?php echo $array['crs_id']?>&action=delete" style="width:50px; background: white; float:left;margin-left:10px; border-radius: 0px;">Delete </a>  
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
			window.location.replace("landing_page.php");
		});
		$('#add_button').click(function()
		{
			window.location.replace("add_course.php");
		});
	});
</script>