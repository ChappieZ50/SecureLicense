<?php
namespace SecureLicense\Classes;
use PDO;
class ExpiredLicenses {
	protected $db;
	public function __construct() {
		global $sldb;
		$this->db = $sldb;
	}
	public function get_expired_licenses(){
		$page = get("page") ? get("page") : 1;
		$total = $this->db->query("SELECT COUNT(*) FROM sl_licenses WHERE sl_activity = 0")->fetchColumn();
		if($total != 0){
			$limit = 5;
			$per_page = ceil($total/$limit);
			if($page >  $per_page){
				$page = $per_page;
			}
			$show = $page  * $limit - $limit;
			$query    = $this->db->query( "SELECT * FROM sl_licenses WHERE sl_activity = 0  ORDER BY id DESC LIMIT $show , $limit", PDO::FETCH_ASSOC );
			$licenses = array();
			if ( $query->rowCount() ) {
				foreach ( $query as $license ) {
					$licenses[] = $license;
				}
				return array("total" => $total , "per_page" => $per_page , "page" => $page , "licenses" => $licenses);
			} else {
				return false;
			}
		}else{
			return false;
		}
	}
	public function get_total_expired_licenses(){
		$query = $this->db->query("SELECT COUNT(*) FROM sl_licenses WHERE sl_activity = 0")->fetchColumn();
		return $query;
	}
}