<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session'));
		$models=array(
			'M_User'=>'user',
			'M_Contact'=>'contact',
		);
		$this->load->model($models);
	}
	public function index(){
		if($this->input->post('btnSendContact')==true){
			redirect('Contact/sendContact');			
		}else{
			$data["subjectContact"]="";
			$data["isiContact"]="";
			$data["user"]=$this->user->getUserName($this->session->userdata('username'));
			$data["container"]=array("add_contact_view");
		$data['templateData']=array(
			"description"=>"Kirim Keluhan",
			"title"=>"Tuliskan keluh kesah anda"

		);
		$this->load->view('template/template',$data);
		}
	}

	public function sendContact(){
			$data["subjectContact"]=$this->input->post('subjectContact');
			$data["isiContact"]=$this->input->post('isiContact');
			$data["user"]= $this->user->getUserName($this->session->userdata('username'));
			$id =$data["user"][0]["ID_USER"];
			$this->contact->sendContact($id,$data["subjectContact"],$data["isiContact"]);
			$this->session->set_flashdata("msg","Message sent");
			$this->load->view("add_contact_view",$data);	
		$data["container"]=array("add_contact_view");
		$data['templateData']=array(
			"description"=>"Kirim Keluhan",
			"title"=>"Tuliskan keluh kesah anda"

		);
		$this->load->view('template/template',$data);	
	}
}
?>