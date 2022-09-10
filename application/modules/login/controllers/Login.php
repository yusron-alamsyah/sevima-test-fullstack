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

    public function session()
	{        
        header('Content-Type: application/json; charset=utf-8');
        
         print_r($_SESSION["akses"]); die();
        // echo json_encode(json_decode());
	}

    public function home(){
        cekLogin();
        $data['content'] = 'dashboard';
        $data['form'] = 'form_posting';
        $data['form_detail'] = 'detail_posting';
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
        
        $data["list_user"] = $this->M_login->fetch_table("*", "m_user","","id","DECS");

        $data['list_posting'] = $this->M_login->fetch_joins("t_posting.*,m_user.username,m_user.email,t_like.posting_id as is_like", "t_posting", $joins,);
        foreach ($data['list_posting'] as $key => $value) {
            $getComments =  $this->M_login->fetch_table("count(komentar) as komentar", "t_komentar","posting_id = '".$value->id."' ");
            $getLikes =  $this->M_login->fetch_table("count(posting_id) as likes", "t_like","posting_id = '".$value->id."' ");
            if(!empty($value->is_like)){
                $value->is_like = true;
            }else{
                $value->is_like = false;
            }

             $jumlahKomen = isset($getComments[0]->komentar) ? $getComments[0]->komentar : 0;
             $jumlahLike = isset($getLikes[0]->likes) ? $getLikes[0]->likes : 0;

             $value->tanggal = date("d-m-Y H:i:s",$value->created_at);
             $value->jumlah_komen = $jumlahKomen;
             $value->jumlah_like = $jumlahLike;
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
                    $akses = json_decode($dataUser->akses, true);
                    
                    $this->session->set_userdata('log_session', TRUE);
                    $this->session->set_userdata('admin_id', $dataUser->id);
                    $this->session->set_userdata('username', $dataUser->username);
                    $this->session->set_userdata('email', $dataUser->email);
                    $this->session->set_userdata('role', $dataUser->role);
                    $this->session->set_userdata('akses', $akses);
                    
                    $this->M_login->updateLastLogin($dataUser->id);
                    if($dataUser->role == "admin"){
                        return successResponse('Login Success',''.base_url().'user/');
                    }else{
                        return successResponse('Login Success',''.base_url().'login/home/');
                    }
                                                          
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
            $akses = array(
                "like" => true,
                "posting" => true,
                "comment" => true,
            );

            $data = array(
                "username" => post("username"),
                "password" => md5(post("password")),
                "email"     => post("email"),
                "role"     => "user",
                "akses"    => $akses
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

        if(!$_SESSION["akses"]["comment"]){
            return unprocessResponse("You don't have access to Comment");
        }

        if(empty(post("text"))){
            return unprocessResponse('Comment is required');
        }
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

    public function ajax_action_like()
    {
        if(!$_SESSION["akses"]["like"]){
            return unprocessResponse("You don't have access to like");
        }

           $cek = $this->M_login->fetch_table("id", "t_like", "posting_id = '" . post('id') . "' AND t_like.created_by = ".$_SESSION['admin_id']." ");
            if (count($cek) > 0) {
                //delete
                $add = $this->M_login->delete_table("t_like", "posting_id", post("id"));
                $is_like = false;
            }else{
                //insert
                $data = array(
                    "posting_id" => post("id")
                );    
                $add = $this->M_login->insert_table("t_like", $data);   
                $is_like = true;
            }
            $getLikes =  $this->M_login->fetch_table("count(posting_id) as likes", "t_like","posting_id = '".post("id")."' ");
            $jumlahLike = isset($getLikes[0]->likes) ? $getLikes[0]->likes : 0;

            
            if ($add == false) {
                return unprocessResponse('Failed to save data');
            } else {
                return successResponse(["is_like"=>$is_like,"jumlah_like"=>$jumlahLike]);
            }

        

    }

    public function ajax_get_detail()
    {

        $id  = get("id");
        $joins = array(
            array(
                'table'     => 'm_user',
                'condition' => 'm_user.id = t_komentar.created_by',
                'jointype'  => '',
            )
        );
        
        $list_komen = $this->M_login->fetch_joins("t_komentar.*,m_user.username,m_user.email", "t_komentar", $joins,"posting_id = ".$id." ");

        $joins_detail = array(
            array(
                'table'     => 'm_user',
                'condition' => 'm_user.id = t_posting.created_by',
                'jointype'  => '',
            )
        );
        
        $detail_posting = $this->M_login->fetch_joins("t_posting.*,m_user.username,m_user.email", "t_posting", $joins_detail,"t_posting.id = ".$id." ");

        foreach ($list_komen as $key => $value) {
            $value->created_at = date("d-m-Y H:i:s",$value->created_at);
        }
        
        if ($detail_posting) {
            $detail_posting[0]->gambar = base_url()."/uploads/posting/".$detail_posting[0]->gambar;

            list($width, $height, $type, $attr) = getimagesize($detail_posting[0]->gambar);
            $setting["is_height"] = false;
            if($height <=700){
                $setting["is_height"] = true;
            }

            return successResponse(["detail"=>$detail_posting[0],"list_komentar"=>$list_komen,"setting"=>$setting]);
        } else {
            return unprocessResponse('Failed to get data');
        }
    }
    

    public function logout(){
        $session = array("log_session","admin_id","username");
        $this->session->unset_userdata($session);
        $this->session->sess_destroy();
        redirect("login/");
    }
}