<?php

namespace SecureLicense\Classes;

use PDO;

class Profile {
	protected $db;

	public function __construct() {
		global $sldb;
		$this->db = $sldb;
	}

	public function get_profile() {
		$data  = array();
		$query = $this->db->query( "SELECT * FROM sl_profile", PDO::FETCH_ASSOC );
		if ( $query->rowCount() ) {
			foreach ( $query as $profile ) {
				$data[] = $profile;
			}

			return $data;
		} else {
			return false;
		}
	}

	public function insert_profile( $first_name, $last_name, $site_name, $user_image ) {
		if ( empty( $user_image ) ) {
			$query = $this->db->prepare( "INSERT INTO sl_profile SET sl_firstname = :firstname , sl_lastname = :lastname , sl_site_name = :site_name" );
			$query->execute( array(
				"firstname" => $first_name,
				"lastname"  => $last_name,
				"site_name" => $site_name,
			) );
			if ( $query->rowCount() ) {
				return get_success_msg( "Profil Eklendi" );
			} else {
				return get_error_msg( "Beklenmeyen Hata" );
			}
		} else {
			$upload_image = new UploadImage();
			$upload       = $upload_image->image_upload( $user_image );
			if ( isset( $upload["success"] ) && $upload["success"] === true && isset( $upload["file_name"] ) && ! empty( $upload["file_name"] ) ) {
				$query = $this->db->prepare( "INSERT INTO sl_profile SET sl_firstname = :firstname , sl_lastname = :lastname , sl_site_name = :site_name , sl_user_image = :user_image" );
				$query->execute( array(
					"firstname"  => $first_name,
					"lastname"   => $last_name,
					"site_name"  => $site_name,
					"user_image" => $upload["file_name"]
				) );
				if ( $query->rowCount() ) {
					return get_success_msg( "Profil Eklendi" );
				} else {
					return get_error_msg( "Beklenmeyen Hata" );
				}
			} else {
				return $upload;
			}
		}
	}

	public function update_profile( $first_name, $last_name, $site_name, $user_image ) {
		if ( empty( $user_image ) ) {
			$query = $this->db->prepare( "UPDATE sl_profile SET sl_firstname = :firstname , sl_lastname = :lastname , sl_site_name = :site_name" );
			$query->execute( array(
				"firstname" => $first_name,
				"lastname"  => $last_name,
				"site_name" => $site_name,
			) );
			if ( $query->rowCount() ) {
				return get_success_msg( "Profil Güncellendi" );
			} else {
				return get_error_msg( "Beklenmeyen Hata" );
			}
		} else {
			$upload_image = new UploadImage();
			$upload       = $upload_image->image_upload( $user_image );
			if ( isset( $upload["success"] ) && $upload["success"] === true && isset( $upload["file_name"] ) && ! empty( $upload["file_name"] ) ) {
				$query = $this->db->prepare( "UPDATE sl_profile SET sl_firstname = :firstname , sl_lastname = :lastname , sl_site_name = :site_name , sl_user_image = :user_image" );
				$query->execute( array(
					"firstname"  => $first_name,
					"lastname"   => $last_name,
					"site_name"  => $site_name,
					"user_image" => $upload["file_name"]
				) );
				if ( $query->rowCount() ) {
					return get_success_msg( "Profil Güncellendi" );
				} else {
					return get_error_msg( "Beklenmeyen Hata" );
				}
			}
		}
	}

	public function get_profile_data() {
		$data  = array();
		$query = $this->db->query( "SELECT sl_user_image,sl_firstname,sl_lastname FROM sl_profile", PDO::FETCH_ASSOC );
		if ( $query->rowCount() ) {
			foreach ( $query as $profile_data ) {
				$data = array(
					"avatar"   => $profile_data["sl_user_image"],
					"name"     => $profile_data["sl_firstname"],
					"lastname" => $profile_data["sl_lastname"]
				);
			}
			return $data;
		} else {
			return false;
		}
	}
}