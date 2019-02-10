<?php

function custom_date_format( $date, $format ) {
	$cdf = new DateTime( $date );
	return $cdf->format( $format );
}

function date_difference( $date1, $date2, $sep ) {
	list( $y1, $a1, $g1 ) = explode( $sep, $date1 );
	list( $y2, $a2, $g2 ) = explode( $sep, $date2 );
	$t1_timestamp = mktime( '0', '0', '0', $a1, $g1, $y1 );
	$t2_timestamp = mktime( '0', '0', '0', $a2, $g2, $y2 );
	$result       = false;
	if ( $t2_timestamp > $t1_timestamp ) {
		$result = ( $t2_timestamp - $t1_timestamp ) / 86400;
	} else {
		return null;
	}
	return $result;
}