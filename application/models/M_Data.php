<?php
defined('BASEPATH') oR exit('No direct script access allowed');

class M_Data extends CI_Model{

	public function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	//user
	public function addUserCredit($id,$nominal){
		$new = intval($nominal);
		$this->db->set("CREDIT_USER", intval("CREDIT_USER")+$new);
		$this->db->where('ID_USER',$id);
		$this->db->update('user');
	 	return $this->db->affected_rows();		
	}
	public function getCredit($id){

	}
	public function getAllUser(){
		return $this->db->get('user')->result();
	}

	public function getIdUser($username){
		return $this->db->get_where('user',array('USERNAME_USER'=>$username))->result();	
	}
	public function getUserName($username){
		return $this->db->get_where('user',array('USERNAME_USER'=>$username))->result();	
	}

	public function checkUserAvailable($username){
		return $this->db->get_where('user',array('USERNAME_USER'=>$username))->result();			
	}

	public function checkPasswordCorrect($username,$password){
		return $this->db->get_where('user',array('PASSWORD_USER'=>$password,'USERNAME_USER'=>$username))->result();		
	}
	public function checkUserActive($username){
		return $this->db->get_where('user',array('USERNAME_USER'=>$username,'STATUS_USER'=>1))->result();	
	}

	public function getUser($username,$password){
		return $this->db->get_where('user',array('USERNAME_USER'=>$username,'PASSWORD_USER'=>$password))->result();	
	}

	public function insertUser($name,$username,$password,$email){
        $data = array(     
            "NAME_USER" =>$name,
            "USERNAME_USER" =>$username,
            "PASSWORD_USER" =>$password,
            "EMAIL_USER"=>$email,
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

	//barang

	public function getAllBarang(){
		return $this->db->get('barang')->result();
	}
	public function getHotBarang(){
		return $this->db->get_where('barang',array('HOT_BARANG'=>1))->result();
	}

	public function insertBarang($namaBarang,$hargaBarang,$jumlahBarang){
        $data = array(     
            "NAMA_BARANG" =>$namaBarang,
            "HARGA_BARANG" =>$hargaBarang,
            "JUMLAH_BARANG" =>$jumlahBarang
        );
        $this->db->insert("barang",$data);
        return $this->db->affected_rows();
	}

	public function updateBarang($field,$newData,$id){
		$this->db->set($field,$newData);
		$this->db->where('ID_BARANG',$id);
		$this->db->update('barang');
	 	return $this->db->affected_rows();
	}

	public function deleteBarang($id){
		$this->db->where('ID_BARANG',$id);
		$this->db->delete('barang');
		return $this->db->affected_rows();
	}

	public function toggleHot($id,$status){
		if($status == 1){
			$this->db->set('HOT_BARANG',0);
			$this->db->where('ID_BARANG',$id);
			$this->db->update('barang');
			return $this->db->affected_rows();			
		}else if($status == 0){
			if($this->canToggleHot()==true){
				$this->db->set('HOT_BARANG',1);
				$this->db->where('ID_BARANG',$id);
				$this->db->update('barang');
				return $this->db->affected_rows();
			}else{
				return false;
			}
		}
	}

	public function canToggleHot(){
		$this->db->where('HOT_BARANG',1);
		$this->db->from('barang');
		$count = $this->db->count_all_results();
		if($count < 5)
		{
			return true;
		}else{
			return false;
		}
	}

	//comment
	public function getAllComment($id){
		$this->db->order_by("TIMESTAMP", "DESC");
		return $this->db->get_where('comment',array('ID_BARANG'=>$id))->result();
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

	//iklan
	public function getAllIklan(){
		$this->db->order_by("TIMESTAMP", "DESC");
		return $this->db->get('iklan')->result();
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