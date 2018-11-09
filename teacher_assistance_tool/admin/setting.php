<?php
include("../include/function.php");
include("../include/admin_header.php");

if(isset($_REQUEST['submit']))
{
	$sql="update admin set
		user_name='$_REQUEST[user_name]',
		full_name='$_REQUEST[full_name]',
		dept_name='$_REQUEST[dept_name]',
		address='$_REQUEST[address]',
		email='$_REQUEST[email]',
		mobile='$_REQUEST[mobile]',
		password='$_REQUEST[password]'
		where ad_id='1'";		

		mysql_query($sql);
	
		redirect("index.php?action=logout");
}

$sql="select * from admin where ad_id='1'";
$result=mysql_query($sql);
$array=mysql_fetch_array($result);

?>

<div class="body">
	
	<div id="body-left"></div>
	
	<div id="body-middle">
		
		<div id="view_session">
			<div style="height:40px; width:120px;float:center; background:#ac5353;margin-top:10px;">
				<input type="button" name="back_button" id="back_button"  value="Back" class="btn btn-info" style="height:30px; width:100px; margin-left:10px; margin-top:5px;" />		
			</div>				
		</div>
		
		<div style='height:430px; width:450px; margin-top: 30px; background:white;'>
	
			<h2 style="color:green; text-align:center; margin-top:50px; padding-top:5px;">
				Admin Setting
			</h2>
			
			<form action="setting.php" method='post'>
				
				<p style='margin-left:30px; padding-top:20px;'>User Name:
					<input style="width:300px; height:25px;  padding-left:5px;" type="text" name="user_name" value="<?php if($array['user_name']){echo $array['user_name'];}?>">
				</p><br/>
				
				<p style='margin-left:38px;'>Full Name:
					<input style='width:300px; height:25px; padding-left:5px;' type="text" name="full_name" value="<?php if($array['full_name']){echo $array['full_name'];}?>">
				</p><br/>
				
				<p style='margin-left:30px;'>Department:
					<input style='width:300px; height:25px; padding-left:5px;' type="text" name="dept_name" value="<?php if($array['dept_name']){echo $array['dept_name'];}?>">
				</p><br/>
				
				<p style='margin-left:53px;'>Address:
					<input style='width:300px; height:25px; padding-left:5px;' type="text" name="address" value="<?php if($array['address']){echo $array['address'];}?>">
				</p><br/>
				
				<p style='margin-left:59px;'>Mobile:
					<input style='width:300px; height:25px; padding-left:5px;' type="text" name="mobile" value="<?php if($array['mobile']){echo $array['mobile'];}?>">
				</p><br/>
				
				<p style='margin-left:66px;'>Email:
					<input style='width:300px; height:25px; padding-left:5px;' type="text" name="email" value="<?php if($array['email']){echo $array['email'];}?>">
				</p><br/>
				
				<p style='margin-left:42px;'>Password:
				<input style='width:300px; height:25px; padding-left:5px;' type="password" name="password" value="<?php if($array['password']){echo $array['password'];}?>">
				</p><br/>
							
				<input type="submit" name="submit" value="submit"  style='margin-left:366px;'>
			</form>									
		</div>	
	</div>	
	
	<div id="body-right"></div>
				
<?php
include("../include/admin_footer.php");
?>

<script>
	$(document).ready(function()
	{
		$('#back_button').click(function()
		{
			window.location.replace("student.php");	
		});
	});
</script>