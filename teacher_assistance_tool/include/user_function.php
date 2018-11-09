<?php
		function grade_letter_calculator($marks)
		{
		   //echo $marks;
		   switch ($marks){
			 case $marks>=80 && $marks <=100:
				echo "A+";
				break;
			  case $marks>=75 && $marks <=79:
				echo "A";
				break;
			 case $marks>=70 && $marks <=74:
				echo "A-";
				break; 
			 case $marks>=65 && $marks <=69:
				echo "B+";
				break; 
			 case $marks>=60 && $marks <=64:
				echo "B";
				break; 
			 case $marks>=55 && $marks <=59:
				echo "B-";
				break; 
			case $marks>=50 && $marks <=54:
				echo "C+";
				break; 
			 case $marks>=45 && $marks <=49:
				echo "C";
				break; 
			case $marks>=40 && $marks <=44:
				echo "D";
				break; 	
			 case $marks>=0 && $marks <=39:
				echo "F";
				break; 
			 default:
				echo "Invalid Input!";
			}	
		}	
		
		function grade_letter_calculator_modify($marks)
		{
		   //echo $marks;
		   switch ($marks){
			 case $marks>=80 && $marks <=100:
				return "A+";
			  case $marks>=75 && $marks <=79:
				return "A";
			 case $marks>=70 && $marks <=74:
				return "A-";
			 case $marks>=65 && $marks <=69:
				return "B+";
			 case $marks>=60 && $marks <=64:
				return "B";
			 case $marks>=55 && $marks <=59:
				return "B-";
			case $marks>=50 && $marks <=54:
				return "C+";
			 case $marks>=45 && $marks <=49:
				return "C";
			case $marks>=40 && $marks <=44:
				return "D";
			 case $marks>=0 && $marks <=39:
				return "F";
			 default:
				return "Invalid Input!";
			}	
		}	
		
		
		function grade_point_calculator($marks)
		{
		   //echo $marks;
		   switch ($marks){
			 case $marks>=80 && $marks <=100:
				return "4.00";
			  case $marks>=75 && $marks <=79:
				return "3.75";
			 case $marks>=70 && $marks <=74:
				return "3.50";
			 case $marks>=65 && $marks <=69:
				return "3.25";
			 case $marks>=60 && $marks <=64:
				return "3.00";
			 case $marks>=55 && $marks <=59:
				return "2.75";
			case $marks>=50 && $marks <=54:
				return "2.50";
			 case $marks>=45 && $marks <=49:
				return "2.25";				 
			case $marks>=40 && $marks <=44:
				return "2.00";
			 case $marks>=0 && $marks <=39:
				return "0.00";			 
			 default:
				return "N/A";
			}		
		}
?>