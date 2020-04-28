<?php

namespace SecureLicense\Classes;

use PDO;

class LicenseActivity {
	protected $db;

	public function __construct() {
		global $sldb;
		$this->db = $sldb;
	}

	public function license_activity() {
		$nolimit  = false;
		$get_data = $this->db->query( "SELECT id,sl_end_date FROM sl_licenses", PDO::FETCH_ASSOC );
		if ( $get_data->rowCount() ) {
			foreach ( $get_data as $check_data ) {
				$end_date = $check_data["sl_end_date"];
				$id       = $check_data["id"];
				if ( $end_date == "1970-01-01 00:00:00" ) {
					$nolimit = true;
				}
				if($nolimit === true){
					$disable_activity = $this->db->prepare( "UPDATE sl_licenses SET sl_activity = :sl_activity WHERE id = :id" );
					$disable_activity->execute( array(
						"sl_activity" => 1,
						"id"          => $id
					) );
				}else{
					$date_diff = date_difference( date( "Y.m.d" ), custom_date_format( $end_date, "Y.m.d" ), "." );
					if ( empty( $date_diff ) ) {
						$disable_activity = $this->db->prepare( "UPDATE sl_licenses SET sl_activity = :sl_activity WHERE id = :id" );
						$disable_activity->execute( array(
							"sl_activity" => 0,
							"id"          => $id
						) );
					}
				}
			}
		}

		return;
	}
}