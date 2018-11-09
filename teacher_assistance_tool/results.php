<?php
include("include/function.php");
include("include/header.php");
include("include/user_function.php");

?>

<div class="body">
	
	<div style = "height:560px; width:25px; background:#585858; float:left"></div>
			
	<div style = "height:560px; width:900px; background:#ebeee5; float:left">
	
		<div align="" style="margin-top:10px;">
			<input type="button" name="back_button" id="back_button"  value="Back" class="btn btn-info" style="float:left; height:25px; width:60px; margin-left:15px; margin-top:0px; margin-bottom:0px;" />	
			
			<h4 style='text-align:center; margin-bottom:0px;'>
				
				<?php
					$sql="SELECT * FROM courses cr, session sn, session_courses sc, department dt WHERE cr.crs_id = sc.crs_id and dt.sl_no = sc.sl_no and sn.ssn_id = sc.ssn_id and sc.ssn_crs_id='$_REQUEST[id]'";
					$result=mysql_query($sql);
					while ($array=mysql_fetch_array($result))
					{
						$ssn_name = $array['semester'] . "'" . substr($array['year'], 2, 2);
						$dept_name = $array['short_name'];
						$course_name = $array['crs_title'] . "  (" . $array['crs_code'] . ")";
					}
				
					echo "|| Session: " . $ssn_name . " || Department: " . $dept_name . " || Course: " . $course_name . " ||";
				?>
			</h4>
		</div>
		
		<div id="course" style="height:430px;  width:895px; overflow:auto; margin-top:20px; border:0px red solid;">
			<table align="center" border='0px' cellspacing='1' cellpadding='2'  style='width:880px; margin-top:0px; auto; border:2px;text-align:center;'>					
				<tr bgcolor='#aaa'>
					<th style="height:30px" colspan='12'>Result Sheet</th>
				</tr>
					
				<tr bgcolor='#ddd'>
					<th style="">ID No.</th>
					<th>Name</th>
					<th style=""> Att.(10)</th>
					<th style="">CT(10)</th>
					<th style="">Viva / Pres.</th>
					<th style="">Mid</th>
					<th style="">Final</th>
					<th style="">Total</th>
					<th style="">GP</th>
					<th style="">LG</th>
					<th style="">Remarks</th>
				</tr>

						
				<?php				
					$sql="SELECT * FROM students sd, results rs WHERE sd.std_id = rs.std_id and rs.ssn_crs_id='$_REQUEST[id]' ORDER BY sd.std_reg";
					
					$result=mysql_query($sql);

					$total_marks = 0.0;
					
					while ($array=mysql_fetch_array($result)) 
					{ ?>
						<tr bgcolor='#aaa'>
							<td> 	
								<?php echo $array['std_reg'];?>
							</td>					
							<td>
								<?php echo $array['std_name'];?>
							</td>
							<td>
								<?php         
									echo $array['attendance'];
								?>
							</td>
							<td>
								<?php
									echo $array['class_test'];
								?>
							</td>
							<td>
								<?php echo $array['viva_presentation']; ?>
							</td>
							<td>
								<?php echo $array['mid_sem']; ?>
							</td>
							<td>
								<?php echo $array['final_sem']; ?>
							</td>
							<td>
								<?php $total_marks = $array['attendance']+$array['class_test']+$array['viva_presentation']+$array['mid_sem']+$array['final_sem'];
								echo $total_marks;
								?>
							</td>
							<td>
								<?php echo  grade_point_calculator($total_marks) ?>
							</td>
							<td>
								<?php echo grade_letter_calculator_modify($total_marks); ?>
							</td>
							<td>
								<?php echo $array['remarks']?>
							</td>
					</tr> <?php 
					} ?>
			</table>			
		</div>	
		<div align="center" style="height:30px; width:900px; background:#80aaff; border:0px red solid; margin-top:15px; padding-top:5px;">
			<form action="course_result_save.php?id=<?php echo $_REQUEST['id'];?>&action=add" method="post">  
                <input style="height:25px;" type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
            </form> 
		</div>
	</div>
	<div style ="height:560px; width:25px; background:#585858; float:left"></div>
</div>
						
<?php
include("include/footer.php");
?>

<script>
	$(document).ready(function()
	{
		$('#back_button').click(function()
		{
			window.location.replace("landing_page_result.php");	
		});
	});
</script>

