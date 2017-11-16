<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session','pagination'));
		$models=array(
			'M_User'=>'user',
			'M_Barang'=>'barang',
			'M_Iklan'=>'iklan'
		);
		$this->load->model($models);
	}
	public function admin(){
			$data['container']=array("admin/masterUser/master_user_view");
			$data['templateData']=array(
				"title"=>"Daftar User",
				"description"=>"Kelola user"
			);
			$data["user"]=$this->user->getAllUser();
			$this->load->view('template/template_admin',$data);		
	}

	public function editGambar(){
		$post=$this->input->post();
		if(isset($post["btnEditGambar"])){
					$config['upload_path'] = './uploads/user/';
					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['max_size'] = 500;
		            $config['max_width'] = 1000;
		            $config['max_height'] = 1000;

					$this->load->library('upload', $config);

					$namafile = "";
				if(! $this->upload->do_upload("gbr")){
					$this->session->set_flashdata("msg",$this->upload->display_errors());
				}else{

					$this->load->helper('file');
					$id=$this->input->post('idUser');
					$data["file"]=$this->user->getUserData($id);
					$fileName=$data["file"][0]["FILE_USER"];

					unlink('./uploads/user/'.$fileName);
						$te = $this->upload->data();
						$namafile = $te["file_name"];
						$id=$this->input->post('idUser');
						if($this->user->updateFileUser($id,$namafile)>0)
						$this->session->set_flashdata("msgSuccess","Berhasil!");
						else
						$this->session->set_flashdata("msg","Gagal Update");
								
				}
				redirect("User/admin");

		}else if(isset($post["btnEdit"])){
			$data['container']=array("admin/masterUser/master_user_view","admin/masterUser/edit_user_view");
			$data['templateData']=array(
				"title"=>"Daftar User",
				"description"=>"Kelola user"
			);
			$data["idUser"]=$this->input->post("idUser");
			$data["user"]=$this->user->getAllUser();
			$this->load->view('template/template_admin',$data);			
		}
	}
	public function index(){
		if($this->input->post('btnBackUser')==true){
			redirect('User/index');
		}
		else{
			$flag = -1;
			$history=$this->session->userdata('searchItem');
			$count=sizeof($history);
			if($count>0){
				for ($i = 0; $i <count($history); $i++) {
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

			$data['user']=$this->user->getUserName($this->session->userdata('username'));
			$data['hotBarang']=$this->barang->getHotBarang();
			$data["iklan"]=$this->iklan->getAllIklan();
			//$data['iklan']=$this->iklan->getAllIklan();
			/**pagination**/
			$config=array();
			$config["base_url"]=base_url()."User/index";
			$config["total_rows"]=$this->iklan->record_count();
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
			$data["results"]=$this->iklan->fetch($config["per_page"],$page);
			$data["links"]=$this->pagination->create_links();
			$data["halaman"]=$this->pagination->cur_page;
			/*end pagination**/
			$data['container']=array("user/main/user_hot_items","user/main/user_iklan_baris");
			$data['templateData']=array(
				"title"=>"Home",
				"description"=>"Lihat Hot Items dan Iklan"
			);
			$this->load->view('template/template',$data);
		}
	}
	public function LihatBarang(){

	}

	public function berapaData()
{
    //Get the value from the form.
    if($this->input->post('datatable_length')!= ""){
   	 $search = $this->input->post('datatable_length');
   	 return $search;
	}else
	{
		return false;
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
	public function autocomplete(){
		$data["fill"]=$this->session->userdata('searchItem');

	}
	public function changePassword(){
		if($this->input->post('btnChange')){

			$data["newPassword"]=$this->input->post('txtOldPassword');
			$data["oldPassword"]=$this->input->post('txtNewPassword');
			$data["confPassword"]=$this->input->post('txtConfPassword');

			$this->form_validation->set_rules('txtOldPassword','Old Password',
				'required|callback_changePasswordCorrect');
			$this->form_validation->set_rules('txtNewPassword','New Password',
				'required|callback_checkAlphaNumeric|min_length[8]');
			$this->form_validation->set_rules('txtConfPassword','Confirm Password',
				'required|matches[txtNewPassword]');

			if($this->form_validation->run()==TRUE){
				$this->user->updatePasswordUser($this->session->userdata('username'),$data["newPassword"]);
				$this->session->set_flashdata("msgSuccess","Password berhasil diubah");
				redirect('User/index');
			}else{
				$data["newPassword"]="";
				$data["oldPassword"]="";
				$data["confPassword"]="";
				$data["user"]=$this->user->getUserName($this->session->userdata('username'));	
				$data['container']=array("change_view");
				$data['templateData']=array(
					"title"=>"Ganti Password",
					"description"=>"Ganti password anda",
				);
				$this->session->set_flashdata("msg","Gagal mengubah password!");
				$this->load->view('template/template',$data);
			}

		}else{
				$data["newPassword"]="";
				$data["oldPassword"]="";
				$data["confPassword"]="";
				$data["user"]=$this->user->getUserName($this->session->userdata('username'));	
				$data['container']=array("change_view");
				$data['templateData']=array(
				"title"=>"Ganti Password",
				"description"=>"Ganti password anda"
			);
			$this->load->view('template/template',$data);
		}
	}
	///change password///
	public function changePasswordCorrect(){
		$username = $this->session->userdata('username');
		$password = $this->input->post('txtOldPassword');
		if($this->user->checkPasswordCorrect($username,$password)){
			return true;
		}else{
			$this->form_validation->set_message('changePasswordCorrect','Invalid password');
			return false;
		}	
	}

	public function checkAlphaNumeric($content) {
		if (preg_match('#[0-9]#', $content) && preg_match('#[a-zA-Z]#', $content)) {
			return true;
		} 
		$this->form_validation->set_message('checkAlphaNumeric','Password must contain character and number');
		return false;
	}
	///change password///

}

?>