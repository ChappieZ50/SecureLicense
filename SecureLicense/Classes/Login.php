<?php
namespace SecureLicense\Classes;
use PDO;
class Login {
	protected $db;

	public function __construct() {
		global $sldb;
		$this->db = $sldb;
	}
	public function check_login($username,$password){
		$get_admin = $this->db->query("SELECT * FROM sl_admin",PDO::FETCH_ASSOC);
		if($get_admin->rowCount()){
			foreach($get_admin as $admin){
				$admin_password = $admin["sl_password"];
				$admin_username = $admin["sl_username"];
				if($admin_username === $username && password_verify($password,$admin_password)){
					$_SESSION["login"] = true;
					header("Location:".CURRENT);
				}else{
					return "Kullanıcı Adı veya Şifre Yanlış";
				}
			}
		}
	}
}