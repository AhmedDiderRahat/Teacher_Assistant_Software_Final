<?php
include("../include/function.php");
include("../include/admin_header.php");

$ssn_id = $_REQUEST['id'];

if(isset($_REQUEST['submit']))
{
	$err = "";
	
	if($_POST['course_title']==null or $_POST['department']==null or $_POST['status']==null)
	{		
		$err = "Fill every data perfectly...!!!";
	} 
 	else
	{
		$crs_id = htmlentities($_POST['course_title'], ENT_QUOTES, "UTF-8");
		$dpt_id = htmlentities($_POST['department'], ENT_QUOTES, "UTF-8");
		
		if($ssn_id == -999)
		{
			$ssn_id = htmlentities($_POST['session'], ENT_QUOTES, "UTF-8");
			if($ssn_id == null)
				$err = "Fill every data perfectly...!!!";
			else
			{	
				$sql="insert session_courses set
					ssn_id= '$ssn_id', 
					crs_id = '$crs_id',
					sl_no= '$dpt_id',
					sc_status='$_REQUEST[status]'";
				mysql_query($sql);
				Header("Location: landing_page_result.php");
			}
		}
		else
		{
			$sql="insert session_courses set
				ssn_id= '$ssn_id', 
				crs_id = '$crs_id',
				sl_no= '$dpt_id',
				sc_status='$_REQUEST[status]'";
			mysql_query($sql);
			Header("Location: view_session_course.php?id=".$ssn_id."&action=courses");
		}
	} 
} ?>

<link rel="stylesheet" type="text/css" href="css/menu.css" />
	<div class="body">			
		<div id="body-left"></div>	
		<div id="body-middle">
		
			<div id="view_session">
				<div style="height:40px; width:120px;float:center;background:#ac5353;margin-top:10px;">
					<input type="button" name="back_button" id="back_button"  value="Back" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
				</div>				
			</div>
		
			<div style='height:310px; width:450px; background:white; margin-top:60px; padding-top:25px'>
			<h3 style='text-align:center;'>Add Course</h3><br/>
				<h4  style='padding-left:130px; padding-bottom:20px;'>
				<font color="red"><?php  if((isset($err))) echo $err; ?></font>
				</h4>
				<form action="add_session_course.php? id= <?php echo $ssn_id ?>" method="post" align="">
					
					<p style='margin-left:35px;'>course title:
						<select name="course_title" style='height:30px; width:300px; padding-top:2px;'>
								<option value="">--Select--</option>
								<?php
								$sql="select * from courses where status = '" . 'Active' . "'";
								$result=mysql_query($sql);
								while ($array=mysql_fetch_array($result))
								{?>	
									<option value="<?php echo $array['crs_id']; ?>"> <?php echo $array['crs_title']; ?></option>
									<?php
								}?>
						</select>
					</p></br>
					
					<p style='margin-left:30px;'>Department:
						<select name="department" style='height:30px; width:300px; padding-top:2px;'>
							<option value="">--Select--</option>
							<?php
							$sql="select * from department where status = '" . 'Active' . "'";
							$result=mysql_query($sql);
							while ($array=mysql_fetch_array($result))
							{?>	
								<option value="<?php echo $array['sl_no']; ?>"> <?php echo $array['dept_name']; ?></option> <?php
							}?>
						</select>
					</p></br> <?php
					
					if($ssn_id == -999)
					{ ?>
						
					<p style='margin-left:56px;'>Session:
						<select name="session" style='height:30px; padding-top:0px; width:300px;'>
							<option value="">--Select--</option>
							<?php
							$sql="select * from session where status = '" . 'Active' . "'";
							$result=mysql_query($sql);
							while ($array=mysql_fetch_array($result))
							{?>	
								<option value="<?php echo $array['ssn_id']; ?>"> 
									<?php echo $array['semester'] . '\'' . substr($array['year'], 2, 2);?>
								</option> <?php
							}?>
						</select>
					</p></br> <?php 
					} ?>
						
					<p style='margin-left:66px;'>Status:
						<select name="status" style='height:30px; padding-top:0px; width:300px;'>
							<option value="">--Select--</option>
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
						</select>
					</p><br/>
					
					<input type="submit" name="submit" value="submit"  style='float: right; margin-right: 37px;'>
				</form>	
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
			var ssn_id_data = "<?php echo $ssn_id?>"
			if(ssn_id_data==-999)
			{
				window.location.replace("landing_page_result.php");	
			}
			else
			{	
				window.location.replace("view_session_course.php?id=<?php echo $ssn_id;?>&action=courses");	
			}
		});
	});
</script>
