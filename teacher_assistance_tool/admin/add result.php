<?php
include("../include/function.php");
include("../include/admin_header.php");

if(isset($_REQUEST['submit']))
{						
	$sql="insert result set
		reg_number=trim('$_REQUEST[reg_number]'),
		course_id='$_REQUEST[course_id]',
		attendence='$_REQUEST[attendence]',
		tutorial='$_REQUEST[tutorial]',
		viva_presentation='$_REQUEST[viva_presentation]',
		mid_term='$_REQUEST[mid_term]',
		sem_final='$_REQUEST[sem_final]',
		remark='$_REQUEST[remark]',
		status='$_REQUEST[status]'";

		mysql_query($sql);
		redirect("result.php");
}
?>

	<div class="body">
		<div id="body-left"></div>
		
		<div id="body-middle">
			
			<div id="add_result">	
				
				<center>
					
					<h3> Add Result</h3>
					
					<form action="add result.php"  style="margin-top:10px;"><br/>
						
						<p style='margin-left:11px;'>Student ID:
						
						<input type="text" name="reg_number" value="" style='width:120px;'></p><br/>
						
						<p style='margin-left:2px;'>Course Title:
							<select name="course_id" style='padding-left:20px; padding-top:4px; margin-left:0px; width:123px;'><br/>
								<option value="">--Sellect--</option>
								<?php
								 
									  $sql="select * from course";
									  $result=mysql_query($sql);
									 
									 while ($array=mysql_fetch_array($result))
									{ ?>	
										<option value="<?php echo $array['id'];?>"><?php echo $array['course_title'];?></option> <?php 
									} ?>
							</select>
						</p><br/>
						
						<p style='margin-left:08px;'>Attendence:
							<input type="text" name="attendence" value="" style='width:120px;'>
						</p><br/>
						
						<p style='margin-left:30px;'>Tutorial:
							<input type="text" name="tutorial" value="" style='width:120px;'>
						</p><br/>
						
						<p style='margin-left:5px;'>Pres.&/viva:
							<input type="text" name="viva_presentation" value="" style='width:120px;'>
						</p><br/>
						
						<p style='margin-left:25px;'>Midterm:
							<input type="text" name="mid_term" value="" style='width:120px;'>
						</p><br/>
						
						<p style='margin-left:10px;'>Semi.Final:
							<input type="text" name="sem_final" value="" style='width:120px;'>
						</p><br/>
						
						<p style='margin-left:23px;'>Remarks:
							<input type="text" name="remark" value="" style='width:120px;'>
						</p><br/>
						
						<p style='margin-left:40px;'>Status:
							<select name="status" style='padding-left:30px; padding-top:4px; margin-left:0px; width:125px;'>
								<option value="Active">Active</option>
								<option value="Inactive">Inactive</option>
							</select>
						</p><br/>

						<a href="result.php" style="text-decoration:none; margin-left:33px; fond-weight:bold;">back</a>
						<input type="submit" name="submit" value="submit" style='margin-left:90px;' >	
					</form>		
				</center>
			</div>		
		</div>
		
		<div id="body-right"></div>
		
	</div>
			
<?php
include("../include/admin_footer.php");
?>