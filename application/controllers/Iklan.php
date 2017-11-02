<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iklan extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session'));
		$this->load->model('M_Data');
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

}
?>