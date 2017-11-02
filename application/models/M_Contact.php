<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class M_Contact extends CI_Model{
	//contact us
	public function getAllContactUs(){
		return $this->db->get('contact_user')->result();
	}

	public function sendContact($idUser,$subject,$isi){
		$data=array(
            "ID_USER" =>$idUser,
            "SUBJECT_CONTACT" =>$subject,
            "ISI_CONTACT" =>$isi
        );
        $this->db->insert("contact_user",$data);
        return $this->db->affected_rows();			
	}

}
?>