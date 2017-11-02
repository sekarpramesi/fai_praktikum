<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session'));
		$models=array(
			'M_User'=>'user',
			'M_Barang'=>'barang',
			'M_Iklan'=>'iklan',
			'M_Contact'=>'contact'
		);
		$this->load->model($models);
	}

	public function index(){
		if($this->input->post('btnBack')==true){		
			redirect('Admin/index');
		}else if($this->input->post('btnMasterBarang')==true){
			redirect('Admin/masterBarang');
		}else if($this->input->post('btnMasterUser')==true){
			redirect('Admin/masterUser');
		}else if($this->input->post('btnMasterContact')==true){
			redirect('Admin/masterContact');
		}else if($this->input->post('btnLogout')==true){	
			$this->session->unset_userdata('username');
			delete_cookie('keepUsername');
			$this->load->view('home_view');
		}else
		{
			$this->load->view('admin_view');
		}		
	}	

	public function masterBarang(){
		$this->load->view('master_barang_view',$data);
	}

	public function masterUser(){
		$this->load->view('master_user_view',$data);
	}

	public function masterContact(){
		$this->load->view('master_contact_view',$data);
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
			

		}else if($this->input->post('btnMasterContact')==true){
			$objContact=$this->M_Data->getAllContactUs();
			$data["contact"]=json_decode(json_encode($objContact),true);
			

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
}
?>