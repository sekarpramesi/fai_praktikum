<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session','pagination','cart'));
		$models=array(
			'M_User'=>'user',
			'M_Barang'=>'barang',
			'M_Comment'=>'comment'
		);
		$this->load->model($models);
	}
	public function index(){
	}

	public function lihatBarang($userType){
		$data["barang"]=$this->barang->getAllBarang();
			
			$data['templateData']=array(
				"title"=>"Daftar Barang",
				"description"=>"Lihat Daftar Barang"
			);
			if($userType=="admin"){
				$data["container"]=array("admin/masterBarang/master_barang_view","admin/masterBarang/add_barang_view");
				$this->load->view('template/template_admin',$data);	
			}else{
				$data["container"]=array("user/lihatBarang/user_lihat_barang_view");
				$this->load->view('template/template',$data);
			}		
	}

	public function searchBarang(){
		$namaBarang=$this->input->post('txtSearch');
		$data["barang"]=$this->barang->getBarang($namaBarang);
		$data["container"]=array("user/lihatBarang/user_lihat_barang_view");
		$data['templateData']=array(
			"title"=>"Daftar Barang",
			"description"=>"Lihat Daftar Barang"
		);
		$this->load->view('template/template',$data);	
	}

	//operations
	function toggleHotBarang(){
		if($this->input->post('btnHotToggle')==true){
			$status = $this->input->post('hotBarang');
			$id=$this->input->post('idBarang');
			$this->barang->toggleHot($id,$status);

			$objBarang=$this->barang->getAllBarang();
			$data["barang"]=json_decode(json_encode($objBarang),true);
			redirect("Barang/lihatBarang/admin");
		}	
	}

	function addBarang() {
		$post = $this->input->post();

		if(isset($post["btnTambah"]))
		{
			$this->form_validation->set_rules('txtNama','Nama','required');
			$this->form_validation->set_rules('txtHarga','Harga','required');
			$this->form_validation->set_rules('txtJumlah','Jumlah','required');
			if($this->form_validation->run()==true){
					$config['upload_path'] = './uploads/barang/';
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
						$nama = $post["txtNama"];
						$harga = $post["txtHarga"];
						$jumlah = $post["txtJumlah"];
						if($this->barang->insertBarang($nama,$harga,$jumlah,$namafile)>0)
							$this->session->set_flashdata("msgSuccess","Berhasil!");
						else
							$this->session->set_flashdata("msg","Gagal Update");
				}
			}else{
				$this->session->set_flashdata("msg","Gagal Insert");
			}


		}
		redirect("Barang/lihatBarang/admin");
	}

	function updateBarang(){
		$post = $this->input->post();
		if(isset($post["btnEditBarang"])){
			$this->form_validation->set_rules('txtNama','Nama','required');
			$this->form_validation->set_rules('txtHarga','Harga','required');
			$this->form_validation->set_rules('txtJumlah','Jumlah','required');
			if($this->form_validation->run()==true){

					$config['upload_path'] = './uploads/barang/';
					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['max_size'] = 500;
		            $config['max_width'] = 1000;
		            $config['max_height'] = 1000;

					$this->load->library('upload', $config);

					$namafile = "";

				if(! $this->upload->do_upload("gbr")){
					$nama = $post["txtNama"];
					$harga = $post["txtHarga"];
					$jumlah = $post["txtJumlah"];
					$id=$this->input->post('idBarang');
					if($this->barang->updateBarang($nama,$harga,$jumlah,'',$id)>0)
					$this->session->set_flashdata("msgSuccess","Berhasil!");
					else
					$this->session->set_flashdata("msg","Gagal Update");
				}else{

					$this->load->helper('file');
					$id=$this->input->post('idBarang');
					$data["file"]=$this->barang->getBarang($id);
					$fileName=$data["file"][0]["BARANG_FILE"];

					unlink('./uploads/barang/'.$fileName);
						$te = $this->upload->data();
						$namafile = $te["file_name"];
						$idBarang=$post["idBarang"];
						$nama = $post["txtNama"];
						$harga = $post["txtHarga"];
						$jumlah = $post["txtJumlah"];

						if($this->barang->updateBarang($nama,$harga, $jumlah,$namafile,$idBarang)>0)
							$this->session->set_flashdata("msgSuccess","Berhasil!");
						else
							$this->session->set_flashdata("msg","Gagal Update");				
				}

						$data["idBarang"]=$this->input->post('idBarang');
						$data["barangData"]=$this->barang->getBarang($data["idBarang"]);
						$data["txtNama"]=$data["barangData"][0]["NAMA_BARANG"];
						$data["txtHarga"]=$data["barangData"][0]["HARGA_BARANG"];
						$data["txtJumlah"]=$data["barangData"][0]["JUMLAH_BARANG"];
						$objBarang=$this->barang->getAllBarang();
						$data["barang"]=json_decode(json_encode($objBarang),true);
						$data["container"]=array("admin/masterBarang/master_barang_view","admin/masterBarang/edit_barang_view","admin/masterBarang/add_barang_view");
						$data['templateData']=array(
							"title"=>"Daftar Barang",
							"description"=>"Lihat Daftar Barang"
						);
						$this->load->view('template/template_admin',$data);	

			}else{
				redirect('Barang/lihatBarang/admin');
			}

		}else if($this->input->post('btnEdit')){
			$data["idBarang"]=$this->input->post('idBarang');
			$data["barangData"]=$this->barang->getBarang($data["idBarang"]);
			$data["txtNama"]=$data["barangData"][0]["NAMA_BARANG"];
			$data["txtHarga"]=$data["barangData"][0]["HARGA_BARANG"];
			$data["txtJumlah"]=$data["barangData"][0]["JUMLAH_BARANG"];
			$objBarang=$this->barang->getAllBarang();
			$data["barang"]=json_decode(json_encode($objBarang),true);
			$data["container"]=array("admin/masterBarang/master_barang_view","admin/masterBarang/edit_barang_view","admin/masterBarang/add_barang_view");
			$data['templateData']=array(
				"title"=>"Daftar Barang",
				"description"=>"Lihat Daftar Barang"
			);
			$this->load->view('template/template_admin',$data);					
			
		}
		
	}

	function deleteBarang(){
		$this->load->helper('file');
		$objBarang=$this->barang->getAllBarang();
		$id=$this->input->post('idBarang');
		$data["barang"]=json_decode(json_encode($objBarang),true);
		$data["file"]=$this->barang->getBarang($id);
		$fileName=$data["file"][0]["BARANG_FILE"];

		unlink('./uploads/barang/'.$fileName);	
		$this->comment->deleteComment($id);
		$this->barang->deleteBarang($id);
		redirect("Barang/lihatBarang/admin");			
	}

	
}
?>