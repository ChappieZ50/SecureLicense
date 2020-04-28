<?php
namespace SecureLicense\Classes;
class UploadImage {
	public function image_upload($image){
		$allowedExts = array( "gif", "jpeg", "jpg", "png" );
		$temp        = explode( ".", $image["name"] );
		$extension   = end( $temp );
		if ( ( ( $image["type"] == "image/gif" )
		       || ( $image["type"] == "image/jpeg" )
		       || ( $image["type"] == "image/jpg" )
		       || ( $image["type"] == "image/pjpeg" )
		       || ( $image["type"] == "image/x-png" )
		       || ( $image["type"] == "image/png" ) )
		     && ( $image["size"] < 1000000 )
		     && in_array( $extension, $allowedExts ) ) {
			if ( $image["error"] > 0 ) {
				return get_warring_msg( "Bir Hata Oluştu ve Resim Yüklenemedi. Hata Kodu : " . $image['error'] );
			} else {

				$temp = explode(".", $image["name"]);
				$newfilename = round(microtime(true)) . '.' . end($temp);
				if ( file_exists( uploads_dir() . $newfilename ) ) {
					return get_warring_msg( "Resim Zaten Mevcut" );
				} else {
					if(move_uploaded_file( $image["tmp_name"], uploads_dir() . $newfilename)){
						return array("success" => true , "file_name" => $newfilename);
					}else{
						return get_warring_msg( "Bir Hata Oluştu ve Resim Yüklenemedi.");
					}
				}
			}
		} else {
			return get_warring_msg( "Geçersiz Resim" );
		}
	}
}