<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session','pagination','cart'));
		$models=array(
			'M_User'=>'user',
			'M_Barang'=>'barang',
			'M_Iklan'=>'iklan',
			'M_Transaction'=>'trans'
		);
		$this->load->model($models);
	}
	public function getConfig($entity){
		$config=array(
			'upload_path'=>'./uploads/user/',
			'allowed_types'=>'jpeg|jpg|png',
			'max_size'=>'500',
			'max_width'=>'1000',
			'max_height'=>'1000'
		);
		return $config;
	}
	public function index(){
		if($this->input->cookie('keepUsername',true)==strtoupper("admin")){
			$this->session->set_userdata('username',$this->input->cookie('keepUsername',true));
			$data['container']=array("admin/admin_home");
			$data['templateData']=array(
				"title"=>"Admin Panel",
				"description"=>"Atur semuanya"
			);
			$this->load->view('template/template_admin',$data);
		}else if($this->input->cookie('keepUsername',true)!="admin" && $this->input->cookie('keepUsername',true)!="") {
			$this->session->set_userdata('username',$this->input->cookie('keepUsername',true));
			redirect('User/index');
		}
		else if($this->input->cookie('keepUsername',true)==""){
			$this->load->view('home_view');
		}else{
		$data['container']=array("admin/admin_home");
		$data['templateData']=array(
			"title"=>"Admin Panel",
			"description"=>"Atur semuanya"
		);
		$this->load->view('template/template_admin',$data);
		}	

	}
	public function Logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('idBarang');
		$this->session->unset_userdata('namaBarang');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('credit');
		delete_cookie('keepUsername');
		redirect('Home/index');
	}
	public function masterUser(){
			$data['container']=array("admin/masterUser/master_user_view","admin/masterUser/topup_log_view");
			$data['templateData']=array(
				"title"=>"Daftar User",
				"description"=>"Kelola user"
			);
			$data["topup"]=$this->trans->getAllTopupLog();
			$data["user"]=$this->user->getAllUser();
			$this->load->view('template/template_admin',$data);		
	}

	public function toggleStatusUser(){
		$post=$this->input->post();
		if(isset($post["btnToggle"])){
			$idUser=$post["idUser"];
			$statusUser=$post["statusUser"];
			$this->user->updateUser($idUser,'status',$statusUser);
			redirect('Admin/masterUser');
		}		
	}
	public function addCreditUser(){
		$post=$this->input->post();
		if(isset($post["btnAdd"])){
			$data['container']=array("admin/masterUser/master_user_view","admin/masterUser/add_credit_user_view");
			$data['templateData']=array(
				"title"=>"Daftar User",
				"description"=>"Kelola user"
			);
			$data["idUser"]=$post["idUser"];
			$data["nameUser"]=$post["nameUser"];
			$data["user"]=$this->user->getAllUser();
			$this->load->view('template/template_admin',$data);

		}else if(isset($post["btnAddCredit"])){
			$idUser=$post["idUser"];
			$credit=$post["nominalCredit"];
			$data["user"]=$this->user->getUserData($idUser);
			$userCredit=$data["user"][0]["CREDIT_USER"];
			$userCredit+=$credit;
			if($this->user->updateUser($idUser,'credit',$userCredit)>0  && $this->trans->genTopupLog($idUser,$credit)>0){
				$this->session->set_flashdata("msgSuccess","Berhasil!");
				redirect('Admin/masterUser');
			}else{
				$this->session->set_flashdata("msg","Gagal Update");
				$data['container']=array("admin/masterUser/master_user_view","admin/masterUser/add_credit_user_view");
				$data['templateData']=array(
					"title"=>"Daftar User",
					"description"=>"Kelola user"
				);
				$data["idUser"]=$post["idUser"];
				$data["nameUser"]=$post["nameUser"];
				$data["user"]=$this->user->getAllUser();
				$this->load->view('template/template_admin',$data);
			}
		}
	}
	public function editPicUser(){
		$post=$this->input->post();
		if(isset($post["btnEditGambar"])){
			$config["upload_path"]='./uploads/user/';
			$config["allowed_types"]="jpg|jpeg|png";
			$config["max_height"]=1000;
			$config["max_width"]=1000;
			$config["max_size"]=500;
			$this->load->library('upload', $config);

			$namafile = "";
			if(! $this->upload->do_upload("gbr")){
			$this->session->set_flashdata("msg",$this->upload->display_errors());
			}else{

			$this->load->helper('file');
			$id=$this->input->post('idUser');
			$data["file"]=$this->user->getUserData($id);
			$fileName=$data["file"][0]["FILE_USER"];

			unlink('./uploads/user/'.$fileName);

				$te = $this->upload->data();
				$namafile = $te["file_name"];
				$id=$this->input->post('idUser');
				if($this->user->updateUser($id,'photo',$namafile)>0)

				$this->session->set_flashdata("msgSuccess","Berhasil!");
				else
				$this->session->set_flashdata("msg","Gagal Update");
						
			}
			$data['container']=array("admin/masterUser/master_user_view","admin/masterUser/edit_user_view");
			$data['templateData']=array(
				"title"=>"Daftar User",
				"description"=>"Kelola user"
			);
			$data["idUser"]=$this->input->post("idUser");
			$data["user"]=$this->user->getAllUser();
			$this->load->view('template/template_admin',$data);	

		}else if(isset($post["btnEdit"])){
			$data['container']=array("admin/masterUser/master_user_view","admin/masterUser/edit_user_view");
			$data['templateData']=array(
				"title"=>"Daftar User",
				"description"=>"Kelola user"
			);
			$data["idUser"]=$this->input->post("idUser");
			$data["user"]=$this->user->getAllUser();
			$this->load->view('template/template_admin',$data);			
		}
	}


}

?>