<?php
//fetch.php
include("../include/config.php");
$ssn_crs_id = $_GET['var'];
$sql="SELECT * FROM students sd, results rs WHERE sd.std_id = rs.std_id and rs.ssn_crs_id='$ssn_crs_id' ORDER BY sd.std_reg";
$result=mysql_query($sql);

$total_marks = 0.0;

function grade_point_calculator($marks)
{
	if($marks>=0 and $marks<=39) return "0.00";
	else if($marks>=40 and $marks<=44) return "2.00";
	else if($marks>=45 and $marks<=49)return "2.25";
	else if($marks>=50 and $marks<=54)return "2.50";
	else if($marks>=55 and $marks<=59)return "2.75";
	else if($marks>=60 and $marks<=64)return "3.00";
	else if($marks>=65 and $marks<=69)return "3.25";
	else if($marks>=70 and $marks<=74)return "3.50";
	else if($marks>=75 and $marks<=79)return "3.75";
	else if($marks>=80 and $marks<=100)return "4.00";
	return "N/A";
}

function letter_grade_calculator($marks)
{
	if($marks>=0 and $marks<=39) return "F";
	else if($marks>=40 and $marks<=44) return "C-";
	else if($marks>=45 and $marks<=49)return "C";
	else if($marks>=50 and $marks<=54)return "C+";
	else if($marks>=55 and $marks<=59)return "B-";
	else if($marks>=60 and $marks<=64)return "B";
	else if($marks>=65 and $marks<=69)return "B+";
	else if($marks>=70 and $marks<=74)return "A-";
	else if($marks>=75 and $marks<=79)return "A";
	else if($marks>=80 and $marks<=100)return "A+";
	return "N/A";
}
?>

<table align="center" border='0px' cellspacing='1' cellpadding='2'  style='width:880px; margin-top:15px; auto; border:2px;text-align:center;'>					
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
		<th style="width:100px">Action</th>
	</tr>

			
<?php				
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
			<?php echo grade_point_calculator($total_marks) ?>
		</td>
		<td>
			<?php echo letter_grade_calculator($total_marks) ?>
		</td>
		<td>
			<?php echo $array['remarks']?>
		</td>
		
		<td style="">   		
			<a href="course_result.php?rsl_id=<?php echo $array['rsl_id'];?>&ssn_crs_id=<?php echo $ssn_crs_id;?>&action=edit" style="width:40px; background: white; float:left;margin-left:5px; border-radius: 0px;">Edit </a>
			
			<a href="course_result.php?rsl_id=<?php echo $array['rsl_id'];?>&ssn_crs_id=<?php echo $ssn_crs_id;?>&action=delete" style="width:45px; background: white; float:left;margin-left:5px; border-radius: 0px;">Delete </a>
		</td>
	</tr> 

<?php } ?>

</table>