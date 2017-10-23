<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class M_Data extends CI_Model{

	public function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	//user

	public function getAllUser(){
		$q = "SELECT * from user";
		$result = $this->db->query($q);
		return $result->result();
	}

	public function getIdUser($username){
		$q="SELECT ID_USER from user where USERNAME_USER='".$username."'";
		$result = $this->db->query($q);
		return $result->result();		
	}
	public function getUserName($id){
		$q="SELECT USERNAME_USER from user where ID_USER='".$id."'";
		$result = $this->db->query($q);
		return $result->result();		
	}
	public function checkUserAvailable($username){
		$q="SELECT * from user where USERNAME_USER='".$username."'";
		$result = $this->db->query($q);
		return $result->result();			
	}

	public function checkPasswordCorrect($password){
		$q="SELECT PASSWORD_USER from user where PASSWORD_USER='".$password."'";
		$result = $this->db->query($q);
		return $result->result();	
	}
	public function checkUserActive($username){
		$q="SELECT * from user where USERNAME_USER='".$username."' and STATUS_USER=1";
		$result = $this->db->query($q);
		return $result->result();	
	}

	public function getUser($username,$password){
		$q="SELECT * from user where USERNAME_USER='".$username."' and PASSWORD_USER='".$password."'";
		$result = $this->db->query($q);
		return $result->result();
	}

	public function insertUser($idUser,$name,$username,$password,$email){
		$q = "INSERT into user values(".$idUser.",'".$name."','".$username."','".$password.
				"','".$email."',1)";
		$result = $this->db->query($q);
		return $this->db->affected_rows();

	}
	public function updatePasswordUser($id,$password){
	 	$q = "UPDATE user set PASSWORD_USER='".$password."' where ID_USER=".$id;
	 	$result = $this->db->query($q);
	 	return $this->db->affected_rows();
	}
	public function updateStatusUser($status,$id){
		if($status==0)$newStat=1;elseif ($status==1) {
			$newStat = 0;
		}
	 	$q = "UPDATE user set STATUS_USER=".$newStat." where ID_USER=".$id;
	 	$result = $this->db->query($q);
	 	return $this->db->affected_rows();
	}

	//barang

	public function getAllBarang(){
		$q = "SELECT * from barang";
		$result = $this->db->query($q);
		return $result->result();
	}

	public function insertBarang($idBarang,$namaBarang,$hargaBarang,$jumlahBarang){
		$q = "INSERT into barang values(".$idBarang.",'".$namaBarang."',".$hargaBarang.",".$jumlahBarang.")";
		$result = $this->db->query($q);
		return $this->db->affected_rows();
	}

	public function updateBarang($field,$newData,$id){
		$q="UPDATE barang set ".$field."=".$newData." where ID_BARANG='".$id."'";
		$result = $this->db->query($q);
	}

	public function deleteBarang($id){
		$q ="DELETE from barang where ID_BARANG='".$id."'";
		$result = $this->db->query($q);
		return $this->db->affected_rows();
	}

	//comment
	public function getAllComment($id){
		$q="SELECT * from comment where ID_BARANG='".$id."' order by TIMESTAMP DESC";
		$result = $this->db->query($q);


	}

	public function insertComment($cntId,$idBarang,$idUser,$isiComment){

		$q = "INSERT into COMMENT values(".$cntId.",".$idBarang.",".$idUser.",'".$isiComment."',NOW())";
		echo $q;
		$result = $this->db->query($q);
		return $this->db->affected_rows();
	}

	public function deleteComment($id){
		$q ="DELETE from comment where ID_COMMENT='".$id."'";
		$result = $this->db->query($q);
		return $this->db->affected_rows();
	}

}