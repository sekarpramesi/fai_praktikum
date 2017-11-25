<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class M_Transaction extends CI_Model{

	public function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	public function genTopupLog($idUser,$nominal){
		$data=array(
			"ID_USER"=>$idUser,
			"NOMINAL"=>$nominal
		);

		$this->db->insert("topup",$data);
		return $this->db->affected_rows();
	}

	public function getAllTopupLog(){
		$this->db->select("*");
		$this->db->from("topup");
		$this->db->join("user","user.ID_USER=topup.ID_USER");
		$this->db->order_by("TIMESTAMP","desc");
		return $this->db->get()->result_array();
	}
}