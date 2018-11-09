<?php
include("../include/function.php");
include("../include/admin_header.php");

$array_edit = array (
	'std_id' => '',
	'std_reg' => '',
	'attendance' => '',
	'class_test' => '',
	'viva_pres' => '',
	'mid_sem' => '',
	'final_sem' => '',
	'remarks' => ''
);
$rsl_id='';
$std_id='';
$std_reg='';
$attendance ='';
$class_test = '';
$viva_pres ='';
$mid_sem = '';
$final_sem = '';
$remarks = '';
$marks='';
$rootPage='';
if($_REQUEST['action']=='delete')
{
	$sql="delete from results where rsl_id='$_REQUEST[rsl_id]'";		
	mysql_query($sql);
	$ssn_crs_id = $_REQUEST['ssn_crs_id'];
}
elseif($_REQUEST['action']=='edit')
{
	$ssn_crs_id = $_REQUEST['ssn_crs_id'];
	$rsl_id = $_REQUEST['rsl_id'];
	
	$sql="SELECT * FROM students std, results rs WHERE std.std_id = rs.std_id AND rs.rsl_id='$rsl_id'";
	$result=mysql_query($sql);
	while ($array_edit=mysql_fetch_array($result))
	{
		$std_id=$array_edit['std_id'];
		$std_reg=$array_edit['std_reg'];
		$attendance = $array_edit['attendance'];
		$class_test = $array_edit['class_test'];
		$viva_pres = $array_edit['viva_presentation'];
		$mid_sem = $array_edit['mid_sem'];
		$final_sem = $array_edit['final_sem'];
		$remarks = $array_edit['remarks'];
		$marks = $attendance+$class_test+$viva_pres+$mid_sem+$final_sem;
	}
}
elseif($_REQUEST['action']=='view'){
	$ssn_crs_id = $_REQUEST['id'];
	$rootPage = 'view_session_course';
}
else{
	$ssn_crs_id = $_REQUEST['id'];
	$rootPage = 'landing_page_result';
}

$ssn_name = "";
$dept_name = "";
$course_name = "";

?>

<style>  
	   ul{  
			background-color:green;  
			cursor:pointer;  
	   }  
	   li{  
			padding:12px;  
	   }  
</style>

<div class="body">

	<div style = "height:560px; width:25px; background:#585858; float:left"></div>
		
	<div style = "height:560px; width:900px; background:#ebeee5; float:left">
	
		<div style="height:25px; width:900px; padding-top:5px; margin-bottom:5px">	

			<input type="button" name="back_button" id="back_button"  value="Back" class="btn btn-info" style="float:left; height:25px; width:60px; margin-left:5px; margin-top:0px; margin-bottom:0px;" />		
			
			<h4 style='text-align:center; margin-bottom:0px;'>
				
				<?php
					$sql="SELECT * FROM courses cr, session sn, session_courses sc, department dt WHERE cr.crs_id = sc.crs_id and dt.sl_no = sc.sl_no and sn.ssn_id = sc.ssn_id and sc.ssn_crs_id='$ssn_crs_id'";
					$result=mysql_query($sql);
					while ($array=mysql_fetch_array($result))
					{
						$ssn_name = $array['semester'] . "'" . substr($array['year'], 2, 2);
						//echo $array['year'] . '<br/>';
						$dept_name = $array['short_name'];
						$course_name = $array['crs_title'] . "  (" . $array['crs_code'] . ")";
					}
				
					echo "|| Session: " . $ssn_name . " || Department: " . $dept_name . " || Course: " . $course_name . " ||";
				?>
			</h4>
		</div>
		
		<form name="add_tweet" method="post" style="height:150px;border:2px blue solid; margin:2px 2px 2px 2px; padding:2px 2px 2px 2px;" >
			<h3 align="center" style="padding-bottom:5px;">Input Panel</h3>
			
			<div style="width:200px; height:110px; float:left; border:0px red solid;">
				Student ID:
				<input type="text" name="std_id" id="std_id" value="<?php if($_REQUEST['action']=='edit'){echo $std_reg;}?>" class="form-control"/> 
				<p id="std_id_list" style="height:80px;overflow:auto"> </p>
			</div>
			
			<div class="form-group" style="float:left; width:680px; border:0px green solid;">
				<table style="width:680px;">	
					<tr>
						<td> Attendance: </td> 
						<td> <input type="text" name="attendance" id="attendance" value="<?php if($_REQUEST['action']=='edit'){echo $attendance;}?>" class="form-control"/> </td>
						<td>Class Test:</td>
						<td> <input type="text" name="class_test" id="class_test" value="<?php if($_REQUEST['action']=='edit'){echo $class_test;}?>" class="form-control"/> </td>
							
					</tr>
					
					<tr>
						<td>Viva/Presentation:</td>
						<td> <input type="text" name="viva_pres" id="viva_pres" value="<?php if($_REQUEST['action']=='edit'){echo $viva_pres;}?>" class="form-control"/> </td>	
						<td>Mid Semester:</td>
						<td> <input type="text" name="mid_sem" id="mid_sem" value="<?php if($_REQUEST['action']=='edit'){echo $mid_sem;}?>" class="form-control"/></td>
					</tr>
					<tr>
						<td>Semester Final:</td>
						<td> <input type="text" name="final_sem" id="final_sem" value="<?php if($_REQUEST['action']=='edit'){echo $final_sem;}?>" class="form-control"/> </td>
						<td>Remarks:</td>
						<td> <input type="text" name="remarks" id="remarks" value="<?php if($_REQUEST['action']=='edit'){echo $remarks;}?>" class="form-control"/> </td>
					</tr>
					<tr> <?php 
						if($_REQUEST['action']=='edit')
						{ ?>
							<td> <input type="button" name="edit_button" id="edit_button"  value="Edit" class="btn btn-info" /> </td>
							<td> <h4>Total Marks: <?php  echo $marks; ?> </h4> </td> <?php 	
						} 
						else 
						{ ?>
							<td> <input type="button" name="add_button" id="add_button"  value="ADD" class="btn btn-info" /> </td> <?php 
						} ?>
					</tr>
				</table>
			</div>
		</form>
		
		<div id="load_result" style="height:335px; border:0px red solid; overflow:auto;"> </div>
		
		<div  id="editor" align="center" style="margin-top:5px; background:#ffcccc;">
			<form action="course_result_save.php?id=<?php echo $ssn_crs_id?>&action=add" method="post">  
				<input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
			</form> 
		</div>
	</div>
	<div style ="height:560px; width:25px; background:#585858; float:left"></div>	
