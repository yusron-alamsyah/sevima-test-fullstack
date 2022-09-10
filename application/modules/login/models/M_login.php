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

  public function cekUsername($username){
    $cek = $this->M_login->fetch_table("id","m_user", "username = '" .$username . "'");
    return $cek;
  }

  public function updateLastLogin($id){
    $model = $this->M_login->update_table("m_user", ["last_login" => date("Y-m-d H:i:s")],"id",$id);  
    return $model;             
  }

  public function list_user(){
    return $this->M_login->fetch_table("*", "m_user","role = 'user'","id","DECS",0,5);
  }

  public function list_posting(){
    $joins = array(
      array(
          'table'     => 'm_user',
          'condition' => 'm_user.id = t_posting.created_by',
          'jointype'  => '',
      ),
      array(
          'table'     => 't_like',
          'condition' => 't_like.posting_id = t_posting.id AND t_like.created_by = '.$_SESSION['admin_id'].' ',
          'jointype'  => 'left',
      )
  );
    return $this->M_login->fetch_joins("t_posting.*,m_user.username,m_user.email,t_like.posting_id as is_like", "t_posting", $joins,);
  }

  public function countComment($id){
    $getComments =  $this->M_login->fetch_table("count(komentar) as komentar", "t_komentar","posting_id = '".$id."' ");
    return $getComments;
  }

  public function countLike($id){
    $getLikes =  $this->M_login->fetch_table("count(posting_id) as likes", "t_like","posting_id = '".$id."' ");
    return $getLikes;
  }

  public function cekUser($username){
    $cek = $this->M_login->fetch_table("id", "m_user", "username = '" . $username . "'");
    return $cek;
  }

  public function register($data){
    $add = $this->M_login->insert_table("m_user", $data);   
    return $add;
  }

  public function add_posting($data){
    $add = $this->M_login->insert_table("t_posting", $data);   
    return $add;
  }

  public function add_comment($data){
    $add = $this->M_login->insert_table("t_komentar", $data);   
    return $add;
  }

  public function cekLike($id){
    $cek = $this->M_login->fetch_table("id", "t_like", "posting_id = '" . $id. "' AND t_like.created_by = ".$_SESSION['admin_id']." ");

    return $cek;
  }

  public function deleteLike($id){
    $add = $this->M_login->delete_table("t_like", "posting_id", $id);
    return $add;
  }
  
  public function add_like($data){
    $add = $this->M_login->insert_table("t_like", $data);   
    return $add;
  }

  public function list_comment($id){
    $joins = array(
      array(
            'table'     => 'm_user',
            'condition' => 'm_user.id = t_komentar.created_by',
            'jointype'  => '',
        )
    );
    
    $list_komen = $this->M_login->fetch_joins("t_komentar.*,m_user.username,m_user.email", "t_komentar", $joins,"posting_id = ".$id." ");
    return $list_komen;
  }

  public function detailPosting($id){
    $joins_detail = array(
      array(
          'table'     => 'm_user',
          'condition' => 'm_user.id = t_posting.created_by',
          'jointype'  => '',
      )
  );
  
  $detail_posting = $this->M_login->fetch_joins("t_posting.*,m_user.username,m_user.email", "t_posting", $joins_detail,"t_posting.id = ".$id." ");
  return $detail_posting;
  }
}