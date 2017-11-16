<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session','pagination'));
		$models=array(
			'M_User'=>'user',
			'M_Barang'=>'barang',
			'M_Comment'=>'comment',
			'M_Iklan'=>'iklan'
		);
		$this->load->model($models);
	}
public function index(){
	redirect("Barang/admin");
}

public function user(){
		$data['reset']=$this->session->userdata('canReset');
		$data['fill']=$this->session->userdata('searchItem');
		$data['newfill']=json_decode(json_encode($data['fill']),true);
			/**pagination**/
			$config=array();
			$config["base_url"]=base_url()."Barang/index";
			$config["total_rows"]=$this->barang->record_count();
			$config["per_page"]=5;
			$config["uri_segment"]=3;
			/**paginationlinks**/
			$config["full_tag_open"] = '<ul class="pagination">';
			$config["full_tag_close"] = '</ul>';	
			$config["first_link"] = "&laquo;";
			$config["first_tag_open"] = "<li>";
			$config["first_tag_close"] = "</li>";
			$config["last_link"] = "&raquo;";
			$config["last_tag_open"] = "<li>";
			$config["last_tag_close"] = "</li>";
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '<li>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '<li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			/**endpaginationlinks**/
			$this->pagination->initialize($config);
			$data["allowed"]=$config["per_page"];
			$page=($this->uri->segment(3))? $this->uri->segment(3) : 0;
			$data["barang"]=$this->barang->fetch($config["per_page"],$page);
			$data["links"]=$this->pagination->create_links();
			$data["halaman"]=$this->pagination->cur_page;
			/*end pagination**/
		$data["container"]=array("user/lihatBarang/user_lihat_barang_view");
		$data['templateData']=array(
			"title"=>"Daftar Barang",
			"description"=>"Lihat Daftar Barang"
		);
		$this->load->view('template/template',$data);		
}
	public function keep2(){
		$data['reset']=$this->session->userdata('canReset');
		$data['fill']=$this->session->userdata('searchItem');
		$data['newfill']=json_decode(json_encode($data['fill']),true);
			/**pagination**/
			$config=array();
			$config["base_url"]=base_url()."Barang/index";
			$config["total_rows"]=$this->barang->record_count();
			$config["per_page"]=5;
			$config["uri_segment"]=3;
			/**paginationlinks**/
			$config["full_tag_open"] = '<ul class="pagination">';
			$config["full_tag_close"] = '</ul>';	
			$config["first_link"] = "&laquo;";
			$config["first_tag_open"] = "<li>";
			$config["first_tag_close"] = "</li>";
			$config["last_link"] = "&raquo;";
			$config["last_tag_open"] = "<li>";
			$config["last_tag_close"] = "</li>";
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '<li>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '<li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			/**endpaginationlinks**/
			$this->pagination->initialize($config);
			$data["allowed"]=$config["per_page"];
			$page=($this->uri->segment(3))? $this->uri->segment(3) : 0;
			$data["barang"]=$this->barang->fetch($config["per_page"],$page);
			$data["links"]=$this->pagination->create_links();
			$data["halaman"]=$this->pagination->cur_page;
			/*end pagination**/
		$data["container"]=array("user_lihat_barang_view");
		$data['templateData']=array(
			"title"=>"Daftar Barang",
			"description"=>"Lihat Daftar Barang"
		);
		$this->load->view('template/template',$data);	

	}
