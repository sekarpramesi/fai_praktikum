<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class M_User extends CI_Model{

	public function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	public function getUserData($param){
		$data=array();
		if(preg_match('/\b[^\d\W_]+\b/',$param)){
			$data=array("USERNAME_USER"=>$param);
		}else{
			$data=array("ID_USER"=>$param);
		}
		return $this->db->get_where('user',$data)->result_array();
	}
	public function getAllUser(){
		return $this->db->get('user')->result_array();
	}


	public function checkUser($username,$password){
		return $this->db->get_where('user',array('USERNAME_USER'=>$username,'PASSWORD_USER'=>$password))->result_array();
	}

	public function insertUser($name,$username,$password,$email,$gbr){
        $data = array(     
            "NAME_USER" =>$name,
            "USERNAME_USER" =>$username,
            "PASSWORD_USER" =>$password,
            "EMAIL_USER"=>$email,
            "FILE_USER"=>$gbr
        );
        $this->db->insert("user",$data);
        return $this->db->affected_rows();
	}

	public function updateUser($id,$fieldName,$data){
		if($fieldName=="status"){
			if($data==0)$data=1;else $data= 0;
			$fieldName="STATUS_USER";
		}else if($fieldName=="photo"){
			$fieldName="FILE_USER";
		}else if($fieldName=="password"){
			$fieldName="PASSWORD_USER";
		}else if($fieldName=="credit"){
			$fieldName="CREDIT_USER";
		}
		$this->db->set($fieldName,$data);
		$this->db->where('ID_USER',$id);
		$this->db->update('user');
	 	return $this->db->affected_rows();
	}

}