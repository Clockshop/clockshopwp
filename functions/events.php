<?php

// Format Dates

function spellerberg_sp_date($postid, $format='') {
	echo spellerberg_return_sp_date($postid, $format);
}

function spellerberg_return_sp_date($postid, $format='') {

	$startYear = sp_get_start_date($postid,'','Y'); 
	$endYear = sp_get_end_date($postid,'','Y');

	$startMonth = sp_get_start_date($postid,'','M'); 
	$endMonth = sp_get_end_date($postid,'','M');

	$startDay = sp_get_start_date($postid,'','j'); 
	$endDay = sp_get_end_date($postid,'','j');

	$weekday = sp_get_start_date($postid,'','D'); 

	$s_hour = sp_get_start_date($postid,'','g'); 
	$s_min = sp_get_start_date($postid,'','i'); 
	$s_am = ' ' . sp_get_start_date($postid,'','a');
	
	$e_hour = sp_get_end_date($postid,'','g'); 
	$e_min = sp_get_end_date($postid,'','i'); 
	$e_am = ' ' . sp_get_end_date($postid,'','a');

	if ( tribe_is_recurring_event($postid) ) :
		$recurrence_text = tribe_get_recurrence_text($postid);
	else :
		$recurrence_text = '';
	endif;

	return spellerberg_show_event_datetime( $startYear, $endYear, $startMonth, $endMonth, $startDay, $endDay, $startTime, $endTime, $weekday, $s_hour, $s_min, $s_am, $e_hour, $e_min, $e_am, $format, $recurrence_text );

}

function spellerberg_show_event_datetime ( $startYear, $endYear, $startMonth, $endMonth, $startDay, $endDay, $startTime, $endTime, $weekday, $s_hour, $s_min, $s_am, $e_hour, $e_min, $e_am, $format, $recurrence_text ) {

	$output = '';


	if ( $startYear == $endYear && $startMonth == "Jan" && $endMonth == "Dec" && $startDay == "1" && $endDay == "31") {

		// Is a year-long program
		$output .= 'Annual program';

	} else {

		if ( $startYear !== $endYear ) {

			//Different Years
			$output .= $startMonth . ' ' . $startDay;
			if ( $format != 'noyears' ) $output .= ', ' . $startYear;
			$output .= ' &ndash; ' . $endMonth . ' ' . $endDay . ', ' . $endYear;

		} else {

			//Same Years
			if ($startMonth !== $endMonth) {

				// Different Months
				$output .= $startMonth . ' ' . $startDay . ' &ndash; ' . $endMonth . ' ' . $endDay;
				if ( $format != 'noyears' ) $output .= ', ' . $endYear;


			} else {
				// Same Months
				if ($startDay !== $endDay) {
					// Different Day
					$output .= $startMonth . ' ' . $startDay . '&ndash;' . $endDay;
					if ( $format != 'noyears' ) $output .= ', ' . $endYear;
				} else {
					// Same Day
					$output .= $weekday . ', ' . $startMonth . ' ' . $startDay;
					if ( $format != 'noyears' ) $output .= ', ' . $startYear;
				}
			}
		}


		if ( $s_hour == '12' && $s_min == '00' && $s_am == ' am' && $e_hour == '11' && $e_min == '59') {
			// Is All Day, no output	
		} else {
			// Not All Day

			// Set PM, and also output format
			if ( $s_am == " am" ) :
				$s_am = "&nbsp;am";
			else :
				$s_am = "&nbsp;pm";		
			endif;

			if ( $e_am == " am" ) :
				$e_am = "&nbsp;am";
			else :
				$e_am = "&nbsp;pm";		
			endif;

			if ( $s_min == '00' ) {
				if($s_hour == "12"){
					if($s_am == "&nbsp;am"){
						$output .= ", Midnight";
					}else{
						$output .= ", Noon";
					}
				}else{
					$output .= ', ' . $s_hour;
					if ( $s_am !== $e_am ) {
						// Different AM
						$output .= ' ' . $s_am;
					}elseif ( $e_hour == "12" && $e_min == '00' ) {
						// End time is midnight or noon
						$output .= ' ' . $s_am;
					}

				}
			} else {
				$output .= ', ' . $s_hour . ':' . $s_min;
				if ( $s_am !== $e_am ) {
					// Different AM
					$output .= ' ' . $s_am;
				}
			}

			if ( $e_min == '00' ) {
				if($e_hour == "12"){
					if($e_am == "&nbsp;am"){
						$output .= "&ndash;Midnight";
					}else{
						$output .= "&ndash;Noon";
					}
				}else{
					$output .= '&ndash;' . $e_hour;
					$output .= $e_am;
				}
			} else {
				$output .= '&ndash;' . $e_hour . ':' . $e_min;
				$output .= $e_am;
			}

		}

	}

	if ( $recurrence_text != '' ) $output .= '<br />' . $recurrence_text;

	return $output;
	
}
