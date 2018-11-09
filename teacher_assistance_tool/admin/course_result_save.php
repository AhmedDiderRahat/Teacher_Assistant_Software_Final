<?php 
include("../include/config.php");
include("../include/user_function.php");

function fetch_data()
{
	$ssn_crs_id = $_GET['id'];
	$sql="SELECT * FROM students sd, results rs WHERE sd.std_id = rs.std_id and rs.ssn_crs_id='$ssn_crs_id' ORDER BY sd.std_reg";
	$result=mysql_query($sql);
	$output = ''; 
	$marks = 0.0;
	while($array=mysql_fetch_array($result))  
    {
		$marks=$array["attendance"]+$array["class_test"]+$array["viva_presentation"]+$array["mid_sem"]+$array["final_sem"];
		$output .= '<tr>  
			<td>'.$array["std_reg"].'</td>  
			<td>'.$array["std_name"].'</td>  
			<td>'.$array["attendance"].'</td>  
			<td>'.$array["class_test"].'</td>  
			<td>'.$array["viva_presentation"].'</td>  
			<td>'.$array["mid_sem"].'</td>  
			<td>'.$array["final_sem"].'</td>  
			<td>'. $marks .'</td>  
			<td>'. grade_point_calculator($marks) .'</td>  
			<td>'. grade_letter_calculator_modify($marks).'</td>  
			<td>'.$array["remarks"].'</td>  
		</tr>  ';  
    }  
    return $output; 	
}

function header_creation()
{	
	$ssn_crs_id = $_GET['id'];
	$output = ''; 
	$session_name = '';
	$dept_name = '';
	$course_code = '';
	$course_title = '';
	$credit= 0.0;
	$teacher= '';
	
	$sql="SELECT full_name FROM admin";
	$result=mysql_query($sql);
	while($array=mysql_fetch_array($result))  
    {
		$teacher = $array['full_name'];
	}
	
	$sql="SELECT * FROM courses cr, session sn, session_courses sc, department dt WHERE cr.crs_id = sc.crs_id and dt.sl_no = sc.sl_no and sc.ssn_crs_id='$ssn_crs_id'";
	$result=mysql_query($sql);
	while ($array=mysql_fetch_array($result))
	{
		$session_name = $array['semester'] . "'" . substr($array['year'], 2, 2);
		$dept_name = $array['dept_name'] . '('. $array['short_name'] . ')';
		$course_title = $array['crs_title'];
		$course_code = $array['crs_code'];
		$credit=$array['crs_credit'];
	}

	$output .=  '<table border="1" cellspacing="0" cellpadding="5">
					<tr>
						<td width="20%"> <b>Session: </b>' .  $session_name  . '</td>
						<td width="41%"> <b>Department: </b>' .  $dept_name . '</td>
						<td width="39%"> <b>Course Teacher: </b>' .  $teacher  . '</td>
						
					</tr>
					
					<tr>
						<td width="20%"> <b>Course Code: </b>' .  $course_code  . '</td>
						<td width="41%"> <b>Course Title: </b>' .  $course_title  . '</td>
						<td width="11%"> <b>Credit: </b>' .  $credit  . '</td>
						<td width="15%"> <b>Sign: </b>' .  ''  . '</td>
						<td width="13%"> <b>Date: </b>' . ''  . '</td>
					</tr>
				</table> <p></p>';
	return $output;
}

if(isset($_POST["create_pdf"]))  
{
	require_once('../tcpdf/tcpdf.php'); 
	$name = rand(10,999999999);
	$name = 'result_sheet_' . $name . '.pdf';
	$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
	$obj_pdf->SetCreator(PDF_CREATOR);  
	$obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
	$obj_pdf->SetHeaderData('', '', '', PDF_HEADER_STRING);
	$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	$obj_pdf->SetDefaultMonospacedFont('helvetica');  
	$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
	$obj_pdf->setPrintHeader(true);  
	$obj_pdf->setPrintFooter(false);  
	$obj_pdf->SetAutoPageBreak(TRUE, 10);  
	$obj_pdf->SetFont('helvetica', '', 12);  
	$obj_pdf->AddPage('L');  
	$content = '';  
	$content .= '  
	<h3 align="center">Result Sheet</h3><br/>';
	
	$content .= header_creation();
	
	$content .= ' 
		<table border="1" cellspacing="0" cellpadding="5" style="text-align:center;">  
			<tr>  
				<th width="13%">ID</th>  
				<th width="22%">Name</th>  
				<th width="6%">Att. (10)</th>  
				<th width="6%">CT (10)</th>  
				<th width="%9">Viva / Pres. (10)</th>  
				<th width="%6">Mid (30)</th>  
				<th width="%7">Final (40)</th>  
				<th width="%8">Total (100)</th>  
				<th width="%7">G.P.</th>  
				<th width="%6">L.G.</th>  
				<th width="10%">Remarks</th>  
			</tr> ';  
			
	$content .= fetch_data();
	$content .= '</table>';
	$obj_pdf->writeHTML($content);  
	$obj_pdf->Output($name, 'I');  
}
?>
