<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session','cart'));
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
			$data["user"]=$this->user->getUserData($this->session->userdata('username'));
			$data["container"]=array("user/commands/add_contact_view");
		$data['templateData']=array(
			"description"=>"Kirim Keluhan",
			"title"=>"Tuliskan keluh kesah anda"

		);
		$this->load->view('template/template',$data);
		}
	}

	public function admin(){
		$data["contact"]=$this->contact->getAllContactUs();
			$data["container"]=array("admin/masterContact/master_contact_view");
		$data['templateData']=array(
			"description"=>"Pesan Contact dari User",
			"title"=>"Pesan");	
			$this->load->view('template/template_admin',$data);	
	}

	public function sendContact(){
		$post = $this->input->post();
		if(isset($post["btnSendContact"])){
				$data["subjectContact"]=$this->input->post('subjectContact');
				$data["isiContact"]=$this->input->post('isiContact');
			$this->form_validation->set_rules('subjectContact','Subject','required');
			$this->form_validation->set_rules('isiContact','Isi','required');
			if($this->form_validation->run()==true){
					$config['upload_path'] = './uploads/contact/';
					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['max_size'] = 500;
		            $config['max_width'] = 1000;
		            $config['max_height'] = 1000;
					$config['upload_path'] = './uploads/contact/';
					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['max_size'] = 500;
		            $config['max_width'] = 1000;
		            $config['max_height'] = 1000;
		            
					$this->load->library('upload', $config);

					$namafile = "";
					if (!$this->upload->do_upload("gbr"))
					{
						$this->session->set_flashdata("msg",$this->upload->display_errors());
					}
					else
					{
						$te = $this->upload->data();
						$namafile = $te["file_name"];

						$data["user"]= $this->user->getUserData($this->session->userdata('username'));
						$id =$data["user"][0]["ID_USER"];
						if($this->contact->insertContact($id,$data["subjectContact"],$data["isiContact"],$namafile)>0){
							$this->session->set_flashdata("msgSuccess","Berhasil!");
						}
						else{
							$this->session->set_flashdata("msg","Gagal Kirim");
						}
					}

					$data["container"]=array("user/commands/add_contact_view");
					$data['templateData']=array(
					"description"=>"Kirim Keluhan",
					"title"=>"Tuliskan keluh kesah anda"
					);
					$this->load->view('template/template',$data);
			}else{
						$data["container"]=array("user/commands/add_contact_view");
						$data['templateData']=array(
						"description"=>"Kirim Keluhan",
						"title"=>"Tuliskan keluh kesah anda"
						);
						$this->load->view('template/template',$data);				
			}
		}	
	}
}
?>