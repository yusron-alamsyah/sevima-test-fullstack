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
                    
                    $this->M_login->updateLastLogin($dataUser->id);
                    return successResponse('Login Success',''.base_url().'login/home/');
                                      
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