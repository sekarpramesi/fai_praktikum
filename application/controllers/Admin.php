<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session','pagination'));
		$models=array(
			'M_User'=>'user',
			'M_Barang'=>'barang',
			'M_Iklan'=>'iklan',

		);
		$this->load->model($models);
	}

	public function index(){
		if($this->input->post('btnBackAdmin')==true){
			redirect('Admin/index');
		}
		else{
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
		$this->session->unset_userdata('searchItem');
		$this->session->unset_userdata('canReset');
		$this->session->unset_userdata('is_searched');
		$this->session->unset_userdata('name');
		delete_cookie('keepUsername');
		redirect('Home/index');
	}

}

?>