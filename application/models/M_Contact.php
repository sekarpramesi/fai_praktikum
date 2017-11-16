<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class M_Contact extends CI_Model{
	//contact us
	public function getAllContactUs(){
		$this->db->select('*,user.NAME_USER');
		$this->db->from('contact_user');
		$this->db->join('user','contact_user.ID_USER=user.ID_USER');
		return $this->db->get()->result_array();
	}

	public function sendContact($idUser,$subject,$isi,$gbr){
		$data=array(
            "ID_USER" =>$idUser,
            "SUBJECT_CONTACT" =>$subject,
            "ISI_CONTACT" =>$isi,
            "CONTACT_FILE"=>$gbr
        );
        $this->db->insert("contact_user",$data);
        return $this->db->affected_rows();			
	}

}
?>