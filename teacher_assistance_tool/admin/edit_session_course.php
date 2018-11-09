<?php
include("../include/function.php");
include("../include/admin_header.php");
include("../include/user_function.php");

if(isset($_REQUEST['submit']))
{	
 	$sql="update session_courses set
		ssn_id='$_REQUEST[session_id]',
		crs_id='$_REQUEST[course_id]',
		sl_no='$_REQUEST[department_id]',
		sc_status='$_REQUEST[status]'
		where ssn_crs_id='$_REQUEST[id]'";		
	mysql_query($sql);						
	redirect("landing_page_result.php");
}

$sql="select * from session_courses sc, session sn, department dt, courses cr where sc.crs_id=cr.crs_id and dt.sl_no=sc.sl_no and sn.ssn_id=sc.ssn_id and ssn_crs_id='$_REQUEST[id]'";
$result=mysql_query($sql);
$array=mysql_fetch_array($result);

?>

<div class="body">
	<div id="body-left"></div>
	
	<div id="body-middle">
	
		<div id="view_session">
			<div style="height:40px; width:120px;float:center;background:#ac5353;margin-top:10px;">
				<input type="button" name="back_button" id="back_button"  value="Back" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
			</div>				
		</div>
		
		<div style='height:300px; width:400px; margin-top: 40px; background:white;'>
		
			<h2 style="color:green; text-align:center; padding-top:5px;">
				Edit Session Course
			</h2>
			<form action="edit_session_course.php?id=<?php echo $_REQUEST['id']?>" method='post'>
				
				<p style='margin-left:32px; padding-top:20px;'>Session:				
					<select name="session_id" style='height:30px; width:300px; padding-top:2px;'>
						<option value="<?php echo $array['ssn_id'];?>"> <?php if($array['ssn_id']){echo $array['semester'] . '\'' . substr($array['year'], 2, 2);}?></option>
						<?php
							$sql="select * FROM session WHERE status = '" . 'Active' . "'";
							$result=mysql_query($sql);
							while ($array_session=mysql_fetch_array($result))
							{?>	
								<option value="<?php echo $array_session['ssn_id'];?>"> <?php echo $array_session['semester'] . '\'' . substr($array_session['year'], 2, 2); ?></option>
					<?php	}?>
					</select> 
				</p> 
				
				<p style='margin-left:35px; padding-top:20px;'>Course:				
					<select name="course_id" style='height:30px; width:300px; padding-top:2px;'>
						<option value="<?php echo $array['crs_id'];?>"> <?php if($array['crs_id']){echo $array['crs_title'];}?></option>
						<?php
							$sql="select * FROM courses WHERE status = '" . 'Active' . "' and crs_title != '$array[crs_title]'" ;
							$result=mysql_query($sql);
							while ($array_course=mysql_fetch_array($result))
							{?>	
								<option value="<?php echo $array_course['crs_id'];?>"> <?php echo $array_course['crs_title']; ?></option>
					<?php	}?>
					</select> 
				</p> 
				
				<p style='margin-left:5px; padding-top:20px;'>Department:				
					<select name="department_id" style='height:30px; width:300px; padding-top:2px;'>
						<option value="<?php echo $array['sl_no'];?>"> <?php if($array['sl_no']){echo $array['short_name'];}?></option>
						<?php
							$sql="select * FROM department WHERE status = '" . 'Active' . "' and short_name != '$array[short_name]'";
							$result=mysql_query($sql);
							while ($array_dept=mysql_fetch_array($result))
							{?>	
								<option value="<?php echo $array_dept['sl_no'];?>"> <?php echo $array_dept['short_name']; ?></option>
					<?php	}?>
					</select> 
				</p> <br/>
				
				<p style='margin-left:44px;'>status:
					<select name="status" style='padding-left:5px; padding-top:2px; height:25px; width:300px;'>
						<option value="Active" <?php if($array['sc_status']=='Active'){echo "selected";}?>>Active</option>
						<option value="Inactive" <?php if($array['sc_status']=='Inactive'){echo "selected";}?>>Inactive</option>
					</select></p><br/>
					
					<input type="submit" name="submit" value="submit"  style='float:right; margin-right:11px;'>
			</form>									
		</div>	
	</div>	

	<div id="body-right"></div>
<?php
include("../include/admin_footer.php");
?>

<script>
	$(document).ready(function(){
		
		$('#back_button').click(function()
		{
			window.location.replace("landing_page_result.php");
		});
	});
</script>