<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class M_Iklan extends CI_Model{
	//iklan
	public function getAllIklan(){
		$this->db->order_by("TIMESTAMP", "DESC");
		return $this->db->get('iklan')->result_array();
	}
	public function sendIklan($judul,$isi){
		$data=array(
            "JUDUL_IKLAN" =>$judul,
            "ISI_IKLAN" =>$isi
        );
        $this->db->insert("iklan",$data);
        return $this->db->affected_rows();			
	}
	public function deleteIklan($id){
		$this->db->where('ID_IKLAN',$id);
		$this->db->delete('iklan');
		return $this->db->affected_rows();		
	}
	public function updateIklan($id,$judul,$isi){
		$data = array(
		        'JUDUL_IKLAN' => $judul,
		        'ISI_IKLAN' => $isi
		);

		$this->db->where('ID_IKLAN', $id);
		$this->db->update('iklan', $data);
		return $this->db->affected_rows();
	}
}
?>