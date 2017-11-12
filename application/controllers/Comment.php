<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session','pagination'));
		$models=array(
			'M_User'=>'user',
			'M_Barang'=>'barang',
			'M_Comment'=>'comment'
		);
		$this->load->model($models);
	}
	public function index(){
		if($this->input->post('btnSendComment')){
			redirect('Comment/addComment');
		}else if($this->input->post('btnViewComment')){
			redirect('Comment/viewComment');
		}else if($this->input->post('btnResetBarang')){
			$newData=$this->input->post('namaBarang');
			$bolehReset=$this->session->userdata('canReset');
			$count2=sizeof($bolehReset);
			$reset =false;
			if($count2>0){
				for($i = 0; $i <count($bolehReset);$i++) {
				    if($bolehReset[$i]==$newData){
				    	$reset=true;
				    	//echo "no reset";
				    }
				}					
			}
			if($reset){
				$history=$this->session->userdata('searchItem');
				$history[]=$newData;
				$this->session->set_userdata('searchItem',$history);
				$cookie= array('name' => $newData, 'value' => $newData, 'expire' => 30);
				$this->input->set_cookie($cookie);					
			}	
			redirect('User/index');	
			print_r($this->session->userdata('canReset'));			
		
		}else{
			$this->session->set_userdata('idBarang',$this->input->post('idBarang'));
			$this->session->set_userdata('namaBarang',$this->input->post('namaBarang'));
			$data["idBarang"]=$this->session->userdata('idBarang');
			$data["namaBarang"]=$this->session->userdata('namaBarang');
			$data["comment"]=$this->comment->getAllComment($this->session->userdata('idBarang'));
			$data["user"]= $this->user->getUserName($this->session->userdata('username'));
			/**pagination**/
			$config=array();
			$config["base_url"]=base_url()."Comment/index";
			$config["total_rows"]=$this->comment->record_count($data["idBarang"]);
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
			$data["comment"]=$this->comment->fetch($data["idBarang"],$config["per_page"],$page);
			$data["links"]=$this->pagination->create_links();
			$data["halaman"]=$this->pagination->cur_page;
			/*end pagination**/
		$data["container"]=array("add_comment_view");
		$data['templateData']=array(
			"title"=>"Tambah Komen",
			"description"=>"Tambah komentar untuk barang ini"
		);
		$this->load->view('template/template',$data);				
		}
	}

	public function addComment(){
		if($this->input->post('btnSendComment')){
			$data["idBarang"]=$this->session->userdata('idBarang');
			$data["namaBarang"]=$this->session->userdata('namaBarang');
			$data["user"]= $this->user->getUserName($this->session->userdata('username'));
			$data["isiComment"]=$this->input->post('isiComment');
			$idUser=$data["user"][0]["ID_USER"];
			$this->comment->insertComment($data["idBarang"],$idUser,$data['isiComment']);
			$data["comment"]=$this->comment->getAllComment($data["idBarang"]);
			if($this->session->userdata('is_searched')=='true'){
				$add = true;
				$flag=-1;
				$history=$this->session->userdata('searchItem');
				$newData=$data["namaBarang"];
				$count=sizeof($history);
				if($count>0){
					for ($i = 0; $i <count($history);$i++) {
					    if($history[$i]==$newData){
					    	$add=false;
					    	echo "kembar";
					    }
					    if($this->input->cookie($history[$i],true)==""){
					    	echo "hilang";
					    	$flag = $i;
					    }
					}
				

					if($flag>=0){
						delete_cookie($history[$flag]);
						array_splice($history,$flag,1);
					}
				}			

				$this->session->set_userdata('searchItem',$history);
				$bolehReset=$this->session->userdata('canReset');
					$count2=sizeof($bolehReset);
					
						$reset = true;
						if($count2>0){
							for($i = 0; $i <count($bolehReset);$i++) {
							    if($bolehReset[$i]==$newData){
							    	$reset=false;
							    	echo "sudah ada";
							    }
							}
						}
						if($reset){
							$bolehReset[]=$newData;
							$this->session->set_userdata('canReset',$bolehReset);
						}						
					
				if($add == true){				
					$history[]=$newData;
					$this->session->set_userdata('searchItem',$history);
					$cookie= array('name' => $newData, 'value' => $newData, 'expire' => 30);
					$this->input->set_cookie($cookie);
				}
				
				$this->session->set_userdata('is_searched','false');
			}
			/**pagination**/
			$config=array();
			$config["base_url"]=base_url()."Comment/addComment";
			$config["total_rows"]=$this->comment->record_count($data["idBarang"]);
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
			$data["comment"]=$this->comment->fetch($data["idBarang"],$config["per_page"],$page);
			$data["links"]=$this->pagination->create_links();
			$data["halaman"]=$this->pagination->cur_page;
			/*end pagination**/
			$data["container"]=array("add_comment_view");
			$data['templateData']=array(
				"title"=>"Tambah Komen",
				"description"=>"Tambah komentar untuk barang ini"
			);
			$this->load->view('template/template',$data);	
		}else{
			$data["idBarang"]=$this->session->userdata('idBarang');
			$data["namaBarang"]=$this->session->userdata('namaBarang');;
			$data["comment"]=$this->comment->getAllComment($this->session->userdata('idBarang'));
			$data["isiComment"]="";
			$data["user"]= $this->user->getUserName($this->session->userdata('username'));
			/**pagination**/
			$config=array();
			$config["base_url"]=base_url()."Comment/addComment";
			$config["total_rows"]=$this->comment->record_count($data["idBarang"]);
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
			$data["comment"]=$this->comment->fetch($data["idBarang"],$config["per_page"],$page);
			$data["links"]=$this->pagination->create_links();
			$data["halaman"]=$this->pagination->cur_page;
			/*end pagination**/
		$data["container"]=array("add_comment_view");
		$data['templateData']=array(
			"description"=>"Tambah komentar untuk barang".$data['namaBarang'],
			"title"=>"Tambah Komen"

		);
		$this->load->view('template/template',$data);	
		}
	}

	public function viewComment(){		
		$data["namaBarang"]="";
		$data["hargaBarang"]="";
		$data["jumlahBarang"]="";
		$data["idBarang"] = $this->input->post('idBarang');

		$objBarang=$this->M_Data->getAllBarang();
		$objUser= $this->M_Data->getAllUser();
		$objComment=$this->M_Data->getAllComment($data["idBarang"]);
		$data["nama"]=$this->input->post('nama',true);
		$data["user"]=json_decode(json_encode($objUser),true);
		$data["barang"]=json_decode(json_encode($objBarang),true);
		$data["comment"]=json_decode(json_encode($objComment),true);

		$this->load->view('master_barang_view',$data);		
	}
}
?>