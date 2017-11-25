<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class Shopping extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','cookie'));
		$this->load->library(array('form_validation','session','pagination','cart'));
		$models=array(
			'M_User'=>'user',
			'M_Barang'=>'barang',
		);
		$this->load->model($models);
	}

	public function index(){
		$data['container']=array("user/shopping/shopping_list_view");
		$data['templateData']=array(
			"title"=>"Shopping Cart",
			"description"=>"Lihat Barang dalam keranjang"
		);
		$this->load->view('template/template',$data);
	}
	public function payment(){
		$post=$this->input->post();
			if(isset($post["btnBayar"])){
			$data['container']=array("user/shopping/shopping_list_view","user/shopping/shopping_payment_view");
			$data['templateData']=array(
				"title"=>"Shopping Cart",
				"description"=>"Lihat Barang dalam keranjang"
			);
			$this->load->view('template/template',$data);
		}else if(isset($post["btnKonfBayar"])){
			$username=$this->session->userdata("username");
			$user=$this->user->getUserData($username);
			$idUser=$user[0]["ID_USER"];
			$userCredit=$user[0]["CREDIT_USER"];

			$invoice = $this->cart->total();
			$itemInCart=array();
			$tiCart=$this->cart->total_items();



			if($userCredit<$invoice){
				$this->session->set_flashdata("msg","Credit kamu tidak mencukupi!Silahkan mengisi dahulu");
			}else if($this->cart->total_items()==0){
				$this->session->set_flashdata("msg","Kamu belum belanja apapun");

			}else if($userCredit>=$invoice && $tiCart>0){
				foreach($this->cart->contents() as $c){
					$data=array(
						"namaBarang"=>$c["name"],
						"hargaBarang"=>$c["price"],
						"jumlahBarang"=>$c["qty"],
						"id"=>$c["id"]
					);
					$itemInCart[]=$data;
				}
				foreach($itemInCart as $ti){
					$brg=$this->barang->getBarang($ti["id"]);
					$qty=$brg[0]["JUMLAH_BARANG"];
					$qty-=$ti["jumlahBarang"];
					$this->barang->updateBarang($ti["namaBarang"],$ti["hargaBarang"],$qty,"",$ti["id"]);
				}
				$this->user->updateUser($idUser,'credit',$userCredit-$invoice);
				$this->session->set_userdata("credit",$userCredit-$invoice);
				$this->cart->destroy();
				//$this->barang->updateBarang($namaBarang,$hargaBarang,$jumlahBarang,$gbr,$id);
				$this->session->set_flashdata("msgSuccess","Berhasil belanja!");
			}
			$data['container']=array("user/shopping/shopping_list_view","user/shopping/shopping_payment_view");
			$data['templateData']=array(
				"title"=>"Shopping Cart",
				"description"=>"Lihat Barang dalam keranjang"
			);
			$this->load->view('template/template',$data);
		}		
	}

	public function reload(){
		if($this->input->post('load')){
			$this->load->view("user/shopping/shopping_list_table_only");
		}else{
			$this->load->view("user/shopping/shopping_list_table_only");
		}
	}


	public function addItem(){
		$jumlahBarang=$this->input->post('jumlahBarang');
		$namaBarang=$this->input->post('namaBarang');
		$hargaBarang=$this->input->post('hargaBarang');
		$idBarang=$this->input->post('idBarang');

		$barang=$this->barang->getBarang($this->input->post('idBarang'));
		$qty=$barang[0]["JUMLAH_BARANG"];

		if($jumlahBarang>0){
			$data=array('id'=>$idBarang,
				'name'=>$namaBarang,
				'price'=>$hargaBarang,
				'qty'=>1,
				'image'=>$this->input->post('gambarBarang')
			);

			$this->cart->insert($data);
			$this->barang->updateBarang($namaBarang,$hargaBarang,$qty-1,'',$idBarang);
		}
		redirect('Barang/lihatBarang/user');
	}
	public function updateItem(){
		$success=true;
		if($this->input->post('update')){
			$rowid=$this->input->post('id');
			$idBarang=$this->input->post('idBarang');
			$qty=$this->input->post('val');
			$type=$this->input->post('type');
			$data=array(
				'rowid'=>$rowid,
				'qty'=>$qty);
			$barang=$this->barang->getBarang($idBarang);
			$nama=$barang[0]["NAMA_BARANG"];
			$harga=$barang[0]["HARGA_BARANG"];
			$jml=$barang[0]["JUMLAH_BARANG"];
			$eq=0;
			if($type==1){
				$eq=$jml-1;
			}else if($type ==-1){
				$eq=$jml+1;
			} 
			if($this->barang->updateBarang($nama,$harga,$eq,'',$idBarang)>0){
				$this->cart->update($data);
				echo $success;
			}else{
				echo var_dump($barang);
			}
			
		}
		//echo json_encode($this->cart->get_item($rowid));
		//echo $this->load->view("user/shopping/shopping_list_table_only");
	}

	public function deleteItem(){
		$post=$this->input->post();
		if(isset($post["btnDeleteFromCart"])){
			$rowid=$post["rowid"];
			$nama=$post["nama"];
			$harga=$post["harga"];
			$jumlah=$post["jumlah"];
			$id=$post["id"];

			
			$barang=$this->barang->getBarang($id);
			$qty=$barang[0]["JUMLAH_BARANG"];

			
			if($this->barang->updateBarang($nama,$harga,$qty+$jumlah,'',$id)>0){
				$this->cart->remove($rowid);
				redirect('Shopping/index');
			}
		}
	}

}

?>