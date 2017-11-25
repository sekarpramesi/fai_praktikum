<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session','cart'));
		$this->load->model('M_User','user');
	}

	public function index(){
		if($this->input->cookie('keepUsername',true)==strtoupper("admin")){
			$this->session->set_userdata('username',$this->input->cookie('keepUsername',true));
			redirect('Admin/index');
		}else if($this->input->cookie('keepUsername',true)!="admin" && $this->input->cookie('keepUsername',true)!="") {
			$this->session->set_userdata('username',$this->input->cookie('keepUsername',true));
			redirect('User/index');		
		}
		else if($this->input->cookie('keepUsername',true)==""){
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
			$this->form_validation->set_rules('txtUsername','Username','required|min_length[8]|is_unique[user.username_user]|alpha_numeric|callback_checkAdmin|callback_checkStartsWithLetter');
			$this->form_validation->set_rules('txtEmail','Email','required|is_unique[user.email_user]|valid_email');
			$this->form_validation->set_rules('txtPassword','Password',
				'required|alpha_numeric|min_length[8]|callback_checkCharAndNum');
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
						else{
							$this->session->set_flashdata("msg","Registration failed!");
						}
					}
					redirect('Home/register');				
				
			}else{
				$this->load->view('register_view',$data);
			}

		}else if($this->input->post('btnHome')==true){
			redirect('Home/index');
		}else{
			$this->load->view('register_view');
		}		
	}

//TODO[1] : Login Check
	public function login(){
		if($this->input->post('btnLogin')){
			$data["username"]=$this->input->post('txtUsername',true);
			$data["password"]=$this->input->post('txtPassword',true);

			if(strtoupper($data["username"]) == "ADMIN" && strtoupper($data["password"]) == "ADMIN"){

				$this->session->set_userdata('username',$data['username']);
				$this->session->set_userdata('name',$data['username']);
				$this->session->set_userdata('photo',"resources/user.png");
				$cookie = array('name' => 'keepUsername', 'value' => $this->session->userdata('username'), 'expire' => 60*60*24);
				$this->input->set_cookie($cookie);
				$this->session->set_flashdata('msg','Login Successful!');
				redirect('Admin/index');

			}else{
				$this->form_validation->set_rules('txtUsername','Username','required|callback_userExists|callback_userActive');
				$this->form_validation->set_rules('txtPassword','Password','required|callback_passwordCorrect');

				if($this->form_validation->run()==true){
					
					$getUser=$this->user->getUserData($data['username']);
					$nama=$getUser[0]["NAME_USER"];
					$foto=$getUser[0]["FILE_USER"];
					$credit=$getUser[0]["CREDIT_USER"];

					$this->session->set_userdata('name',$nama);
					$this->session->set_userdata('credit',$credit);
					$this->session->set_userdata('username',$data['username']);
					$this->session->set_userdata('photo','uploads/user/'.$foto);
					$cookie = array('name' => 'keepUsername', 'value' => $this->session->userdata('username'), 'expire' => 60*60*24);
					$this->input->set_cookie($cookie);

					$this->session->set_flashdata('msg','Login Successful!');
					redirect('User/index');
					//var_dump($this->session->all_userdata());
				}else
				{
					redirect('Home/login');
				}
			}
		}else if($this->input->post('btnHome')==true){
			redirect('Home/index');
		}else{
			$this->load->view('login_view');
		}
	}


///form validation checker//////
	
	public function userExists($content){
		if($this->user->getUserData($content)){
			return true;
		}else{
			//$this->session->set_flashdata('msg','This account does not exist');
			echo $this->form_validation->set_message('userExists','This account does not exist');
			return false;
		}
	}
	public function userActive($content){
		$user=$this->user->getUserData($content);
		if($user[0]["STATUS_USER"]==1){
			return true;
		}else{
			//$this->session->set_flashdata('msg','Your account is not active!');
			echo $this->form_validation->set_message('userActive','Your account is not active!');
			return false;
		}		
	}

	public function passwordCorrect(){
		 $username = $this->input->post('txtUsername');
   		 $password = $this->input->post('txtPassword');
		if($this->user->checkUser($username,$password)){
			return true;
		}else{
			//$this->session->set_flashdata('msg','Invalid password!');
			echo $this->form_validation->set_message('passwordCorrect','Invalid password!');
			return false;
		}
				
	}


	///registration check///
	public function checkCharAndNum($content) {
		if (preg_match('/\b[#A-Za-z]+[0-9]+\b/', $content)) {
			return true;
		} 
		$this->form_validation->set_message('checkCharAndNum','Password must contains character and number!');
		return false;
	}

	public function checkStartsWithLetter($content){
		if(!preg_match('/\b[#0-9]+[A-Za-z]+\b/',$content)){
			return true;
		}
		$this->form_validation->set_message('checkStartsWithLetter','Username has to start with alphabet');
		return false;
	}
	
	public function checkAdmin($content){
		if(strtoupper($content) == "ADMIN"){ 
			$this->form_validation->set_message('checkAdmin',"Username can't be admin");
		} return true;
	}
	
	///end registration check///
///end form validation checker///


}


?>