<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class M_Iklan extends CI_Model{
	//iklan
	public function getAllIklan(){
		$this->db->order_by("TIMESTAMP", "DESC");
		return $this->db->get('iklan')->result_array();
	}

	public function getIklan($id){
		return $this->db->get_where('iklan',array("ID_IKLAN"=>$id))->result_array();
	}

	public function insertIklan($judul,$isi,$gbr){
		$data=array(
            "JUDUL_IKLAN" =>$judul,
            "ISI_IKLAN" =>$isi,
            "FILE_IKLAN"=>$gbr
        );
        $this->db->insert("iklan",$data);
        return $this->db->affected_rows();			
	}
	public function updateIklan($id,$judul,$isi,$gbr){
		$this->db->set('JUDUL_IKLAN',$judul);
		$this->db->set('ISI_IKLAN',$isi);
		if($gbr!=""){
			$this->db->set('FILE_IKLAN',$gbr);
		}
		$this->db->where('ID_IKLAN', $id);
		$this->db->update('iklan', $data);
		return $this->db->affected_rows();
	}
	public function deleteIklan($id){
		$this->db->where('ID_IKLAN',$id);
		$this->db->delete('iklan');
		return $this->db->affected_rows();		
	}

	//pagination
	public function fetch($limit,$start){
		$this->db->limit($limit,$start);
		$query=$this->db->get('iklan');
		return $query->result();
	}
	public function record_count(){
		
		return $this->db->count_all('iklan');
	}
}
?>