<?php
function timeAgo( $date ) {
	$date      = strtotime( $date );
	$date_diff = time() - $date;
	$second    = $date_diff;
	$minute    = round( $date_diff / 60 );
	return $second;
}