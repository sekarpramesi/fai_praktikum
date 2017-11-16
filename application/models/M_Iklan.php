<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class M_Iklan extends CI_Model{
	//iklan
	public function getAllIklan(){
		$this->db->order_by("TIMESTAMP", "DESC");
		return $this->db->get('iklan')->result_array();
	}
	public function sendIklan($judul,$isi,$gbr){
		$data=array(
            "JUDUL_IKLAN" =>$judul,
            "ISI_IKLAN" =>$isi,
            "FILE_IKLAN"=>$gbr
        );
        $this->db->insert("iklan",$data);
        return $this->db->affected_rows();			
	}
	public function getIklan($id){
		return $this->db->get_where('iklan',array("ID_IKLAN"=>$id))->result_array();
	}
	public function deleteIklan($id){
		$this->db->where('ID_IKLAN',$id);
		$this->db->delete('iklan');
		return $this->db->affected_rows();		
	}
	public function updateWithoutFile($isi,$judul,$id){
		$data = array(
		        'JUDUL_IKLAN' => $judul,
		        'ISI_IKLAN' => $isi
		);

		$this->db->where('ID_IKLAN', $id);
		$this->db->update('iklan', $data);
		return $this->db->affected_rows();
	}
	public function updateIklan($isi,$judul,$id,$gbr){
		$data = array(
		        'JUDUL_IKLAN' => $judul,
		        'ISI_IKLAN' => $isi,
		        'FILE_IKLAN'=>$gbr
		);

		$this->db->where('ID_IKLAN', $id);
		$this->db->update('iklan', $data);
		return $this->db->affected_rows();
	}
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