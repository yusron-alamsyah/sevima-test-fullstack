<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends MY_Model {

  private $_table = 'm_user';
  private $_primaryKey  = 'id';

  public function __construct()
  {
    parent::__construct();
  }

  public function delete($id){
    $delete = $this->M_user->delete_table($this->_table, $this->_primaryKey, $id);
    return $delete;
  }

  public function insert($data){
    $add = $this->M_user->insert_table($this->_table, $data);   
    return $add;
  }
  
  public function update($data,$id){
    $add = $this->M_user->update_table($this->_table, $data,$this->_primaryKey,$id);   
    return $add;
  }

  public function getEdit($id){
    $cek = $this->M_user->fetch_table("*", $this->_table, $this->_primaryKey." = '" .$id. "'");
    return $cek;
  }

  public function cekDuplicate($username){
    $cek = $this->M_user->fetch_table("id", $this->_table, "username = '" .$username . "'");
    return $cek;
  }
  public function cekDuplicateUpdate($username,$id){
    $cek = $this->M_user->fetch_table("id", $this->_table, "username = '" . $username . "' and ".$this->_primaryKey." != '".$id."' ");
    return $cek;
  }

  public function listTable(){
    $column        = '*';
    $columnOrder  = array(null, 'username', 'role', 'last_login', null); //set column field database for datatable orderable
    $columnSearch = array('username', 'role', 'last_login'); //set column field database for datatable searchable
    $order         = array($this->_primaryKey => 'DESC'); // default order

    $list = $this->M_user->get_datatables($column, $this->_table, $columnOrder, $columnSearch, $order);

    return $list;
  }

  public function countAll(){
    $return = $this->M_user->count_all($this->_table);
    return $return;
  }

  public function countFilter(){
    $column        = '*';
    $columnOrder  = array(null, 'username', 'role', 'last_login', null); //set column field database for datatable orderable
    $columnSearch = array('username', 'role', 'last_login'); //set column field database for datatable searchable
    $order         = array($this->_primaryKey => 'DESC'); // default order

    return $this->M_user->count_filtered($column, $this->_table, $columnOrder, $columnSearch, $order);
  }
  
}