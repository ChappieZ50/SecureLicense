<?php
function pagination( $total ,$page) {
	$next   = $page == $total ? null : $page + 1;
	$prev   = $page == 1 ? null : $page - 1;
	$last   = $total;
	$first  = 1;
	$html[] = "<div class='sl_pagination'>";
	$html[] = "<ul>";
	if ( $page > 1 ) {
		$html[] = "<li><a href='?page=$first'>&laquo;</a></li>";
		$html[] = "<li><a href='?page=$prev'>&lsaquo;</a></li>";
	} else {
		$html[] = "<li><a href='javascript:;' class='disabled'>&laquo;</a></li>";
		$html[] = "<li><a href='javascript:;' class='disabled'>&lsaquo;</a></li>";
	}
	$html[] = " $page / $total ";
	if ( $page == $total ) {
		$html[] = "<li><a href='javascript:;' class='disabled'>&rsaquo;</a></li>";
		$html[] = "<li><a href='javascript:;' class='disabled'>&raquo;</a></li>";
	} else {
		$html[] = "<li><a href='?page=$next'>&rsaquo;</a></li>";
		$html[] = "<li><a href='?page=$last'>&raquo;</a></li>";
	}
	$html[] = "</ul>";
	$html[] = "</div>";

	return $html;
}