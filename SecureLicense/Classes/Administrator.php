<?php
namespace SecureLicense\Classes;
use PDO;
class Administrator {
	protected $db;

	public function __construct(  ) {
		global $sldb;
		$this->db = $sldb;
	}
	public function get_administrator(){
		$data = array();
		$query = $this->db->query("SELECT * FROM sl_admin",PDO::FETCH_ASSOC);
		if($query->rowCount()){
			foreach($query as $admin){
				$data[] = $admin;
			}
			return $data;
		}
	}
	public function update_administrator($username,$password,$update_password = true){
		if($update_password === false){
			$query = $this->db->prepare("UPDATE sl_admin SET sl_username =:username");
			$query->execute(array("username" => $username));
			if($query->rowCount()){
				return get_success_msg("Başarıyla Güncellendi");
			}elseif(!$query){
				return false;
			}else{
				return get_warring_msg("Değişiklik Olmadı");
			}
		}else{
			$query = $this->db->prepare("UPDATE sl_admin SET sl_username =:username,sl_password =:password");
			$query->execute(array("username" => $username,"password" => password_hash($password,PASSWORD_BCRYPT)));
			if($query->rowCount()){
				return get_success_msg("Başarıyla Güncellendi");
			}else{
				return get_error_msg("Güncellenemedi");
			}
		}
	}
}