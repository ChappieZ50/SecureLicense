<?php

namespace SecureLicense\Classes;
use PDO;

class GetLicenseForID {
	protected $db;

	public function __construct(  ) {
		global $sldb;
		$this->db = $sldb;
	}
	public function get_for_id($id){
		$data = array();
		$query = $this->db->query("SELECT * FROM sl_licenses WHERE id = $id",PDO::FETCH_ASSOC);
		if($query->rowCount()){
			foreach($query as $license){
				$data[] = $license;
			}
			return array("success" => true, "data" => $data);
		}elseif (!$query){
			return get_error_msg("Bilinmeyen Hata");
		}else{
			return get_warring_msg("Böyle Bir Lisans Yok");
		}
	}
}