public function admin(){
			$data['reset']=$this->session->userdata('canReset');
		$data['fill']=$this->session->userdata('searchItem');
		$data['newfill']=json_decode(json_encode($data['fill']),true);
			/**pagination**/
			$config=array();
			$config["base_url"]=base_url()."Barang/index";
			$config["total_rows"]=$this->barang->record_count();
			$config["per_page"]=5;
			$config["uri_segment"]=3;
			/**paginationlinks**/
			$config["full_tag_open"] = '<ul class="pagination">';
			$config["full_tag_close"] = '</ul>';	
			$config["first_link"] = "&laquo;";
			$config["first_tag_open"] = "<li>";
			$config["first_tag_close"] = "</li>";
			$config["last_link"] = "&raquo;";
			$config["last_tag_open"] = "<li>";
			$config["last_tag_close"] = "</li>";
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '<li>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '<li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			/**endpaginationlinks**/
			$this->pagination->initialize($config);
			$data["allowed"]=$config["per_page"];
			$page=($this->uri->segment(3))? $this->uri->segment(3) : 0;
			$data["barang"]=$this->barang->fetch($config["per_page"],$page);
			$data["links"]=$this->pagination->create_links();
			$data["halaman"]=$this->pagination->cur_page;
			/*end pagination**/
		$data["container"]=array("admin/masterBarang/master_barang_view","admin/masterBarang/add_barang_view");
		$data['templateData']=array(
			"title"=>"Daftar Barang",
			"description"=>"Lihat Daftar Barang"
		);
		$this->load->view('template/template_admin',$data);	

	}


	public function keep(){
		if($this->input->post('btnDelete')){
		}else if($this->input->post('btnTambah')){
		}else if($this->input->post('btnEdit')){
		}else if($this->input->post('btnSearch')){
		}
	}

	public function search(){

		$this->session->set_userdata('is_searched','true');
			/**pagination**/
			$config=array();
			$config["base_url"]=base_url()."Barang/search";
			$config["total_rows"]=$this->barang->record_count();
			$config["per_page"]=1;
			$config["uri_segment"]=3;
			/**paginationlinks**/
			$config["full_tag_open"] = '<ul class="pagination">';
			$config["full_tag_close"] = '</ul>';	
			$config["first_link"] = "&laquo;";
			$config["first_tag_open"] = "<li>";
			$config["first_tag_close"] = "</li>";
			$config["last_link"] = "&raquo;";
			$config["last_tag_open"] = "<li>";
			$config["last_tag_close"] = "</li>";
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '<li>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '<li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			/**endpaginationlinks**/
			$this->pagination->initialize($config);
			$data["allowed"]=$config["per_page"];
			$page=($this->uri->segment(3))? $this->uri->segment(3) : 0;
			$data['cariBarang']=$this->input->post('txtSearch');
			$data["barang"]=$this->barang->searchBarang($data['cariBarang']);
			$data["links"]=$this->pagination->create_links();
			$data["halaman"]=$this->pagination->cur_page;
			/*end pagination**/
		$data["container"]=array("user/lihatBarang/user_lihat_barang_view");
		$data['templateData']=array(
			"title"=>"Daftar Barang",
			"description"=>"Lihat Daftar Barang"
		);
		$this->load->view('template/template',$data);	
	}
	public function supposedlyAddBarang(){
		if($this->input->post('btnTambah')){
			$data["namaBarang"]=$this->input->post('txtNama');
			$data["hargaBarang"]=$this->input->post('txtHarga');
			$data["jumlahBarang"]=$this->input->post('txtJumlah');
			$data["comment"]="";
			$this->barang->insertBarang($data["namaBarang"],$data["hargaBarang"],$data["jumlahBarang"]);
			$objBarang=$this->barang->getAllBarang();
			$data["barang"]=json_decode(json_encode($objBarang),true);	
			redirect('Admin/index');		

		}
	}
	public function barang(){
		if($this->input->post('btnDelete')){
			$this->load->helper('file');
			$objBarang=$this->barang->getAllBarang();
			$id=$this->input->post('idBarang');
			$data["barang"]=json_decode(json_encode($objBarang),true);
			$data["file"]=$this->barang->getBarang($id);
			$fileName=$data["file"][0]["BARANG_FILE"];

			unlink('./uploads/barang/'.$fileName);	
			$this->comment->deleteCommentBarang($id);
			$this->barang->deleteBarang($id);
			redirect("Barang/admin");	

		}else if($this->input->post('btnEdit')){
			/**pagination**/
			$config=array();
			$config["base_url"]=base_url()."Barang/index";
			$config["total_rows"]=$this->barang->record_count();
			$config["per_page"]=5;
			$config["uri_segment"]=3;
			/**paginationlinks**/
			$config["full_tag_open"] = '<ul class="pagination">';
			$config["full_tag_close"] = '</ul>';	
			$config["first_link"] = "&laquo;";
			$config["first_tag_open"] = "<li>";
			$config["first_tag_close"] = "</li>";
			$config["last_link"] = "&raquo;";
			$config["last_tag_open"] = "<li>";
			$config["last_tag_close"] = "</li>";
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '<li>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '<li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			/**endpaginationlinks**/
			$this->pagination->initialize($config);
			$data["allowed"]=$config["per_page"];
			$page=($this->uri->segment(3))? $this->uri->segment(3) : 0;
			$data["barang"]=$this->barang->fetch($config["per_page"],$page);
			$data["links"]=$this->pagination->create_links();
			$data["halaman"]=$this->pagination->cur_page;
			/*end pagination**/
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
		else if($this->input->post('btnHotToggle')==true){
			$status = $this->input->post('hotBarang');
			$id=$this->input->post('idBarang');
			$this->barang->toggleHot($id,$status);

			$objBarang=$this->barang->getAllBarang();
			$data["barang"]=json_decode(json_encode($objBarang),true);
			redirect("Barang/admin");		
		}else{
			redirect("Barang/admin");
		} 
	}
	function updateBarang(){
		$post = $this->input->post();
		if(isset($post["btnEditBarang"]))
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
					$nama = $post["txtNama"];
					$harga = $post["txtHarga"];
					$jumlah = $post["txtJumlah"];
					$id=$this->input->post('idBarang');
					if($this->barang->updateWithoutBarang($nama,$harga,$jumlah,$id)>0)
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

						if($this->barang->newUpdateBarang($nama,$harga, $jumlah,$namafile,$idBarang)>0)
							$this->session->set_flashdata("msgSuccess","Berhasil!");
						else
							$this->session->set_flashdata("msg","Gagal Update");
								
				}

			}else{
				$this->session->set_flashdata("msg","Gagal Update");
			}


		}
		redirect("Barang/admin");	
	}
	function tambahBarang() {
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
		redirect("Barang/admin");
	}
	
}
?>