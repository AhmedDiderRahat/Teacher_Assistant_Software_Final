<?php
include("../include/function.php");
include("../include/admin_header.php");

if(isset($_REQUEST['submit']))
{	

	$sql="update session set
			year='$_REQUEST[year]',
			semester='$_REQUEST[semester]',
			status='$_REQUEST[status]'
		where ssn_id='$_REQUEST[id]'";
		
	mysql_query($sql);
	redirect("view_session.php");
}
$sql="select * from session where ssn_id='$_REQUEST[id]'";
$result=mysql_query($sql);
$array=mysql_fetch_array($result);
?>
<div class="body">
	<div id="body-left"></div>
	<div id="body-middle" >
	
		<div id="view_session">
			<div style="height:40px; width:120px;float:center;background:#ac5353;margin-top:10px;">
				<input type="button" name="back_button" id="back_button"  value="Back" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
			</div>				
		</div>	

		<div id="add_session">
			<center>
				<form action="edit_session.php?id=<?php echo $_REQUEST['id']?>" method='post' style="margin-top:10px;">
					
					<h3 style='text-align:center;'>Edit Session</h3><br/>
					
					<p style='margin-left:45px;'>year:
						<input type="text" name="year" value="<?php if($array['year']){echo $array['year'];}?>" style='width:145px;margin-left:5px; padding-left:05px;'>
					</p></br>
					
					<p style='margin-left:20px;'>semester:
						<select name="semester" style='padding-left:05px; padding-top:4px; margin-left:02px; width:155px;'>
							<option value="spring" <?php if($array['semester']=='spring'){echo "	selected";}?> >Spring</option>
							<option value="summer" <?php if($array['semester']=='summer'){echo "	selected";}?> >Summer</option>
							<option value="fall" <?php if($array['semester']=='fall'){echo "	selected";}?> >Fall</option>
						</select>
					</p><br/>
					
					<p style='margin-left:35px;'>status:
						<select name="status" style='padding-left:05px; padding-top:4px; margin-left:5px; width:155px;'>
							<option value="Active" <?php if($array['status']=='Active'){echo "	selected";}?> >Active</option>
							<option value="Inactive" <?php if($array['status']=='Inactive'){echo "	selected";}?> >Inactive</option>
						</select>
					</p><br/>
					
					<input type="submit" name="submit" value="submit" style='margin-left:185px;'>
					
				</form>		
			</center>	
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
			window.location.replace("view_session.php");
		});
	});
</script>