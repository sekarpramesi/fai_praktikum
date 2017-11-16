<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class M_User extends CI_Model{

	public function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	public function addUserCredit($id,$nominal){
		$new = intval($nominal);
		$this->db->set("CREDIT_USER", intval("CREDIT_USER")+$new);
		$this->db->where('ID_USER',$id);
		$this->db->update('user');
	 	return $this->db->affected_rows();		
	}

	public function updateFileUser($id,$gbr){
		$data = array(
		        'FILE_USER'=>$gbr
		);

		$this->db->where('ID_USER', $id);
		$this->db->update('user', $data);
		return $this->db->affected_rows();		
	}
	public function getUserData($id){
		return $this->db->get_where('user',array("ID_USER"=>$id))->result_array();
	}
	public function getAllUser(){
		return $this->db->get('user')->result_array();
	}

	public function getIdUser($username){
		return $this->db->get_where('user',array('USERNAME_USER'=>$username))->result();	
	}
	public function getUserName($username){
		return $this->db->get_where('user',array('USERNAME_USER'=>$username))->result_array();	
	}

	public function checkUserAvailable($username){
		return $this->db->get_where('user',array('USERNAME_USER'=>$username))->result();			
	}

	public function checkPasswordCorrect($username,$password){
		return $this->db->get_where('user',array('PASSWORD_USER'=>$password,'USERNAME_USER'=>$username))->result();		
	}
	public function checkEmail($email){
		return $this->db->get_where('user',array('EMAIL_USER'=>$email))->result();			
	}
	public function checkUserActive($username){
		return $this->db->get_where('user',array('USERNAME_USER'=>$username,'STATUS_USER'=>1))->result();	
	}

	public function getUser($username,$password){
		return $this->db->get_where('user',array('USERNAME_USER'=>$username,'PASSWORD_USER'=>$password))->result();	
	}

	public function insertUser($name,$username,$password,$email,$gbr){
        $data = array(     
            "NAME_USER" =>$name,
            "USERNAME_USER" =>$username,
            "PASSWORD_USER" =>$password,
            "EMAIL_USER"=>$email,
            "FILE_USER"=>$gbr,
            "STATUS_USER" =>1
        );
        $this->db->insert("user",$data);
        return $this->db->affected_rows();
	}
	public function updatePasswordUser($id,$password){
		$this->db->set('PASSWORD_USER',$password);
		$this->db->where('ID_USER',$id);
		$this->db->update('user');
	 	return $this->db->affected_rows();
	}
	public function updateStatusUser($status,$id){
		if($status==0)$newStat=1;elseif ($status==1) {
			$newStat = 0;
		}
		$this->db->set('STATUS_USER',$newStat);
		$this->db->where('ID_USER',$id);
		$this->db->update('user');
	 	return $this->db->affected_rows();
	}

}