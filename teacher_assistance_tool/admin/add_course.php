<?php
include("../include/function.php");
include("../include/admin_header.php");

if(isset($_REQUEST['submit']))
{
	$err = "";
 	if($_POST['course_code']==null || $_POST['course_title']==null || $_POST['credit']==null || $_POST['status']==null)
	{
		$err = "Fill every data perfectly...!!!";
	} 
 	else{
		$sql="insert courses set
			crs_code='$_REQUEST[course_code]',
			crs_title='$_REQUEST[course_title]',
			crs_credit='$_REQUEST[credit]',
			status='$_REQUEST[status]'";								
			//echo $sql; exit;
		mysql_query($sql);
		redirect("courses.php");
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
			
			<div style='height:320px; width:350px; background:white; margin-top:60px; padding-top:25px'>
				
				<h3 style='text-align:center;'>Add Course</h3><br/>
				
				<h4  style='padding-left:90px; padding-bottom:20px;'>				
					<font color="red"><?php  if((isset($err))) echo $err; ?></font>
				</h4>
				
				<form action="add_course.php" method="post" align="">
					<p style='padding-left:30px;'>course code:
					<input type="text" style="height:25px; width:200px;" name="course_code" value="">
					</p></br>
					
					<p style='margin-left:35px;'>course title:
					<input type="text" style="height:25px; width:200px;" name="course_title" value="" style='margin-left:0px;'>
					</p></br>
					
					<p style='margin-left: 68px;'>credit:
						<select name="credit" style='height:30px; width:205px; padding-top:2px;'>
							<option value="">--Select--</option>
							<option value="1.00">1.00</option>
							<option value="1.50">1.50</option>
							<option value="2.00">2.00</option>
							<option value="3.00">3.00</option>
							<option value="4.00">4.00</option>
						</select>
					</p></br>

					<p style='margin-left:68px;'>status:
						<select name="status" style='height:30px; padding-top:0px; width:205px;'>
							<option value="">--Select--</option>
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
						</select>
					</p><br/>	
					
					<input type="submit" name="submit" value="submit"  style=' float: right; margin-right: 32px;'>
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
		window.location.replace("courses.php");
	});
});
</script>

