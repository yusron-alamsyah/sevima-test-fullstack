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

    public function home(){
        cekLogin();
        $data['content'] = 'dashboard';
        $data['form'] = 'form_posting';
        $joins = array(
            array(
                'table'     => 'm_user',
                'condition' => 'm_user.id = t_posting.created_by',
                'jointype'  => '',
            )
        );
        
        $data["list_user"] = $this->M_login->fetch_table("*", "m_user","","id","DECS");

        $data['list_posting'] = $this->M_login->fetch_joins("t_posting.*,m_user.username,m_user.email", "t_posting", $joins,);
        foreach ($data['list_posting'] as $key => $value) {
            $getComments =  $this->M_login->fetch_table("count(komentar) as komentar", "t_komentar","posting_id = '".$value->id."' ");

             $jumlahKomen = isset($getComments[0]->komentar) ? $getComments[0]->komentar : 0;
             $value->tanggal = date("d-m-Y H:i:s",$value->created_at);
             $value->jumlah_komen = $jumlahKomen;
        }

        $this->load->view('user_page',$data);
    
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

    public function ajax_action_posting()
    {

        $this->form_validation->set_rules('caption', 'caption', 'required');
        if (empty($_FILES['gambar']['name']))
        {
            $this->form_validation->set_rules('gambar', 'gambar', 'required');
        }
        
        if ($this->form_validation->run() == false) {
            $error = $this->form_validation->error_array();

            return unprocessResponse(displayError($error), $error, '');
        } else {
            
            $data = array(
                "caption" => post("caption"),
                
            );

            $config['upload_path']          = './uploads/posting';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1024;

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('gambar'))
            {
                $error = array('error' => $this->upload->display_errors());
                return unprocessResponse($this->upload->display_errors());
            }
            else
            {
                $fileGambar = array('upload_data' => $this->upload->data());
                
                $data['gambar'] = $fileGambar['upload_data']['file_name'];
                
            }

            $add = $this->M_login->insert_table("t_posting", $data);   
            
            if ($add == false) {
                return unprocessResponse('Failed to save data');
            } else {
                return successResponse('Success Posting', '' . base_url() . 'login/home');
            }

        }

    }


    public function ajax_action_comment()
    {

            $data = array(
                "posting_id" => post("id"),
                "komentar"   => post("text"),
            );
            
            $add = $this->M_login->insert_table("t_komentar", $data);   
            
            if ($add == false) {
                return unprocessResponse('Failed to save data');
            } else {
                return successResponse('Success Comment');
            }


    }

    public function logout(){
        $session = array("log_session","admin_id","username");
        $this->session->unset_userdata($session);
        $this->session->sess_destroy();
        redirect("login/");
    }
}