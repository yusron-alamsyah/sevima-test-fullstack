<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    private $_table = 'm_user';
    private $_primaryKey  = 'id';

    private $_content = 'user';
    private $_form = 'form';

    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();

        $this->load->helper('url');
        $this->load->model("M_user");
        $this->load->library('session');
        $this->load->library(array('session', 'pagination', 'form_validation'));
    }

    public function index()
    {
        cekLogin();
        $data['content'] = $this->_content;
        $data['form']    = $this->_form;
        $this->load->view('login/admin_page.php', $data);

    }

    public function ajax_list()
    {
        $column        = '*';
        $columnOrder  = array(null, 'username', 'role', 'last_login', null); //set column field database for datatable orderable
        $columnSearch = array('username', 'role', 'last_login'); //set column field database for datatable searchable
        $order         = array($this->_primaryKey => 'DESC'); // default order

        $list = $this->M_user->get_datatables($column, $this->_table, $columnOrder, $columnSearch, $order);

        $data = array();
        $no   = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row   = array();
            $row[] = '<center>'.$no.'</center>';
            $row[] = $key->username;
            $row[] = $key->role;
            $row[] = $key->last_login;
            $row[] = "
            <center><button data-toggle='tooltip' data-placement='top' title='Edit' onclick='ajax_get_edit(" . $key->id . ")' class='btn btn-primary btn-sm'><i class='zmdi zmdi-edit'></i></button>
                    <button data-toggle='tooltip' data-placement='top' title='Delete' onclick='ajax_action_delete(" . $key->id . ")' class='btn btn-danger btn-sm'><i class='zmdi zmdi-delete'></i></button></center>";

            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->M_user->count_all($this->_table),
            "recordsFiltered" => $this->M_user->count_filtered($column, $this->_table, $columnOrder, $columnSearch, $order),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_get_edit()
    {

        $id  = get("id");
        $cek = $this->M_user->fetch_table("*", $this->_table, $this->_primaryKey." = '" . get('id') . "'");
        if ($cek) {
            $cek[0]->akses = json_decode($cek[0]->akses);
            return successResponse($cek[0]);
        } else {
            return unprocessResponse('Failed to get data');
        }
    }
    public function ajax_action_add()
    {

        $this->form_validation->set_rules('username', 'username', 'required');
        //jika ada update password tidak wajib
        $id = post("id");
        if (empty($id)) {
            $this->form_validation->set_rules('password', 'password', 'required');
        }
        $this->form_validation->set_rules('role', 'role', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == false) {
            $error = $this->form_validation->error_array();

            return unprocessResponse(displayError($error), $error, '');
        } else {

            //cek_duplicate
            if (empty($id)) {
                $cek = $this->M_user->fetch_table("id", $this->_table, "username = '" . post('username') . "'");
            }else{
                $cek = $this->M_user->fetch_table("id", $this->_table, "username = '" . post('username') . "' and ".$this->_primaryKey." != '".$id."' ");
            }
            if (count($cek) > 0) {
                return unprocessResponse('Duplicate Data ');
            }

            $akses = post("akses");
            if(isset($akses)) {
                $akses["like"] = isset($akses["like"]) ? $akses["like"] : false;
                $akses["posting"] = isset($akses["posting"]) ? $akses["posting"] : false;
                $akses["comment"] = isset($akses["comment"]) ? $akses["comment"] : false; 
            }else{
                $akses["like"] =false;
                $akses["posting"] = false;
                $akses["comment"] =  false; 
            }
            
            $data = array(
                "username" => post("username"),
                "role"     => post("role"),
                "email"     => post("email"),
                "akses"    => json_encode($akses)
            );
            $password = post("password");
            if(isset($password) && !empty($password)){
                $data["password"] = md5(post("password"));
            }
            
            if (isset($id) && !empty($id)) {
                $add = $this->M_user->update_table($this->_table, $data,$this->_primaryKey,$id);   
            }else{
                $add = $this->M_user->insert_table($this->_table, $data);   
            }
            if ($add == false) {
                return unprocessResponse('Failed to save data');
            } else {
                return successResponse('Success Save', '' . base_url() . 'user/');
            }

        }

    }

    public function ajax_action_delete()
    {
        $delete = $this->M_user->delete_table($this->_table, $this->_primaryKey, post("id"));
        if ($delete == false) {
            return unprocessResponse('Failed to delete data');
        } else {
            return successResponse('Success Delete', '' . base_url() . 'user/');
        }
    }

}
