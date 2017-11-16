<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class Iklan extends CI_Controller{
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
			$data['container']=array("admin/masterIklan/master_iklan_view","admin/masterIklan/add_iklan_view");
			$data['templateData']=array(
				"title"=>"Iklan",
				"description"=>"List iklan"
			);
			$data["iklan"]=$this->iklan->getAllIklan();
			$this->load->view('template/template_admin',$data);
		}
	}

	public function editIklan(){
		$post = $this->input->post();
		if(isset($post["btnEditIklan"]))
		{
			$this->form_validation->set_rules('txtJudul','Judul','required');
			$this->form_validation->set_rules('txtIsi','Isi','required');
			if($this->form_validation->run()==true){

					$config['upload_path'] = './uploads/iklan/';
					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['max_size'] = 500;
		            $config['max_width'] = 1000;
		            $config['max_height'] = 1000;

					$this->load->library('upload', $config);

					$namafile = "";

				if(! $this->upload->do_upload("gbr")){
					$isi = $post["txtIsi"];
					$judul = $post["txtJudul"];
					$id=$this->input->post('idIklan');
					if($this->iklan->updateWithoutFile($isi,$judul,$id)>0)
					$this->session->set_flashdata("msgSuccess","Berhasil!");
					else
					$this->session->set_flashdata("msg","Gagal Update");
				}else{

					$this->load->helper('file');
					$id=$this->input->post('idIklan');
					$data["file"]=$this->iklan->getIklan($id);
					$fileName=$data["file"][0]["FILE_IKLAN"];

					unlink('./uploads/iklan/'.$fileName);
						$te = $this->upload->data();
						$namafile = $te["file_name"];
						$isi = $post["txtIsi"];
						$judul = $post["txtJudul"];
						$id=$this->input->post('idIklan');

						if($this->iklan->updateIklan($isi,$judul,$id,$namafile)>0)
							$this->session->set_flashdata("msgSuccess","Berhasil!");
						else
							$this->session->set_flashdata("msg","Gagal Update");
								
				}

			}else{
				$this->session->set_flashdata("msg","Gagal Update");
			}

			redirect('iklan/index');
		}else if(isset($post["btnEdit"])){
			$data['container']=array("admin/masterIklan/master_iklan_view","admin/masterIklan/edit_iklan_view","admin/masterIklan/add_iklan_view");
			$data['templateData']=array(
				"title"=>"Iklan",
				"description"=>"List iklan"
			);
			$data["judul"]=$this->input->post("judul");
			$data["isi"]=$this->input->post("isi");
			$data["idIklan"]=$this->input->post("idIklan");
			$data["iklan"]=$this->iklan->getAllIklan();
			$this->load->view('template/template_admin',$data);			
		}	
	}

	public function deleteIklan(){
		$post = $this->input->post();
		if(isset($post['btnDelete'])){
			$objIklan=$this->iklan->getAllIklan();
			$id=$this->input->post('idIklan');
			$data["iklan"]=json_decode(json_encode($objIklan),true);
			$data["file"]=$this->iklan->getIklan($id);
			$fileName=$data["file"][0]["BARANG_FILE"];

			unlink('./uploads/iklan/'.$fileName);	
			$this->iklan->deleteIklan($id);
			redirect("Iklan/index");			
		}
	}
	public function addIklan(){
		$post= $this->input->post();
		if(isset($post["btnTambah"])){
			$this->form_validation->set_rules('txtJudul','Judul','required');
			$this->form_validation->set_rules('txtIsi','Isi','required');
			if($this->form_validation->run()==true){

					$config['upload_path'] = './uploads/iklan/';
					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['max_size'] = 500;
		            $config['max_width'] = 1000;
		            $config['max_height'] = 1000;

					$this->load->library('upload', $config);

					$namafile = "";

				if(! $this->upload->do_upload("gbr")){
					$this->session->set_flashdata("msg",$this->upload->display_errors());
				}else{

					$te = $this->upload->data();
					$namafile = $te["file_name"];
					$isi = $post["txtIsi"];
					$judul = $post["txtJudul"];

					if($this->iklan->sendIklan($isi,$judul,$namafile)>0)
					$this->session->set_flashdata("msgSuccess","Berhasil!");
					else
					$this->session->set_flashdata("msg","Gagal Update");
								
				}				
						
		}else{
			$this->session->set_flashdata("msg","Gagal Insert");
		}
		redirect("Iklan/index");
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