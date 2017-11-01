<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class Home extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation');
		$this->load->model('M_Data');
	}

	public $passwordAdmin="admin";

	public function setPasswordAdmin($password){
		$this->passwordAdmin=$password;
	}

	public function getPasswordAdmin(){
		return $this->passwordAdmin;
	}

	public function index(){
		if($this->input->post('btnChangePassword')==true){
			$dataForm["confirmation"]="";
			$dataForm["newPassword"]="";
			$dataForm["oldPassword"]="";
			$dataForm["confPassword"]="";
			$dataForm["idUser"]=$this->input->post('idUser');
			$dataForm["nameUser"]=$this->input->post('nameUser');
			$objUser= $this->M_Data->getUserName($dataForm["nameUser"]);
			$dataForm["user"]=json_decode(json_encode($objUser),true);
			$this->load->view('change_view',$dataForm);
		}else
		if($this->input->post('btnRegister')==true){
			$dataForm["username"]="";
			$dataForm["password"]="";
			$dataForm["name"]="";
			$dataForm["email"]="";
			$dataForm["confPassword"]="";
			$dataForm["status"]="1";
			$this->load->view('register_view',$dataForm);

		}else if($this->input->post('btnLogin')==true){
			$dataForm["username"]="";
			$dataForm["password"]="";
			$this->load->view('login_view',$dataForm);

		}
		else if($this->input->post('btnBack')==true){
			$objBarang=$this->M_Data->getAllBarang();
			$objUser= $this->M_Data->getAllUser();
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);		
			$this->load->view('admin_view',$data);
		}else if($this->input->post('btnBackUser')==true){
			$data["idUser"]=$this->input->post('idUser',true);
			$data["nameUser"]=$this->input->post('nameUser',true);
			$objUser= $this->M_Data->getUserName($data["nameUser"]);
			$objBarang=$this->M_Data->getAllBarang();
			$objHotBarang=$this->M_Data->getHotBarang();
			$objIklan=$this->M_Data->getAllIklan();
			$data["iklan"]=json_decode(json_encode($objIklan),true);
			$data["hotBarang"]=json_decode(json_encode($objHotBarang),true);
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);
			$data["newPassword"]=$this->input->post('txtNewPassword',true);
			$data["oldPassword"]=$this->input->post('txtOldPassword',true);
			$data["confPassword"]=$this->input->post('txtConfPassword',true);
			$data["confirmation"]="";
			$this->load->view('user_view',$data);			
		}
		else if($this->input->post('btnLogout')==true){
			$objBarang=$this->M_Data->getHotBarang();
			$objIklan=$this->M_Data->getAllIklan();
			$data["user"]="";
			$data["iklan"]=json_decode(json_encode($objIklan),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);
			$this->load->view('home_view',$data);

		}else{
			$objBarang=$this->M_Data->getHotBarang();
			$objIklan=$this->M_Data->getAllIklan();
			$data["user"]="";
			$data["iklan"]=json_decode(json_encode($objIklan),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);
			$this->load->view('home_view',$data);
		}			
	}
	public function contact(){
		if($this->input->post('btnContactUs')==true){
			$data["idUser"]=$this->input->post('idUser',true);
			$data["nameUser"]=$this->input->post('nameUser',true);
			$data["nama"]=$this->input->post('nama',true);
			$data["subjectContact"]="";
			$data["isiContact"]="";
			$objUser= $this->M_Data->getUserName($data["nameUser"]);
			$data["user"]=json_decode(json_encode($objUser),true);
			$this->load->view("add_contact_view",$data);

		}else if($this->input->post('btnSendContact')==true){
			$data["nameUser"]=$this->input->post('nameUser');
			$data["idUser"]=$this->input->post('idUser');
			$data["nama"]=$this->input->post('nama',true);
			$data["subjectContact"]=$this->input->post('subjectContact');
			$data["isiContact"]=$this->input->post('isiContact');
			$objUser= $this->M_Data->getUserName($data["nameUser"]);
			$data["user"]=json_decode(json_encode($objUser),true);
			$this->M_Data->sendContact($data["idUser"],$data["subjectContact"],$data["isiContact"]);
			$this->load->view("add_contact_view",$data);			
		}
	}

	public function admin(){
		if($this->input->post('btnMasterBarang')==true){
			$data["namaBarang"]="";
			$data["hargaBarang"]="";
			$data["jumlahBarang"]="";

			$objBarang=$this->M_Data->getAllBarang();
			$objUser= $this->M_Data->getAllUser();

			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);
			$data["comment"]="";
			$this->load->view('master_barang_view',$data);

		}else if($this->input->post('btnMasterUser')==true){
			$data["statusUser"] = "";
			$data["idUser"]="";
			$datá["selected"]="";
			$data["nominal"]=$this->input->post("nominal");
			$data["option"] = array(
     			'Rp.10.000,-' => 10000,
     			'Rp.25.000,-' => 25000,
     			'Rp.50.000,-' => 50000
			);
			$objUser= $this->M_Data->getAllUser();

			$data["user"]=json_decode(json_encode($objUser),true);
			$this->load->view('master_user_view',$data);

		}else if($this->input->post('btnMasterContact')==true){
			$objContact=$this->M_Data->getAllContactUs();
			$data["contact"]=json_decode(json_encode($objContact),true);
			$this->load->view('master_contact_view',$data);

		}else if($this->input->post('btnToggle')==true){
			$data["selected"]="";
			$data["option"] = array(
     			'Rp.10.000,-' => 10000,
     			'Rp.25.000,-' => 25000,
     			'Rp.50.000,-' => 50000
			);
			$status = $this->input->post('statusUser');
			$id=$this->input->post('idUser');
			$this->M_Data->updateStatusUser($status,$id);
			$objUser= $this->M_Data->getAllUser();
			$data["user"]=json_decode(json_encode($objUser),true);
			$this->load->view('master_user_view',$data);

		}else if($this->input->post('btnMasterIklan')==true){
			$data["judulIklan"]="";
			$data["isiIklan"]="";

			$objIklan = $this->M_Data->getAllIklan();

			$data["iklan"]=json_decode(json_encode($objIklan),true);
			$this->load->view("master_iklan_view",$data);

		}else if($this->input->post('btnCredit')==true){
			$data["statusUser"] = "";
			$data["option"] = array(
     			'Rp.10.000,-' => 10000,
     			'Rp.25.000,-' => 25000,
     			'Rp.50.000,-' => 50000
			);
			$data["idUser"]=$this->input->post("idUser");
			$data["nominal"]=$this->input->post("nominal");
			$data["selected"]=$this->input->post("selected");
			$this->M_Data->addUserCredit($data["idUser"],$data["option"]);

			$objUser= $this->M_Data->getAllUser();
			$data["txtNominalCredit"]="";
			$data["user"]=json_decode(json_encode($objUser),true);	
			$this->load->view('master_user_view',$data);

		}else if($this->input->post('btnHotToggle')==true){
			$data["selected"]="";
			$data["option"] = array(
     			'Rp.10.000,-' => 10000,
     			'Rp.25.000,-' => 25000,
     			'Rp.50.000,-' => 50000
			);
			$status = $this->input->post('hotBarang');
			$id=$this->input->post('idBarang');
			$this->M_Data->toggleHot($id,$status);
			$data["namaBarang"]="";
			$data["hargaBarang"]="";
			$data["jumlahBarang"]="";

			$objBarang=$this->M_Data->getAllBarang();
			$objUser= $this->M_Data->getAllUser();

			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);
			$data["comment"]="";
			$this->load->view('master_barang_view',$data);			
		} 	
	}
	public function iklan(){
		if($this->input->post('btnPasang')){
			$data["judulIklan"]=$this->input->post('txtJudulIklan');
			$data["isiIklan"]=$this->input->post('txtIsiIklan');
			$this->M_Data->sendIklan($data["judulIklan"],$data["isiIklan"]);
			
			$objIklan = $this->M_Data->getAllIklan();

			$data["iklan"]=json_decode(json_encode($objIklan),true);
			$this->load->view("master_iklan_view",$data);
		}else if($this->input->post('btnDelete')){
			$data["judulIklan"]="";
			$data["isiIklan"]="";
			$data["idIklan"]=$this->input->post('idIklan');
			$this->M_Data->deleteIklan($data["idIklan"]);
			$objIklan = $this->M_Data->getAllIklan();

			$data["iklan"]=json_decode(json_encode($objIklan),true);
			$this->load->view("master_iklan_view",$data);
					
		}else if($this->input->post('btnEdit')==true){
			$data["judulIklan"]="";
			$data["isiIklan"]="";
			$data["idIklan"]=$this->input->post('idIklan');
			$this->load->view("edit_iklan_view",$data);
		}
		else if($this->input->post('btnGantiIklan')==true){
			$data["judulIklan"]=$this->input->post('judulIklan');
			$data["isiIklan"]=$this->input->post('isiIklan');
			$data["idIklan"]=$this->input->post('idIklan');
			$this->M_Data->updateIklan($data["idIklan"],$data["judulIklan"],$data["isiIklan"]);
			$objIklan = $this->M_Data->getAllIklan();

			$data["iklan"]=json_decode(json_encode($objIklan),true);
			$this->load->view("master_iklan_view",$data);				
		}
	}
	public function barang(){
		if($this->input->post('btnDelete')){
			$data["namaBarang"]="";
			$data["hargaBarang"]="";
			$data["jumlahBarang"]="";
			$data["comment"]="";
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
			$data["comment"]="";
			$this->M_Data->insertBarang($data["namaBarang"],$data["hargaBarang"],$data["jumlahBarang"]);
			$objBarang=$this->M_Data->getAllBarang();
			$objUser= $this->M_Data->getAllUser();
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);	
			$this->load->view('master_barang_view',$data);			

		}else if($this->input->post('btnEdit')){//TODO!!!
			$data["namaBarang"]="";
			$data["hargaBarang"]="";
			$data["jumlahBarang"]="";
			$data["comment"]="";
			$objBarang=$this->M_Data->getAllBarang();
			$objUser= $this->M_Data->getAllUser();
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);	
			$this->load->view('master_barang_view',$data);	
		}else if($this->input->post('btnFilter')){
		}
	}

	public function comment(){
		if($this->input->post('btnAddComment')){
			$data["idUser"]=$this->input->post('idUser',true);
			$data["nameUser"]=$this->input->post('nameUser',true);
			$data["idBarang"]=$this->input->post('idBarang');
			$data["nama"]=$this->input->post('nama',true);
			$objComment=$this->M_Data->getAllComment($data["idBarang"]);
			$data["comment"]=json_decode(json_encode($objComment),true);
			$objUser= $this->M_Data->getUserName($data["nameUser"]);
			$objBarang=$this->M_Data->getAllBarang();
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);	
			$this->load->view('add_comment_view',$data);

		}else if($this->input->post('btnSendComment')){
			$data["nameUser"]=$this->input->post('nameUser',true);
			$data["nama"]=$this->input->post('nama',true);
			$data["idBarang"]=$this->input->post('idBarang');
			$data["idUser"]=$this->input->post('idUser');
			$data["isiComment"]=$this->input->post('isiComment');
			$data["timestamp"]=date('dd-mm-yyyy hh:mi',time());
			$this->M_Data->insertComment($data["idBarang"],$data["idUser"],$data['isiComment']);
			$objComment=$this->M_Data->getAllComment($data["idBarang"]);
			$data["comment"]=json_decode(json_encode($objComment),true);
			$objUser= $this->M_Data->getAllUser();
			$objBarang=$this->M_Data->getAllBarang();
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);	
			$this->load->view('add_comment_view',$data);
		}else if($this->input->post('btnViewComment')){

			$data["namaBarang"]="";
			$data["hargaBarang"]="";
			$data["jumlahBarang"]="";
			$data["idBarang"] = $this->input->post('idBarang');

			$objBarang=$this->M_Data->getAllBarang();
			$objUser= $this->M_Data->getAllUser();
			$objComment=$this->M_Data->getAllComment($data["idBarang"]);
			$data["nama"]=$this->input->post('nama',true);
			$data["user"]=json_decode(json_encode($objUser),true);
			$data["barang"]=json_decode(json_encode($objBarang),true);
			$data["comment"]=json_decode(json_encode($objComment),true);

			$this->load->view('master_barang_view',$data);
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

		if($this->input->post('btnSendRegistration')==true){
			$dataForm["username"]=$this->input->post('txtUsername',true);
			$dataForm["password"]=$this->input->post('txtPassword',true);
			$dataForm["confPassword"]=$this->input->post('txtConfPassword',true);
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
				$this->M_Data->insertUser($dataForm["name"],$dataForm["username"],$dataForm["password"],$dataForm["email"]);
			}else{
				$dataForm["username"]="";
				$dataForm["password"]="";
				$dataForm["name"]="";
				$dataForm["email"]="";
				$dataForm["confPassword"]="";
				$dataForm["status"]="1";
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
				'required|callback_changePasswordCorrect');
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
				$dataForm["newPassword"]="";
				$dataForm["oldPassword"]="";
				$dataForm["confPassword"]="";
				$dataForm["idUser"]=$this->input->post('idUser',true);
				$dataForm["nameUser"]=$this->input->post('nameUser',true);
				$dataForm["confirmation"]="";
				$objUser= $this->M_Data->getUserName($dataForm["nameUser"]);
				$dataForm["user"]=json_decode(json_encode($objUser),true);
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
					$data["statusUser"] = "";
					$data["option"] = array(
		     			'Rp.10.000,-' => 10000,
		     			'Rp.25.000,-' => 25000,
		     			'Rp.50.000,-' => 50000
					);
					$data["idUser"]=$this->input->post("idUser");
					$data["nominal"]="";
					$data["selected"]="";
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
					$objHotBarang=$this->M_Data->getHotBarang();
					$objIklan=$this->M_Data->getAllIklan();

					$data["user"]=json_decode(json_encode($objUser),true);
					$data["barang"]=json_decode(json_encode($objBarang),true);
					$data["iklan"]=json_decode(json_encode($objIklan),true);
					$data["hotBarang"]=json_decode(json_encode($objHotBarang),true);
					$data["newPassword"]=$this->input->post('txtNewPassword',true);
					$data["oldPassword"]=$this->input->post('txtOldPassword',true);
					$data["confPassword"]=$this->input->post('txtConfPassword',true);
					$data["idUser"]=$this->input->post('idUser',true);
					$data["nameUser"]=$this->input->post('nameUser',true);
					$data["nama"]=$this->input->post('nama',true);
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

	public function changePasswordCorrect(){
		 $username = $this->input->post('nameUser');
   		 $password = $this->input->post('txtOldPassword');
		if($this->userExists($username)){
			if($this->M_Data->checkPasswordCorrect($username,$password)){
				return true;
			}else{
				$this->form_validation->set_message('changePasswordCorrect','Invalid password');
				return false;
			}
		}		
	}
	public function passwordCorrect(){
		 $username = $this->input->post('txtUsername');
   		 $password = $this->input->post('txtPassword');
   		if($this->userExists($username)){
			if($this->M_Data->checkPasswordCorrect($username,$password)){
			return true;
			}else{
			$this->form_validation->set_message('passwordCorrect','Invalid password');
			return false;
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
///end form validation checker///
}


?>