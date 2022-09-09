<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends MY_Model {
  public function __construct()
  {
    parent::__construct();
  }
  
  public function cekLogin($username,$password){
    $model =  $this->M_login->fetch_table("id","m_user","username='$username' and password = '$password' ");
    return $model;
  }

  public function getUser($username,$password){
    $model =  $this->M_login->get_row("*","m_user","username='$username' and password = '$password' ","","",FALSE);
    return $model;
  }

  public function updateLastLogin($id){
    $model = $this->M_login->update_table("m_user", ["last_login" => date("Y-m-d H:i:s")],"id",$id);  
    return $model;             
  }
  
}