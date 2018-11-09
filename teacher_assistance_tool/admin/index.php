<?php
include("../include/function.php");
include("../include/admin_header.php");

if(isset($_REQUEST['submit']))
{
	$err="";
	
	if($_REQUEST['username']=="" || $_REQUEST['password']=="")
			$err="Please provide both Username and Password";
	else
	{
		$sql="select * from admin where user_name ='$_REQUEST[username]' and password ='$_REQUEST[password]'";
		$result = mysql_query($sql);
		
		if(mysql_num_rows($result)<=0)
				$err="Invalid Username and/or Password Provided";
		else
		{      
			$_SESSION['USERNAME']=$_REQUEST['username'];
			$_SESSION['PASSWORD']=$_REQUEST['password'];
			$array=mysql_fetch_array($result);                         
			redirect("landing_page.php");
		}
	}
}

if(isset($_REQUEST['action'])=='logout')
{
	unset($_SESSION['USERNAME']);
	unset($_SESSION['PASSWORD']);  
	redirect("index.php");exit();
}
?>	

<div class="body">
	<div id="body-left"></div>		
	
	<div id="body-middle" >	
		<div id="index" >
			<table  cellpadding="0" cellspacing="0" border="2px solid red;"  style="">
				<tr>
					<form action="index.php" method="post">
						<td align="center" >
							<table width="40%" cellpadding="0" cellspacing="0" border="0" style="border:none">
								<tr>
									<td colspan="2"  style="text-align:center; padding-top:5px;">
										<h3>Admin Login</h3>
									</td>
								</tr>
								<tr>
									<td colspan="2" >
										<font color="red"><?php  if((isset($err))) echo $err; ?></font>
									</td>
								</tr>
								<tr>
									<td colspan="2" bgcolor="#efefef">
										&nbsp
									</td>
								</tr>
								<tr>
									<td bgcolor="#dddddd" width="30%"  align="center">
										<b>Username</b>
									</td>
									<td bgcolor="efefef">
										<input type="text" name="username" size="30" value="">
									</td>
								</tr>
								<tr bgcolor="red">
									<td bgcolor="#dddddd" width="30%"  align="center" style="padding-top:15px;">
										<b>Password</b>
									</td>
									<td bgcolor="efefef" style="padding-top:15px;">
										<input type="password" name="password" size="30" value="" >
									</td>
								</tr>
								<tr>
									<td colspan="2" bgcolor="#efefef" style="padding-left:240px; padding-top:15px; padding-bottom:5px;">
										<input type="submit" name="submit" value="Submit" style="margin-right:20px;">
									</td>
								</tr>
							</table>
						</td>
					</form>
				</tr>
			</table>
		</div>
	</div>
		
	<div id="body-right"></div>

<?php
include("../include/admin_footer.php");
?>