<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {


    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();

		$this->load->helper('url');
		$this->load->model("M_login");
		$this->load->library('session');
		$this->load->library(array('session','pagination','form_validation'));
    }

	public function index()
	{
        if(empty(!$_SESSION['log_session'])){
            redirect("login/home"); 
        }
		$this->load->view('login_page');
	}

	public function ajax_action_login(){
		$this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        
        $username = post('username'); 
        $password = md5(post('password'));

        
        if($this->form_validation->run()==FALSE){
            $error = $this->form_validation->error_array();
            return unprocessResponse('Username and password is required',$error,''.base_url().'login/');
            
        }else{
            $cek = count($this->M_login->cekLogin($username,$password));
            $dataUser = $this->M_login->getUser($username,$password);
                if(@$cek==0){
                    return unprocessResponse('Login Failed , Please Check Your Username / Password',null,''.base_url().'login/');
                }else{
                    $this->session->set_userdata('log_session', TRUE);
                    $this->session->set_userdata('admin_id', $dataUser->id);
                    $this->session->set_userdata('username', $dataUser->username);
                    $this->session->set_userdata('email', $dataUser->email);
                    
                    $this->M_login->updateLastLogin($dataUser->id);
                    return successResponse('Login Success',''.base_url().'login/home/');
                                      
                }
            
        }
	}

    public function ajax_action_add()
    {

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $error = $this->form_validation->error_array();

            return unprocessResponse(displayError($error), $error, '');
        } else {

           $cek = $this->M_login->fetch_table("id", "m_user", "username = '" . post('username') . "'");
            if (count($cek) > 0) {
                return unprocessResponse('Username is already exist');
            }

            $data = array(
                "username" => post("username"),
                "password" => md5(post("password")),
                "email"     => post("email"),
            );
            
            $add = $this->M_login->insert_table("m_user", $data);   
            
            if ($add == false) {
                return unprocessResponse('Failed to save data');
            } else {
                return successResponse('Success Register , Please Login first');
            }

        }

    }


    public function home(){
            cekLogin();
    		$data['content'] = 'dashboard';
            // $data['active_pelanggan'] = count($this->M_login->fetch_table("id","m_pelanggan",""));
                
            // $data['order_monthly'] = count($this->M_login->fetch_table("id","t_penjualan","MONTH(tanggal) = '".date("m")."' "));
            
            $this->load->view('user_page',$data);
    	
    }

    public function logout(){
        $session = array("log_session","admin_id","username");
        $this->session->unset_userdata($session);
        $this->session->sess_destroy();
        redirect("login/");
    }
}