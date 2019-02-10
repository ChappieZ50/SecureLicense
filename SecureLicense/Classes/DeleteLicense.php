<?php

namespace SecureLicense\Classes;


class DeleteLicense {
	protected $db;

	public function __construct() {
		global $sldb;
		$this->db = $sldb;
	}

	public function delete_license( $id, $table = "sl_licenses" ) {
		$query = $this->db->prepare( "DELETE FROM $table WHERE id = :id" );
		$query->execute( array(
			"id" => $id
		) );
		if ( $query->rowCount() ) {
			return get_success_msg( "Lisans Başarıyla Silindi" );
		} elseif ( ! $query ) {
			return get_error_msg( "Lisans Silinemedi" );
		} else {
			return get_warring_msg( "Böyle Bir Lisans Yok" );
		}
	}
}