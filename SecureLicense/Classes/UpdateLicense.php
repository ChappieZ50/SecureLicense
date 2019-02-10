<?php

namespace SecureLicense\Classes;
class UpdateLicense {
	protected $db;

	public function __construct(  ) {
		global $sldb;
		$this->db = $sldb;
	}

	public function update_license( $id, $domain, $end_date ) {
		$query = $this->db->prepare( "UPDATE sl_licenses SET sl_domain = :sl_domain , sl_end_date = :sl_end_date, sl_activity = :sl_activity WHERE id = :id" );
		if ( empty( $end_date ) ) {
			$activity = 1;
		} else {
			$dateDiff =  date_difference( date( "Y.m.d" ), custom_date_format( $end_date, "Y.m.d" ), "." );
			$activity =  empty($dateDiff) ? 0 : 1;
		}
		$query->execute( array(
			"id"          => $id,
			"sl_domain"   => $domain,
			"sl_end_date" => !empty($end_date) ? $end_date : "1970-01-01 00:00:00",
			"sl_activity" => $activity,
		) );
		if($query->rowCount()){
			setcookie("activity_time","activity_time",-3600);
			return get_success_msg("Lisans Güncellendi");
		}elseif (!$query){
			return get_warring_msg("Böyle Bir Lisans Yok");
		}else{
			return get_warring_msg("Değişiklik Yapılmadı");
		}
	}
}