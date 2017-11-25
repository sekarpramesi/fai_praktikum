<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class User extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session','pagination','cart'));
		$models=array(
			'M_User'=>'user',
			'M_Barang'=>'barang',
			'M_Iklan'=>'iklan'
		);
		$this->load->model($models);
	}

	public function index(){
		if($this->input->cookie('keepUsername',true)==strtoupper("admin")){
			$this->session->set_userdata('username',$this->input->cookie('keepUsername',true));
			redirect('Admin/index');
		}else if($this->input->cookie('keepUsername',true)!="admin" && $this->input->cookie('keepUsername',true)!="") {
			$this->session->set_userdata('username',$this->input->cookie('keepUsername',true));
		$data['user']=$this->user->getUserData($this->session->userdata('username'));
		$data['hotBarang']=$this->barang->getHotBarang();
		$data["iklan"]=$this->iklan->getAllIklan();

		$data['container']=array("user/main/user_hot_items","user/main/user_iklan_baris");
		$data['templateData']=array(
			"title"=>"Home",
			"description"=>"Lihat Hot Items dan Iklan"
		);
		$this->load->view('template/template',$data);
		}
		else if($this->input->cookie('keepUsername',true)==""){
			$this->load->view('home_view');
		}else{
				$this->session->set_userdata('username',$this->input->cookie('keepUsername',true));
		$data['user']=$this->user->getUserData($this->session->userdata('username'));
		$data['hotBarang']=$this->barang->getHotBarang();
		$data["iklan"]=$this->iklan->getAllIklan();

		$data['container']=array("user/main/user_hot_items","user/main/user_iklan_baris");
		$data['templateData']=array(
			"title"=>"Home",
			"description"=>"Lihat Hot Items dan Iklan"
		);
		$this->load->view('template/template',$data);		
		}	

	}

	public function Logout(){
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('photo');
		$this->session->unset_userdata('credit');
		$this->cart->destroy();
		delete_cookie('keepUsername');
		redirect('Home/index');
	}

	//TODO[2] Change password user
	public function changePassword(){
		if($this->input->post('btnChange')){

			$data["newPassword"]=$this->input->post('txtOldPassword');
			$data["oldPassword"]=$this->input->post('txtNewPassword');
			$data["confPassword"]=$this->input->post('txtConfPassword');

			$this->form_validation->set_rules('txtOldPassword','Old Password',
				'required|callback_changePasswordCorrect');
			$this->form_validation->set_rules('txtNewPassword','New Password',
				'required|alpha_numeric|min_length[8]');
			$this->form_validation->set_rules('txtConfPassword','Confirm Password',
				'required|matches[txtNewPassword]');

			if($this->form_validation->run()==TRUE){
				$this->user->updatePasswordUser($this->session->userdata('username'),$data["newPassword"]);
				$this->session->set_flashdata("msgSuccess","Password berhasil diubah");
				redirect('User/index');
			}else{
				$data["newPassword"]="";
				$data["oldPassword"]="";
				$data["confPassword"]="";
				$data["user"]=$this->user->getUserData($this->session->userdata('username'));	
				$data['container']=array("change_view");
				$data['templateData']=array(
					"title"=>"Ganti Password",
					"description"=>"Ganti password anda",
				);
				$this->session->set_flashdata("msg","Gagal mengubah password!");
				$this->load->view('template/template',$data);
			}

		}else{
				$data["newPassword"]="";
				$data["oldPassword"]="";
				$data["confPassword"]="";
				$data["user"]=$this->user->getUserData($this->session->userdata('username'));	
				$data['container']=array("change_view");
				$data['templateData']=array(
				"title"=>"Ganti Password",
				"description"=>"Ganti password anda"
			);
			$this->load->view('template/template',$data);
		}
	}
	
	///change password///
	public function changePasswordCorrect(){
		$username = $this->session->userdata('username');
		$password = $this->input->post('txtOldPassword');
		if($this->user->checkPasswordCorrect($username,$password)){
			return true;
		}else{
			$this->form_validation->set_message('changePasswordCorrect','Invalid password');
			return false;
		}	
	}
	///change password///

}

?>