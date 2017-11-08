<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session'));
		$models=array(
			'M_User'=>'user',
			'M_Barang'=>'barang',
			'M_Iklan'=>'iklan'
		);
		$this->load->model($models);
	}

	public function index(){
		if($this->input->post('btnBackUser')==true){
			redirect('User/index');
		}
		else if($this->input->post('btnLogout')==true){
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('idBarang');
			$this->session->unset_userdata('namaBarang');
			$this->session->unset_userdata('searchItem');
			$this->session->unset_userdata('canReset');
			$this->session->unset_userdata('is_searched');
			delete_cookie('keepUsername');
			redirect('Home/index');
		}else if($this->input->post('btnChangePassword')){
			redirect('User/changePassword');
		}else if($this->input->post('btnContactUs')){
			redirect('Contact/index');
		}
		else{
			$flag = -1;
			$history=$this->session->userdata('searchItem');
			$count=sizeof($history);
			if($count>0){
				for ($i = 0; $i <count($history); $i++) {
				    if($this->input->cookie($history[$i],true)==""){
				    	echo "hilang";
				    	$flag = $i;
				    }
				}

				if($flag>=0){
					delete_cookie($history[$flag]);
					array_splice($history,$flag,1);
				}
			}

			$this->session->set_userdata('searchItem',$history);

			$data['reset']=$this->session->userdata('canReset');
			$data['fill']=$this->session->userdata('searchItem');
			$data['newfill']=json_decode(json_encode($data['fill']),true);
			$data['user']=$this->user->getUserName($this->session->userdata('username'));
			$data['barang']=$this->barang->getAllBarang();
			$data['hotBarang']=$this->barang->getHotBarang();
			$data['iklan']=$this->iklan->getAllIklan();
			$this->load->view('user_view',$data);
		}
	}
	public function autocomplete(){
		$data["fill"]=$this->session->userdata('searchItem');

	}
	public function changePassword(){
		if($this->input->post('btnChange')){

			$data["newPassword"]=$this->input->post('txtOldPassword');
			$data["oldPassword"]=$this->input->post('txtNewPassword');
			$data["confPassword"]=$this->input->post('txtConfPassword');

			$this->form_validation->set_rules('txtOldPassword','Old Password',
				'required|callback_changePasswordCorrect');
			$this->form_validation->set_rules('txtNewPassword','New Password',
				'required|callback_checkAlphaNumeric|min_length[8]');
			$this->form_validation->set_rules('txtConfPassword','Confirm Password',
				'required|matches[txtNewPassword]');

			if($this->form_validation->run()==TRUE){
				$this->user->updatePasswordUser($this->session->userdata('username'),$data["newPassword"]);
				$this->session->set_flashdata("msg","Password berhasil diubah");
				redirect('User/index');
			}else{
				$data["newPassword"]="";
				$data["oldPassword"]="";
				$data["confPassword"]="";
				$data["user"]=$this->user->getUserName($this->session->userdata('username'));	
				$this->load->view('change_view',$data);
			}

		}else{
				$data["newPassword"]="";
				$data["oldPassword"]="";
				$data["confPassword"]="";
				$data["user"]=$this->user->getUserName($this->session->userdata('username'));	
				$this->load->view('change_view',$data);
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

	public function checkAlphaNumeric($content) {
		if (preg_match('#[0-9]#', $content) && preg_match('#[a-zA-Z]#', $content)) {
			return true;
		} 
		$this->form_validation->set_message('checkAlphaNumeric','Password must contain character and number');
		return false;
	}
	///change password///

}

?>