<?php
include("../include/function.php");
include("../include/admin_header.php");
include("../include/user_function.php");

if(isset($_REQUEST['submit']))
{	
 	$sql="update courses set
			crs_code='$_REQUEST[course_code]',
			crs_title='$_REQUEST[course_title]',
			crs_credit='$_REQUEST[credit]',
			status='$_REQUEST[status]'
		where crs_id='$_REQUEST[id]'";		
	mysql_query($sql);						
	redirect("courses.php");
}
        $sql="select * from courses where crs_id='$_REQUEST[id]'";
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
				Edit Course
			</h2>
			<form action="edit_course.php?id=<?php echo $_REQUEST['id']?>" method='post'>
				
				<p style='margin-left:30px; padding-top:20px;'>course code:
				<input style="width:230px; height:25px;  padding-left:5px;" type="text" name="course_code" value="<?php if($array['crs_code']){echo $array['crs_code'];}?>"></p><br/>
				
				<p style='margin-left:35px;'>course title:
				<input style='width:230px; height:25px; padding-left:5px;' type="text" name="course_title" value="<?php if($array['crs_title']){echo $array['crs_title'];}?>"></p><br/>
				
				<p style="margin-left:69px;">credit:
					<select name="credit" style='padding-left:5px; padding-top:2px; height:25px; width:239px; margin-left:0px;'>
						<option value="1.00" <?php if($array['crs_credit']=='1.00'){echo "selected";}?>>1.00</option>
						<option value="1.50" <?php if($array['crs_credit']=='1.50'){echo "selected";}?>>1.50</option>
						<option value="2.00" <?php if($array['crs_credit']=='2.00'){echo "selected";}?>>2.00</option>
						<option value="3.00" <?php if($array['crs_credit']=='3.00'){echo "selected";}?>>3.00</option>
						<option value="4.00" <?php if($array['crs_credit']=='4.00'){echo "selected";}?>>4.00</option>
					</select>
				</p><br/>

				<p style='margin-left:69px;'>status:
					<select name="status" style='padding-left:5px; padding-top:2px; height:25px; width:239px;'>
						<option value="Active" <?php if($array['status']=='Active'){echo "selected";}?>>Active</option>
						<option value="Inactive" <?php if($array['status']=='Inactive'){echo "selected";}?>>Inactive</option>
					</select>
				</p><br/>
				<input type="submit" name="submit" value="submit"  style='float:right; margin-right:47px;'>
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
			window.location.replace("courses.php");
		});
	});
</script>