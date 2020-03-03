<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication_Model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}
	
	public function daftar_warga($data){
		$query = $this->db->insert_string('warga', $data);
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function daftar_petugas($data){
		$query = $this->db->insert_string('petugas', $data);
		 $this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function login_warga($data){
		$sql = "SELECT id_warga, nama FROM warga WHERE username = ? AND password = ?";
		$response = $this->db->query($sql, array($data['username'], $data['password']))->row_array();
		return $response;
	}
	
	public function login_petugas($data){
		$sql = "SELECT id_petugas, nama FROM petugas WHERE username = ? AND password = ?";
		$response = $this->db->query($sql, array($data['username'], $data['password']))->row_array();
		return $response;
	}
	
	public function last_id($table_name,$column_id){
		$last_row = $this->db->query("select ".$column_id." from ".$table_name." order by ".$column_id." desc limit 1")->row_array();
		return $last_row[$column_id];
	}
	
	public function update_data_warga($id, $pass, $data){
		$this->db->update('warga', $data, array('id_warga' => $id, 'password' => $pass));
		return $this->db->affected_rows();
	}
	
	public function update_pass_warga($id, $pass, $data, $username){
		$this->db->update('warga', $data, array('id_warga' => $id, 'password' => $pass, 'username' => $username));
		return $this->db->affected_rows();
	}
	
	public function get_data_warga($data){
		$sql = "SELECT nama, tempat_lahir, tanggal_lahir, agama, kebangsaan, status_pernikahan, pekerjaan, alamat, jenis_kelamin, kontak, nik 
				FROM warga WHERE username = ? AND id_warga = ?";
		$response = $this->db->query($sql, array($data['username'], $data['id_warga']))->row_array();
		return $response;
	}
	
	public function update_data_petugas($id, $pass, $data){
		$this->db->update('petugas', $data, array('id_petugas' => $id, 'password' => $pass));
		return $this->db->affected_rows();
	}
	
	public function update_pass_petugas($id, $pass, $data, $username){
		$this->db->update('petugas', $data, array('id_petugas' => $id, 'password' => $pass, 'username' => $username));
		return $this->db->affected_rows();
	}
	
	public function get_data_petugas($data){
		$sql = "SELECT nama, jabatan, nip, nik, kontak FROM petugas WHERE username = ? AND id_petugas = ?";
		$response = $this->db->query($sql, array($data['username'], $data['id_petugas']))->row_array();
		return $response;
	}
}
