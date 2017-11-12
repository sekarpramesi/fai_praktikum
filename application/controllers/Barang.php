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
		$data["container"]=array("user_lihat_barang_view");
		$data['templateData']=array(
			"title"=>"Daftar Barang",
			"description"=>"Lihat Daftar Barang"
		);
		$this->load->view('template/template',$data);	
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