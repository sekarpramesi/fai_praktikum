<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class Home extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation');
		$this->load->model('M_Data');
	}

	public function index(){
		if($this->input->post('btnChangePassword')==true){
			$dataForm["confirmation"]="";
			$dataForm["newPassword"]="";
			$dataForm["oldPassword"]="";
			$dataForm["confPassword"]="";
			$dataForm["idUser"]=$this->input->post('idUser');
			$dataForm["nameUser"]=$this->input->post('nameUser');
			$this->load->view('change_view',$dataForm);
		}else
		if($this->input->post('btnRegister')==true){
			$dataForm["username"]="";
			$dataForm["password"]="";
			$dataForm["name"]="";
			$dataForm["email"]="";
			$dataForm["status"]="1";
			$this->load->view('register_view',$dataForm);

		}else if($this->input->post('btnLogin')==true){
			$dataForm["username"]="";
			$dataForm["password"]="";
			$this->load->view('login_view',$dataForm);

		}else if($this->input->post('btnMasterBarang')==true){
			$data["namaBarang"]="";
			$data["hargaBarang"]="";
			$data["jumlahBarang"]="";
			$objBarang=$this->M_Data->getAllBarang();
			$objUser= $this->M_Data->getAllUser();
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);	
			$this->load->view('master_barang_view',$data);

		}else if($this->input->post('btnMasterUser')==true){
			$objBarang=$this->M_Data->getAllBarang();
			$objUser= $this->M_Data->getAllUser();
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);	
			$this->load->view('master_user_view',$data);

		}else if($this->input->post('btnToggle')==true){
			$status = $this->input->post('statusUser');
			$id=$this->input->post('idUser');
			$this->M_Data->updateStatusUser($status,$id);
			$objBarang=$this->M_Data->getAllBarang();
			$objUser= $this->M_Data->getAllUser();
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);	
			$this->load->view('master_user_view',$data);
		}else if($this->input->post('btnBack')==true){
			$objBarang=$this->M_Data->getAllBarang();
			$objUser= $this->M_Data->getAllUser();
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);		
			$this->load->view('admin_view',$data);

		}else if($this->input->post('btnDelete')){
			$data["namaBarang"]="";
			$data["hargaBarang"]="";
			$data["jumlahBarang"]="";
			$id=$this->input->post('idBarang');
			$this->M_Data->deleteBarang($id);
			$objBarang=$this->M_Data->getAllBarang();
			$objUser= $this->M_Data->getAllUser();
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);	
			$this->load->view('master_barang_view',$data);			
		}else if($this->input->post('btnTambah')){
			$data["namaBarang"]=$this->input->post('txtNamaBarang');
			$data["hargaBarang"]=$this->input->post('txtHargaBarang');
			$data["jumlahBarang"]=$this->input->post('txtJumlahBarang');
			$cntId=$this->input->post('jmlData');
			$cntId+=1;
			$this->M_Data->insertBarang($cntId,$data["namaBarang"],$data["hargaBarang"],$data["jumlahBarang"]);
			$objBarang=$this->M_Data->getAllBarang();
			$objUser= $this->M_Data->getAllUser();
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);	
			$this->load->view('master_barang_view',$data);			

		}else if($this->input->post('btnEdit')){
			$data["namaBarang"]="";
			$data["hargaBarang"]="";
			$data["jumlahBarang"]="";
			$objBarang=$this->M_Data->getAllBarang();
			$objUser= $this->M_Data->getAllUser();
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);	
			$this->load->view('master_barang_view',$data);	
		}else if($this->input->post('btnLogout')==true){
			$this->load->view('home_view');
		}else if($this->input->post('btnAddComment')){
			$data["idBarang"]=$this->input->post('idBarang');
			$objComment=$this->M_Data->getAllComment($data["idBarang"]);
			$data["comment"]=json_decode(json_encode($objComment),true);
			$objUser= $this->M_Data->getAllUser();
			$objBarang=$this->M_Data->getAllBarang();
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);	
			$this->load->view('add_comment_view',$data);

		}else if($this->input->post('btnSendComment')){
			$data["idBarang"]=$this->input->post('idBarang');
			$data["idUser"]=$this->input->post('idUser');
			$data["isiComment"]=$this->input->post('isiComment');
			$data["timestamp"]=date('dd-mm-yyyy hh:mi',time());
			$cntId=$this->input->post('jmlComment');
			$cntId+=1;
			$this->M_Data->insertComment($cntId,$data["idBarang"],$data["idUser"],$data['isiComment']);
			$objComment=$this->M_Data->getAllComment($data["idBarang"]);
			$data["comment"]=json_decode(json_encode($objComment),true);
			$objUser= $this->M_Data->getAllUser();
			$objBarang=$this->M_Data->getAllBarang();
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);	
			$this->load->view('add_comment_view',$data);
			print_r($data);
		}
		else{

			$this->load->view('home_view');
		}	
	}

	public function register(){
		//TODO[1]: set_rules form validation
		$dataForm=[];
		$dataForm["dataUser"]="";
		$idUser=1;
		if($this->input->post("dataUser")==true){
			$dataForm["dataUser"]=$this->input->post("dataUser",true);
		}

		if($this->input->post('btnRegister')==true){
			$dataForm["username"]=$this->input->post('txtUsername',true);
			$dataForm["password"]=$this->input->post('txtPassword',true);
			$dataForm["name"]=$this->input->post('txtName',true);
			$dataForm["email"]=$this->input->post('txtEmail',true);
			$dataForm["status"]="1";
			$idUser+=1;

			$this->form_validation->set_rules('txtName','Name','required');
			$this->form_validation->set_rules('txtUsername','Username','required|min_length[8]|callback_checkUserReserved|callback_checkAdmin|callback_checkStartsWithLetter|callback_checkSpace');
			$this->form_validation->set_rules('txtEmail','Email','required|callback_checkEmailReserved|valid_email');
			$this->form_validation->set_rules('txtPassword','Password',
				'required|callback_checkAlphaNumeric|min_length[8]');
			$this->form_validation->set_rules('txtConfPassword','Confirm Password',
				'required|matches[txtPassword]');

			if($this->form_validation->run()==TRUE){
				$this->M_Data->insertUser($idUser,$dataForm["name"],$dataForm["username"],$dataForm["password"],$dataForm["email"]);
			}$this->load->view('register_view',$dataForm);
		}else if($this->input->post('btnHome')==true){
			$this->load->view('home_view');
		}
		
	}
	public function changePassword(){
			$dataForm["newPassword"]=$this->input->post('txtNewPassword',true);
			$dataForm["oldPassword"]=$this->input->post('txtOldPassword',true);
			$dataForm["confPassword"]=$this->input->post('txtConfPassword',true);
			$dataForm["idUser"]=$this->input->post('idUser',true);
			$dataForm["nameUser"]=$this->input->post('nameUser',true);
			$dataForm["confirmation"]="";
		if($this->input->post('btnChange')){
			$this->form_validation->set_rules('txtOldPassword','Old Password',
				'required|callback_passwordCorrect');
			$this->form_validation->set_rules('txtNewPassword','New Password',
				'required|callback_checkAlphaNumeric|min_length[8]');
			$this->form_validation->set_rules('txtConfPassword','Confirm Password',
				'required|matches[txtNewPassword]');
			if($this->form_validation->run()==TRUE){
				$this->M_Data->updatePasswordUser($dataForm["idUser"],$dataForm["newPassword"]);
				$dataForm["confirmation"]="Password berhasil diubah";
				$objUser= $this->M_Data->getUser($dataForm["nameUser"],$dataForm["newPassword"]);
				$objBarang=$this->M_Data->getAllBarang();
				$dataForm["user"]=json_decode(json_encode($objUser),true);
				$dataForm["barang"]=json_decode(json_encode($objBarang),true);
				$this->load->view('user_view',$dataForm);
			}else{
				$this->load->view('change_view',$dataForm);
			}


		}
	}
	public function login(){
		if($this->input->post('btnLogin')){
			$userExists=false;
			$dataForm["username"]=$this->input->post('txtUsername',true);
			$dataForm["password"]=$this->input->post('txtPassword',true);
			if(strtoupper($dataForm["username"]) == "ADMIN" && strtoupper($dataForm["password"]) == "ADMIN"){
				$objBarang=$this->M_Data->getAllBarang();
				$objUser= $this->M_Data->getAllUser();
				$data["user"]=json_decode(json_encode($objUser),true);
				$data["barang"]=json_decode(json_encode($objBarang),true);				
				$this->load->view('admin_view',$data);
			}else{

				if($this->form_validation->set_rules('txtUsername','Username','required|callback_userExists|callback_userActive')){
					$userExists = true;
				}
				$this->form_validation->set_rules('txtPassword','Password','required|callback_passwordCorrect');

				if($this->form_validation->run()==FALSE)
				{
					$this->load->view('login_view',$dataForm);
				}else
				{
					$username=$this->input->post('txtUsername',true);
					$password=$this->input->post('txtPassword',true);
					$objUser= $this->M_Data->getUser($username,$password);
					$objBarang=$this->M_Data->getAllBarang();
					$data["user"]=json_decode(json_encode($objUser),true);
					$data["barang"]=json_decode(json_encode($objBarang),true);
					$data["newPassword"]=$this->input->post('txtNewPassword',true);
					$data["oldPassword"]=$this->input->post('txtOldPassword',true);
					$data["confPassword"]=$this->input->post('txtConfPassword',true);
					$data["idUser"]=$this->input->post('idUser',true);
					$data["nameUser"]=$this->input->post('nameUser',true);
					$data["confirmation"]="";
					$this->load->view('user_view',$data);
				}
			}
		}

	}


///form validation checker//////
	public function userExists($content){
		if($this->M_Data->checkUserAvailable($content)){
			return true;
		}else{
			$this->form_validation->set_message('userExists','This account does not exist');
			return false;
		}
	}
	public function userActive($content){
		if($this->M_Data->checkUserActive($content)){
			return true;
		}else{
			$this->form_validation->set_message('userActive','Your account is not active!');
			return false;
		}		
	}

	public function passwordCorrect($contents){
		if($this->M_Data->checkPasswordCorrect($contents)){
			return true;
		}else{
			$this->form_validation->set_message('passwordCorrect','Invalid password');
			return false;
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
///end form validation checker///
}


?>