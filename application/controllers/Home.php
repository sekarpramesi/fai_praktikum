<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session','parser'));
		$this->load->model('M_User','user');
	}

	public function index(){


		if($this->input->cookie('keepUsername',true)==strtoupper("admin")){
			$this->session->set_userdata('username',$this->input->cookie('keepUsername',true));
			redirect('Admin/index');
		}else if($this->input->cookie('keepUsername',true)!=""){
			$this->session->set_userdata('username',$this->input->cookie('keepUsername',true));
			redirect('Home/index');

		}else
		if($this->input->post('btnLogin')==true){
			redirect('Home/login');
		}
		else{
			$this->load->view('home_view');
		}		
	}
	
	public function register(){

		if($this->input->post('btnSendRegistration')){

			$data["username"]=$this->input->post('txtUsername',true);
			$data["password"]=$this->input->post('txtPassword',true);
			$data["confPassword"]=$this->input->post('txtConfPassword',true);
			$data["name"]=$this->input->post('txtName',true);
			$data["email"]=$this->input->post('txtEmail',true);

			$this->form_validation->set_rules('txtName','Name','required');
			$this->form_validation->set_rules('txtUsername','Username','required|min_length[8]|callback_checkUserReserved|callback_checkAdmin|callback_checkStartsWithLetter|callback_checkSpace');
			$this->form_validation->set_rules('txtEmail','Email','required|callback_checkEmailReserved|valid_email');
			$this->form_validation->set_rules('txtPassword','Password',
				'required|callback_checkAlphaNumeric|min_length[8]');
			$this->form_validation->set_rules('txtConfPassword','Confirm Password',
				'required|matches[txtPassword]');

			if($this->form_validation->run()==TRUE){
					$config['upload_path'] = './uploads/user/';
					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['max_size'] = 500;
		            $config['max_width'] = 1000;
		            $config['max_height'] = 1000;

					$this->load->library('upload', $config);

					$namafile = "";
					if (!$this->upload->do_upload("gbr"))
					{
						$this->session->set_flashdata("msg",$this->upload->display_errors());
					}
					else
					{
						$te = $this->upload->data();
						$namafile = $te["file_name"];

						if($this->user->insertUser($data["name"],$data["username"],$data["password"],$data["email"],$namafile)>0){
							$this->session->set_flashdata('msgSuccess','Registration successful!');
						
							redirect('Home/login');
						}
						else
							$this->session->set_flashdata("msg","Registration failed!");
					}
					redirect('Home/register');				
				
			}else{
				$this->load->view('register_view',$data);
			}

		}else if($this->input->post('btnHome')==true){
			redirect('Home/index');
		}else{

			$data["username"]="";
			$data["password"]="";
			$data["name"]="";
			$data["email"]="";
			$data["confPassword"]="";

			$this->load->view('register_view',$data);
		}		
	}


	public function login(){
		if($this->input->post('btnLogin')){
			$data["username"]=$this->input->post('txtUsername',true);
			$data["password"]=$this->input->post('txtPassword',true);
			if(strtoupper($data["username"]) == "ADMIN" && strtoupper($data["password"]) == "ADMIN"){

				$this->session->set_userdata('username',$data['username']);
				$this->session->set_userdata('name',$data['username']);
				$cookie = array('name' => 'keepUsername', 'value' => $this->session->userdata('username'), 'expire' => 60*60*24);
				$this->input->set_cookie($cookie);
				$this->session->set_flashdata('msg','Login Successful!');
				redirect('Admin/index');

			}else{
				$this->form_validation->set_rules('txtUsername','Username','required|callback_userExists|callback_userActive');
				$this->form_validation->set_rules('txtPassword','Password','required|callback_passwordCorrect');

				if($this->form_validation->run()==true){
					$search=array();
					$boleh=array();
					$this->session->set_userdata('username',$data['username']);
					$getNama=$this->user->getUserName($this->session->userdata('username'));
					$nama=$getNama[0]["NAME_USER"];
					$this->session->set_userdata('name',$nama);
					$this->session->set_userdata('searchItem',$search);
					$this->session->set_userdata('canReset',$boleh);
					$cookie = array('name' => 'keepUsername', 'value' => $this->session->userdata('username'), 'expire' => 60*60*24);
					$this->input->set_cookie($cookie);					
					$this->session->set_flashdata('msg','Login Successful!');
					redirect('User/index');
				}else
				{
					redirect('Home/login');
				}
			}
		}else if($this->input->post('btnHome')==true){
			redirect('Home/index');
		}else{
			$data["username"]="";
			$data["password"]="";
			$this->load->view('login_view',$data);
		}
	}


///form validation checker//////
	public function userExists($content){
		if($this->user->checkUserAvailable($content)){
			return true;
		}else{
			$this->session->set_flashdata('msg','This account does not exist');
			return false;
		}
	}
	public function userActive($content){
		if($this->user->checkUserActive($content)){
			return true;
		}else{
			$this->session->set_flashdata('msg','Your account is not active!');
			return false;
		}		
	}

	public function passwordCorrect(){
		 $username = $this->input->post('txtUsername');
   		 $password = $this->input->post('txtPassword');
   		if($this->userExists($username)){
			if($this->user->checkPasswordCorrect($username,$password)){
			return true;
			}else{
			$this->session->set_flashdata('msg','Invalid password!');
			return false;
			}
		}		
	}


	///registration check///
	public function checkEmailReserved($content) {
		$reserved=false;
		if($this->user->checkEmail($content)==true){
			$reserved = true;
			$this->form_validation->set_message('checkEmailReserved','Email is already registered!');
			return false;
		}else {
		 	return true; 
		}
	}
	public function checkStartsWithLetter($content){
		if(preg_match('#[a-zA-Z]#',substr($content,0,1))){
			return true;
		}
		$this->form_validation->set_message('checkStartsWithLetter','Username has to start with alphabet');
		return false;
	}
	public function checkSpace($content){
		if (!preg_match('/\s/',$content)){
			return true;
		}
		$this->form_validation->set_message('checkSpace','Username cannot contain any spaces');
		return false;
	}
	public function checkUserReserved($content) {
		$reserved = false;
		if($this->user->checkUserAvailable($content)==true){
			$reserved=true;
			$this->form_validation->set_message('checkUserReserved','Username has been registered');
			return false;
		}else
		{
			return true;
		}
	}
	
	public function checkAdmin($content){
		if(strtoupper($content) == "ADMIN"){ 
			$this->form_validation->set_message('checkAdmin',"Username can't be admin");
		} return true;
	}
	
	public function checkAlphaNumeric($content) {
		if (preg_match('#[0-9]#', $content) && preg_match('#[a-zA-Z]#', $content)) {
			return true;
		} 
		$this->form_validation->set_message('checkAlphaNumeric','Password must contain character and number');
		return false;
	}
	///end registration check///
///end form validation checker///


}


?>