</div>		
<?php
include("../include/admin_footer.php");
?>

<script>

	$(document).ready(function(){
		$('#std_id').keyup(function(){
			var query = $(this).val();
			if($.trim(query) != '')
			{
				$.ajax({
					url:"search_id.php",
					method:"POST",
					data:{query:query},
					success:function(data)
					{
						$('#std_id_list').fadeIn();
						$('#std_id_list').html(data);
					}
				});
			}
		});
		
		$(document).on('click', 'li', function(){
			$('#std_id').val($(this).text());
			$('#std_id_list').fadeOut();
		});
		
		$('#add_button').click(function(){
			var std_id_data = $('#std_id').val();
			var attendance_data = $('#attendance').val();
			var class_test_data = $('#class_test').val();
			var viva_pres_data = $('#viva_pres').val();
			var mid_sem_data = $('#mid_sem').val();
			var final_sem_data = $('#final_sem').val();
			var remarks_data = $('#remarks').val();
			var ssn_id_data = "<?php echo $ssn_crs_id; ?>";
			
			if($.trim(std_id_data) != '' && $.trim(attendance_data) != '' && $.trim(class_test_data) != '' && $.trim(viva_pres_data) != '' && $.trim(mid_sem_data) != '' && $.trim(final_sem_data) != '')
			{
				$.ajax({
					url:"course_result_insert.php",
					method:"POST",
					data:{ssn_crs_id:ssn_id_data,std_id:std_id_data,attendance:attendance_data,class_test:class_test_data,viva_pres:viva_pres_data,mid_sem:mid_sem_data,final_sem:final_sem_data,remarks:remarks_data},
					dataType:"text",
					success:function(data)
					{
						$('#std_id').val("");
						$('#attendance').val("");
						$('#class_test').val("");
						$('#viva_pres').val("");
						$('#mid_sem').val("");
						$('#final_sem').val("");
						$('#remarks').val("");
					}
				});
			}
			else{
				alert("Error..!!!")
			}
		});
		
		$('#back_button').click(function()
		{
			var ssn_id_data = "<?php echo $ssn_crs_id; ?>";
			var rootPage_data =  "<?php echo $rootPage; ?>";
			if(rootPage_data=='landing_page_result')
				window.location.replace("landing_page_result.php");
			else
				window.location.replace("view_session_course.php?id=<?php echo $ssn_crs_id; ?>&action=add");
		});
		
		$('#edit_button').click(function(){
			var rsl_id_data = "<?php echo $rsl_id; ?>";
			var std_id_data = $('#std_id').val();
			var attendance_data = $('#attendance').val();
			var class_test_data = $('#class_test').val();
			var viva_pres_data = $('#viva_pres').val();
			var mid_sem_data = $('#mid_sem').val();
			var final_sem_data = $('#final_sem').val();
			var remarks_data = $('#remarks').val();
			var ssn_id_data = "<?php echo $ssn_crs_id; ?>";	
			
			if($.trim(std_id_data) != '' && $.trim(attendance_data) != '' && $.trim(class_test_data) != '' && $.trim(viva_pres_data) != '' && $.trim(mid_sem_data) != '' && $.trim(final_sem_data) != '')
			{
				$.ajax({
					url:"course_result_update.php",
					method:"POST",
					data:{rsl_id:rsl_id_data,ssn_crs_id:ssn_id_data,std_id:std_id_data,attendance:attendance_data,class_test:class_test_data,viva_pres:viva_pres_data,mid_sem:mid_sem_data,final_sem:final_sem_data,remarks:remarks_data},
					dataType:"text",
					success:function(data)
					{
						$('#std_id').val("");
						$('#attendance').val("");
						$('#class_test').val("");
						$('#viva_pres').val("");
						$('#mid_sem').val("");
						$('#final_sem').val("");
						$('#remarks').val("");
						window.location.replace("course_result.php?id=<?php echo $ssn_crs_id;?>&action=add");
					}
				});
			}
			else{
				alert("Error..!!!")
			}
		});

		setInterval(function(){//setInterval() method execute on every interval until called clearInterval()
			$('#load_result').load("course_result_fetch.php?var=<?php echo $ssn_crs_id; ?>").fadeIn("slow");
			//load() method fetch data from fetch.php page
		}, 1000);
	});
	
</script>