<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class M_Barang extends CI_Model{
	//barang

	public function searchBarang($namaBarang){
		return $this->db->get_where('barang',array('NAMA_BARANG'=>$namaBarang))->result_array();
	}
	public function getBarang($idBarang){

		return $this->db->get_where('barang',array('ID_BARANG'=>$idBarang))->result_array();
	}
	public function getAllBarang(){
		return $this->db->get('barang')->result_array();
	}
	public function getHotBarang(){
		return $this->db->get_where('barang',array('HOT_BARANG'=>1))->result_array();
	}

	public function insertBarang($namaBarang,$hargaBarang,$jumlahBarang){
        $data = array(     
            "NAMA_BARANG" =>$namaBarang,
            "HARGA_BARANG" =>$hargaBarang,
            "JUMLAH_BARANG" =>$jumlahBarang
        );
        $this->db->insert("barang",$data);
        return $this->db->affected_rows();
	}

	public function updateBarang($field,$newData,$id){
		$this->db->set($field,$newData);
		$this->db->where('ID_BARANG',$id);
		$this->db->update('barang');
	 	return $this->db->affected_rows();
	}

	public function deleteBarang($id){
		$this->db->where('ID_BARANG',$id);
		$this->db->delete('barang');
		return $this->db->affected_rows();
	}

	public function toggleHot($id,$status){
		if($status == 1){
			$this->db->set('HOT_BARANG',0);
			$this->db->where('ID_BARANG',$id);
			$this->db->update('barang');
			return $this->db->affected_rows();			
		}else if($status == 0){
			if($this->canToggleHot()==true){
				$this->db->set('HOT_BARANG',1);
				$this->db->where('ID_BARANG',$id);
				$this->db->update('barang');
				return $this->db->affected_rows();
			}else{
				return false;
			}
		}
	}

	public function canToggleHot(){
		$this->db->where('HOT_BARANG',1);
		$this->db->from('barang');
		$count = $this->db->count_all_results();
		if($count < 5)
		{
			return true;
		}else{
			return false;
		}
	}
	
}
?>