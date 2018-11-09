<?php
include("include/function.php");
include("include/header.php");
include("include/user_function.php");

$admin_name='';
$dept_name='';
$address='';
$mobile='';
$email=''; 
$number_of_course = '';
$number_of_student = '';
$number_of_result = 0;
$number_a_plus = 0;
$number_a = 0;
$number_a_minus = 0;
$number_b_plus = 0;
$number_b = 0;
$number_b_minus = 0;
$number_c_plus = 0;
$number_c = 0;
$number_d = 0;
$number_f = 0;

?>

<div class="body">

	<div id="body-left"></div>
	
	<div id="body-middle">
		
		<div id="course">
			<div Style="color:green;text-align:center;margin-bottom:20px; margin-top:10px;">
				<h2>Landing Page</h2>
			</div>
			<div style="height:340px; width:350px; border:0px solid red; float:left; margin-left:30px;">
				<table align="center" border='0px' cellspacing='1' cellpadding='2' style='margin-top:0 auto; width:350px; text-align:center;'>
									
					<tr bgcolor='#b2b266' style="height:35px;">
						<th colspan='8'>Personal Information</th>
					</tr>
					
					<?php
						$sql="SELECT * FROM admin";						
						$result=mysql_query($sql);
						while ($array=mysql_fetch_array($result))
						{ 
							$admin_name=$array['full_name'];
							$dept_name=$array['dept_name'];
							$address=$array['address'];
							$mobile=$array['mobile'];
							$email=$array['email'];  	
						} 	?>
				
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:left; padding-left:5px; width:80px;">Name</td>
						<td bgcolor='#ff8080' style="text-align:center; width:10px;">:</td>
						<td bgcolor='#ffb3b3' style="text-align:left; padding-left:10px;"> <?php echo $admin_name;?> </td>
					</tr>
					
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:left; padding-left:5px; width:80px;">Department</td>
						<td bgcolor='#ff8080' style="text-align:center; width:10px;">:</td>
						<td bgcolor='#ffb3b3' style="text-align:left; padding-left:10px;"> <?php echo $dept_name;?> </td>
					</tr>
					
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:left; padding-left:5px; width:80px;">Address</td>
						<td bgcolor='#ff8080' style="text-align:center; width:10px;">:</td>
						<td bgcolor='#ffb3b3' style="text-align:left; padding-left:10px;"> <?php echo $address;?> </td>
					</tr>
					
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:left; padding-left:5px; width:80px;">Mobile</td>
						<td bgcolor='#ff8080' style="text-align:center; width:10px;">:</td>
						<td bgcolor='#ffb3b3' style="text-align:left; padding-left:10px;"> <?php echo $mobile;?> </td>
					</tr>
					
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:left; padding-left:5px; width:80px;">Email</td>
						<td bgcolor='#ff8080' style="text-align:center; width:10px;">:</td>
						<td bgcolor='#ffb3b3' style="text-align:left; padding-left:10px;"> <?php echo $email;?> </td>
					</tr>  
				</table>
				
				
				<table align="center" border='0px' cellspacing='1' cellpadding='2' style='margin-top:41px; border:0px solid red; width:350px; text-align:center;'>
									
				<tr  bgcolor='#b2b266' style="height:35px;">
					<th colspan='8'>Academic Information</th>
				</tr>
				
				<?php
					$sql="SELECT * FROM admin";
					
					$result=mysql_query($sql);
				
					while ($array=mysql_fetch_array($result))
					{ 
						$admin_name=$array['full_name'];
						$dept_name=$array['dept_name'];
						$address=$array['address'];
						$mobile=$array['mobile'];
						$email=$array['email'];  	
					} 	
			
					$sql="SELECT COUNT(DISTINCT crs_id)  FROM session_courses";
					
					$result=mysql_query($sql);
				
					while ($array=mysql_fetch_array($result))
					{ 
						$number_of_course=$array['COUNT(DISTINCT crs_id)'];
					} 	
			
					$sql="SELECT COUNT(DISTINCT std_id)  FROM results";
					
					$result=mysql_query($sql);
				
					while ($array=mysql_fetch_array($result))
					{ 
						$number_of_student=$array['COUNT(DISTINCT std_id)']; 	
					}
					
					$sql="SELECT COUNT(std_id) FROM results";
					
					$result=mysql_query($sql);
					while ($array=mysql_fetch_array($result))
					{ 
						$number_of_result=$array['COUNT(std_id)']; 	
					} ?>
			
				<tr style="height:25px;">
					<td bgcolor='#ffb3b3' style="text-align:left; padding-left:20px; width:170px;">Number of Course Taken</td>
					<td bgcolor='#ff8080' style="text-align:center; width:10px;">:</td>
					<td bgcolor='#ffb3b3' style="text-align:left; padding-left:20px;"> <?php echo $number_of_course;?> </td>
				</tr>
				
				<tr style="height:25px;">
					<td bgcolor='#ffb3b3' style="text-align:left; padding-left:20px; width:170px;">Number of Student</td>
					<td bgcolor='#ff8080' style="text-align:center; width:10px;">:</td>
					<td bgcolor='#ffb3b3' style="text-align:left; padding-left:20px;"> <?php echo $number_of_student;?> </td>
				</tr>
				<tr style="height:25px;">
					<td bgcolor='#ffb3b3' style="text-align:left; padding-left:20px; width:170px;">Number of Result</td>
					<td bgcolor='#ff8080' style="text-align:center; width:10px;">:</td>
					<td bgcolor='#ffb3b3' style="text-align:left; padding-left:20px;"> <?php echo $number_of_result;?> </td>
				</tr>
			</table>
			
			</div>
			
			<div style="height:340px; width:270px; border:0px solid blue; float:left; margin-left:10px;">
				<table align="center" border='0px' cellspacing='1' cellpadding='2' style='margin-top:0px; border:0px solid red; width:250px; text-align:center;'>					
					<tr  bgcolor='#b2b266' style="height:35px;">
						<th colspan='4'>Grade wise Result</th>
					</tr>
					
					<?php
						$sql="SELECT * FROM results";
						
						$result=mysql_query($sql);
					
						while ($array=mysql_fetch_array($result))
						{ 
							$marks = $array['attendance'] + $array['class_test'] + $array['viva_presentation'] + $array['mid_sem'] +$array['final_sem'];

							if(grade_letter_calculator_modify($marks)=='A+')
								$number_a_plus++;
							elseif(grade_letter_calculator_modify($marks)=='A')
								$number_a++;
							elseif(grade_letter_calculator_modify($marks)=='A-')
								$number_a_minus++;
							elseif(grade_letter_calculator_modify($marks)=='B+')
								$number_b_plus++;
							elseif(grade_letter_calculator_modify($marks)=='B')
								$number_b++;
							elseif(grade_letter_calculator_modify($marks)=='B-')
								$number_b_minus++;
							elseif(grade_letter_calculator_modify($marks)=='C+')
								$number_c_plus++;
							elseif(grade_letter_calculator_modify($marks)=='C')
								$number_c++;
							elseif(grade_letter_calculator_modify($marks)=='D')
								$number_d++;
							elseif(grade_letter_calculator_modify($marks)=='F')
								$number_f++;
						} ?>
					
					<tr style="height:25px;">
						<td bgcolor='#ff8080' style="text-align:center; height:25px; width:50px;">Grade</td>
						<td bgcolor='#ff8080' style="text-align:center; height:25px; width:80px"> Students 
						Achieved </td>
						<td bgcolor='#ff8080' style="text-align:center; height:25px;"> Percentage </td>
					</tr>
					
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px; width:50px;">A+</td>
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px;"> <?php echo $number_a_plus;?> </td>
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px;"> <?php if($number_of_result==0) echo '0'; else echo round($number_a_plus/$number_of_result*100, 2) ;?> % </td>
					</tr>
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px; width:50px;">A</td>
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px;"> <?php echo $number_a;?> </td>
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px;"> <?php if($number_of_result==0) echo '0'; else echo round($number_a/$number_of_result*100, 2) ;?> % </td>
					</tr>
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px; width:50px;">A-</td>
						<td bgcolor='#ffb3b3' style="text-align:center;"> <?php echo $number_a_minus;?> </td>
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px;"> <?php if($number_of_result==0) echo '0'; else echo round($number_a_minus/$number_of_result*100, 2) ;?> % </td>
					</tr>
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px; width:50px;">B+</td>
						<td bgcolor='#ffb3b3' style="text-align:center;"> <?php echo $number_b_plus;?> </td>
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px;"> <?php if($number_of_result==0) echo '0'; else echo round($number_b_plus/$number_of_result*100, 2) ;?> % </td>
					</tr>
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px; width:50px;">B</td>
						<td bgcolor='#ffb3b3' style="text-align:center;"> <?php echo $number_b;?> </td>
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px;"> <?php if($number_of_result==0) echo '0'; else echo round($number_b/$number_of_result*100, 2) ;?> % </td>
					</tr>
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px; width:50px;">B-</td>
						<td bgcolor='#ffb3b3' style="text-align:center;"> <?php echo $number_b_minus;?> </td>
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px;"> <?php if($number_of_result==0) echo '0'; else echo round($number_b_minus/$number_of_result*100, 2) ;?> % </td>
					</tr>
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px; width:50px;">C+</td>
						<td bgcolor='#ffb3b3' style="text-align:center;"> <?php echo $number_c_plus;?> </td>
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px;"> <?php if($number_of_result==0) echo '0'; else echo round($number_c_plus/$number_of_result*100, 2) ;?> % </td>
					</tr>
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px; width:50px;">C</td>
						<td bgcolor='#ffb3b3' style="text-align:center;"> <?php echo $number_c;?> </td>
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px;"> <?php if($number_of_result==0) echo '0'; else echo round($number_c/$number_of_result*100, 2) ;?> % </td>
					</tr>
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px; width:50px;">D</td>
						<td bgcolor='#ffb3b3' style="text-align:center;"> <?php echo $number_d;?> </td>
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px;"> <?php if($number_of_result==0) echo '0'; else echo round($number_d/$number_of_result*100, 2) ;?> % </td>
					</tr>
					<tr style="height:25px;">
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px; width:50px;">F</td>
						<td bgcolor='#ffb3b3' style="text-align:center;"> <?php echo $number_f;?> </td>
						<td bgcolor='#ffb3b3' style="text-align:center; height:10px;"> <?php if($number_of_result==0) echo '0'; else echo round($number_f/$number_of_result*100, 2) ;?> % </td>
					</tr>
				</table>	
			</div>
		</div>
	</div>
	<div id="body-right"> </div>	
</div>
						
<?php
include("include/footer.php");
?>