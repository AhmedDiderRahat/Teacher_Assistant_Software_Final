<?php
include("../include/function.php");
include("../include/admin_header.php");

if(isset($_REQUEST['submit']))
{
	$err = "";
 	if($_POST['dept_code']==null || $_POST['dept_name']==null || $_POST['short_form']==null || $_POST['status']=='err')
	{
		$err = "Fill every data perfectly...!!!";
	} 
 	else{
		$sql="insert department set
			dept_code='$_REQUEST[dept_code]',
			dept_name='$_REQUEST[dept_name]',
			short_name='$_REQUEST[short_form]',
			status='$_REQUEST[status]'";								
			//echo $sql; exit;
		mysql_query($sql);
		redirect("department.php");
	} 
}
?>

<link rel="stylesheet" type="text/css" href="css/menu.css" />

	<div class="body">	
	
		<div id="body-left"></div>	
		
		<div id="body-middle">
			<div id="view_session">
				<div style="height:40px; width:120px;float:center;background:#ac5353;margin-top:10px;">
					<input type="button" name="back_button" id="back_button"  value="Back" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
				</div>				
			</div>
		
			<div style='height:320px; width:450px; background:white; margin-top:60px; padding-top:25px'>
				<h4  style='padding-left:0px; padding-bottom:10px; text-align:center'>
					<font color="red"><?php  if((isset($err))) echo $err; ?></font>
				</h4>
				
				<h3 style='text-align:center;'>Add Department</h3><br/>
				
				<form action="add_department.php" method="post" align="">
					<p style='padding-left:10px;'>Department Code:
						<input type="text" style="height:25px; width:300px;" name="dept_code" value="">
					</p></br>
					
					<p style='margin-left:15px;'>Department Title:
						<input type="text" style="height:25px; width:300px;" name="dept_name" value="" style='margin-left:0px;'>
					</p></br>
					
					<p style='margin-left:50px;'>Short Form:
						<input type="text" style="height:25px; width:300px;" name="short_form" value="" style='margin-left:0px;'>
					</p></br>
					
					<p style='margin-left:83px;'>Status:
						<select name="status" style='height:30px; padding-top:0px; width:305px;'>
							<option value="err">--Select--</option>
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
						</select>
					</p><br/>	
					
					<input type="submit" name="submit" value="submit"  style=' float: right; margin-right: 15px;'>
					
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
			window.location.replace("department.php");
		});
	});
</script>