<?php
include("../include/function.php");
include("../include/admin_header.php");

if(isset($_REQUEST['submit']))
{	
 	$sql="update department set
			dept_code='$_REQUEST[dept_code]',
			dept_name='$_REQUEST[dept_name]',
			short_name='$_REQUEST[short_name]',
			status='$_REQUEST[status]'
		where sl_no ='$_REQUEST[id]'";		
	mysql_query($sql);						
	redirect("department.php");
}

$sql="select * from department where sl_no='$_REQUEST[id]'";
$result=mysql_query($sql);
$array=mysql_fetch_array($result);

?>

<div class="body">
	
	<div id="body-left"></div>
	
	<div id="body-middle">
		
		<div style='height:300px; width:400px; margin-top: 80px; background:white;'>
			<h2 style="color:green; text-align:center; padding-top:5px;">
				Edit Department
			</h2>
			
			<form action="edit_department.php?id=<?php echo $_REQUEST['id']?>" method='post'>
					
				<p style='margin-left:25px; padding-top:20px;'>Department Code:
					<input style="width:230px; height:25px;  padding-left:5px;" type="text" name="dept_code" value="<?php if($array['dept_code']){echo $array['dept_code'];}?>">
				</p><br/>
				
				<p style='margin-left:20px;'>Department Name:
					<input style='width:230px; height:25px; padding-left:5px;' type="text" name="dept_name" value="<?php if($array['dept_name']){echo $array['dept_name'];}?>">
				</p><br/>
				
				<p style='margin-left:65px;'>Short Form:
					<input style='width:230px; height:25px; padding-left:5px;' type="text" name="short_name" value="<?php if($array['short_name']){echo $array['short_name'];}?>">
				</p><br/>
				
				<p style='margin-left:99px;'>Status:
					<select name="status" style='padding-left:5px; padding-top:2px; height:25px; width:239px;'>
						<option value="Active" <?php if($array['status']=='Active'){echo "selected";}?>>Active</option>
						<option value="Inactive" <?php if($array['status']=='Inactive'){echo "selected";}?>>Inactive</option>
					</select>
				</p><br/>
					
				<h5 style = 'float:left; background:#3498DB; padding:2px 10px 2px 10px; margin-left:113px;'><a href="department.php" style='text-decoration:none; color:black'>Back</a>
				</h5>
					
				<input type="submit" name="submit" value="submit"  style='margin-left:136px;'>
			</form>									
		</div>	
	</div>	
	
	<div id="body-right"></div>
						
<?php
include("../include/admin_footer.php");
?>