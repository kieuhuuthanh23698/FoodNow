<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

  public function getAPI($URL, $username, $password){
    $param = array(
      "tenTaikhoan" => $username,
      "matKhau" => $password
    );
    $ch = curl_init($URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POST, count($param));
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param)); 
    $response = curl_exec($ch);//RESPONE LÀ 1 string dạng JSON
    if(curl_errno($ch) > 0)
    {
        return null;
    }
    curl_close($ch);
    return json_decode($response, true);
  }
}
?>