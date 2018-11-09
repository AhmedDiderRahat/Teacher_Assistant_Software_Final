<?php
include("../include/function.php");
include("../include/admin_header.php");

$err="";

if(isset($_REQUEST['submit']))
{
	$err = "";

 	if( ($_POST['year']==null) or ($_POST['semester']== 'err') or ($_POST['status']== 'err') )
	{
		$err = "Fill every data perfectly...!!!";
	}
	else
	{				
		$sql="insert session set
			year='$_REQUEST[year]',
			semester='$_REQUEST[semester]',
			status='$_REQUEST[status]'";	
		mysql_query($sql);
		redirect("view_session.php");
	}
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
		
			<div style="height:240px; width:300px; margin-top:60px; padding-top:10px; margin-left:200px; background:white;">
				
				<h4  style='padding-left:50px; padding-bottom:10px;'>
					<font color="red"><?php  if((isset($err))) echo $err; ?></font>
				</h4>
					
				<form action="add_session.php" method="post">
					<h3 style='text-align:center;'>Add Session</h3><br/>
						 
					<p style='margin-left:40px;'>add year:
						<input type="text" name="year" value="" style='width:120px;'>
					</p></br>
					
					<p style='margin-left:38px;'>semester:
						<select name="semester" style='padding-left:05px; padding-top:1px; height:30px; width:125px;'>
							<option value="err">--Select--</option>
							<option value="spring">spring</option>
							<option value="summer">summer</option>
							<option value="fall">fall</option>
						</select>
					</p><br/>
					
					<p style='margin-left:58px;'>status:
							<select name="status" style='padding-left:05px; padding-top:2px; width:125px;'>
								<option value="err">--Select--</option>
								<option value="Active">Active</option>
								<option value="Inactive">Inactive</option>
							</select>
					</p><br/>
					
					<input type="submit" name="submit" value="submit"  style='margin-left:173px;'/></br>
				</form>
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