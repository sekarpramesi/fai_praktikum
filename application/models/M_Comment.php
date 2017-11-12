<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class M_Comment extends CI_Model{
	//comment
	public function getAllComment($id){
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->join('user', 'user.ID_USER = comment.ID_USER');
		$this->db->where('ID_BARANG',$id);
		$this->db->order_by("TIMESTAMP", "DESC");
		return $this->db->get()->result_array();
	}

	public function getAllUserComment($idUser,$idBarang){
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->join('user', 'user.ID_USER = comment.ID_USER');
		$this->db->where('ID_USER',$idUser);
		$this->db->where('ID_BARANG',$idBarang);
		$this->db->order_by("TIMESTAMP", "DESC");
		return $this->db->get()->result_array();
	}

	public function insertComment($idBarang,$idUser,$isiComment){
        $data = array(     
            "ID_BARANG" =>$idBarang,
            "ID_USER" =>$idUser,
            "ISI_COMMENT" =>$isiComment
        );
        $this->db->insert("comment",$data);
        return $this->db->affected_rows();		
	}

	public function deleteComment($id){
		$this->db->where('ID_COMMENT',$id);
		$this->db->delete('comment');
		return $this->db->affected_rows();
	}
	public function fetch($idBarang,$limit,$start){
		$this->db->limit($limit,$start);
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->join('user', 'user.ID_USER = comment.ID_USER');
		$this->db->where('ID_BARANG',$idBarang);
		$this->db->order_by("TIMESTAMP", "DESC");
		return $this->db->get()->result_array();
	}
	public function record_count($id){
		$this->db->like('ID_BARANG',$id);
		$this->db->join('user', 'user.ID_USER = comment.ID_USER');
		return $this->db->count_all_results('comment');
	}

}
?>
