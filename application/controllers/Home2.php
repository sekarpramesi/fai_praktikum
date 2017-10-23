<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class Home extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index(){
		$dataForm=[];
		$dataForm["dataUser"]="";

		if($this->input->post('dataUser')==true){
			$dataForm["dataUser"]=$this->input->post('dataUser',true);
		}


		if($this->input->post('btnRegister')==true){

			$dataForm["username"]="";
			$dataForm["password"]="";
			$dataForm["name"]="";
			$dataForm["email"]="";
			$dataForm["status"]="";
			$this->load->view('register_view',$dataForm);

		}else if($this->input->post('btnLogin')==true){

			$dataForm["username"]="";
			$dataForm["password"]="";
			$this->load->view('login_view',$dataForm);

		}else if($this->input->post('btnMasterBarang')==true){

			$this->load->view('master_barang_view',$dataForm);

		}else if($this->input->post('btnMasterUser')==true){
			$this->load->view('master_user_view',$dataForm);

		}else if($this->input->post('btnBack')==true){

			$this->load->view('admin_view',$dataForm);

		}else if($this->input->post('btnLogout')==true){
			$this->load->view('home_view',$dataForm);
		}else{

			$this->load->view('home_view',$dataForm);
		}	
	}

	public function fillUsers(){
		$dataForm=[];
		$dataForm["dataUser"]="";
		$dataForm["username"]="";
		$dataForm["password"]="";
		$dataForm["name"]="";
		$dataForm["email"]="";
		$dataForm["status"]="";

		if($this->input->post('dataUser') == true){
			$dataform["datauser"] = $this->input->post('datauser',true);
			$data=explode("_",$dataForm["dataUser"]);
		}

	}
	public function register(){
		//TODO[1]: set_rules form validation
		$dataForm=[];
		$dataForm["dataUser"]="";

		if($this->input->post("dataUser")==true){
			$dataForm["dataUser"]=$this->input->post("dataUser",true);
		}

		if($this->input->post('btnRegister')==true){
			$dataForm["username"]=$this->input->post('txtUsername',true);
			$dataForm["password"]=$this->input->post('txtPassword',true);
			$dataForm["name"]=$this->input->post('txtName',true);
			$dataForm["email"]=$this->input->post('txtEmail',true);
			$dataForm["status"]="aktif";

			$this->form_validation->set_rules('txtName','Name','required');
			$this->form_validation->set_rules('txtUsername','Username','required|min_length[8]|callback_checkUserReserved|callback_checkAdmin|callback_checkStartsWithLetter|callback_checkSpace');
			$this->form_validation->set_rules('txtEmail','Email','required|callback_checkEmailReserved|valid_email');
			$this->form_validation->set_rules('txtPassword','Password',
				'required|callback_checkAlphaNumeric|min_length[8]');
			$this->form_validation->set_rules('txtConfPassword','Confirm Password',
				'required|matches[txtPassword]');

			if($this->form_validation->run()==TRUE){
				echo "<script>alert('REGISTER SUCCESS');</script>";
				$dataForm["dataUser"].=$dataForm["username"].'-'.$dataForm["password"].'-'.$dataForm["status"].'-'.$dataForm["name"].'-'.$dataForm["email"].'_';
			}$this->load->view('register_view',$dataForm);
		}else if($this->input->post('btnHome')==true){
			$this->load->view('home_view',$dataForm);
		}/*else{
			dataForm["username"]="";
			dataForm["password"]="";
			$dataForm["name"]="";
			$dataForm["email"]="";
		}*/
		
	}

	public function login(){
		$dataForm=[];
		$error="";
		$dataForm["dataUser"]="";

		if($this->input->post("dataUser")==true){
			$dataForm["dataUser"]=$this->input->post("dataUser",true);
		}

		if($this->input->post('btnLogin')==true){
			$data = explode("_",$dataForm["dataUser"]);
			$dataForm["username"]=$this->input->post('txtUsername',true);
			$dataForm["password"]=$this->input->post('txtPassword',true);
			$valid = false;

			foreach($data as $r){
				echo $r;
				$user = explode("-",$r);
				//check existing user
				if($user[0]==$dataForm["username"]&& $user[1]==$dataForm["password"]){
					if($user[2]=="pasif"){
						$error="akun anda diblokir";
					}
					else{
						$valid=true;
						$dataForm["name"]=$user[3];
					}
					
				}else if(strtoupper($dataForm["username"])=="ADMIN" && 
					strtoupper($dataForm["password"])=="ADMIN"){
					$valid = true;
				}else{
					$error="akun tidak ditemukan atau password/username tidak cocok";
				}
			}
			if($valid){
				if(strtoupper($dataForm["username"])=="ADMIN"){
					$this->load->view('admin_view',$dataForm);
				}else{
					$this->load->view('user_view',$dataForm);
				}
			}else{
				echo $error;
				$this->load->view('login_view',$dataForm);
			}
		}
	}

	public function checkEmailReserved($content) {
		if($this->input->post('dataUser') == false){ return true; } 
		else{
			$reserved= false; $user = explode('_', $this->input->post('dataUser',true));
			for($i=0; $i<count($user)-1; $i++){
				$theUser = explode('-',$user[$i]);
				if($theUser[4] == $content){ $reserved = true; }
			}
		}
		
		if($reserved){
			$this->form_validation->set_message('checkEmailReserved','Email has been registered');
			return false;
		} else { return true; }
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
		if($this->input->post('dataUser') == false){ return true; } 
		else{
			$reserved= false; $user = explode('_', $this->input->post('dataUser',true));
			for($i=0; $i<count($user)-1; $i++){
				$theUser = explode('-',$user[$i]);
				if($theUser[0] == $content){ $reserved = true; }
			}
		}
		
		if($reserved){
			$this->form_validation->set_message('checkUserReserved','Username has been registered');
			return false;
		} else { return true; }
	}
	
	public function checkAdmin($content){
		if(strtoupper($content) == "ADMIN"){ 
			$this->form_validation->set_message('checkAdmin',"Username can't be admin");
			return false;
		} return true;
	}
	
	public function checkAlphaNumeric($content) {
		if (preg_match('#[0-9]#', $content) && preg_match('#[a-zA-Z]#', $content)) {
			return true;
		} 
		$this->form_validation->set_message('checkAlphaNumeric','Password must contain character and number');
		return false;
	}
}


?>