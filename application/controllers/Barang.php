<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session'));
		$models=array(
			'M_User'=>'user',
			'M_Barang'=>'barang',
			'M_Comment'=>'comment',
			'M_Iklan'=>'iklan'
		);
		$this->load->model($models);
	}

	public function index(){
		if($this->input->post('btnDelete')){
		}else if($this->input->post('btnTambah')){
		}else if($this->input->post('btnEdit')){
		}else if($this->input->post('btnSearch')){
		}
	}

	public function search(){
		$data['cariBarang']=$this->input->post('txtSearch');
		$data['barang']=$this->barang->searchBarang($data['cariBarang']);
		$data['user']=$this->user->getUserName($this->session->userdata('username'));
		$data['hotBarang']=$this->barang->getHotBarang();
		$data['iklan']=$this->iklan->getAllIklan();	
		$this->session->set_userdata('is_searched','true');
		$this->load->view('user_view',$data);
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
}
?>