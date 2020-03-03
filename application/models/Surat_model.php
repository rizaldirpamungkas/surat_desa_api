<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_Model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}
	
	public function set_surat($data_surat){
		$query = $this->db->insert_string('surat', $data_surat);
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function set_sub_surat($data_sub_surat, $table){
		$query = $this->db->insert_string($table, $data_sub_surat);
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function get_all_surat($tipe, $id){
		$this->db->select('nomor_surat, id_surat, id_pemohon, id_pencetak, petugas.nama pencetak, tipe_surat, surat.nama nama, warga.nama pemohon, surat.tempat_lahir, surat.tanggal_lahir, surat.agama, surat.kebangsaan, surat.status_pernikahan, surat.pekerjaan, surat.alamat, surat.jenis_kelamin, surat.nik, tanggal_surat, atas_nama_ttd, jabatan_ttd, nip_ttd');
		$this->db->from('surat');
		$this->db->join('warga','id_pemohon=id_warga');
		$this->db->join('petugas','id_pencetak=id_petugas', 'Left');
		
		if($tipe != null){
			$this->db->where('tipe_surat',$tipe);
		}
		
		if($id != null){
			$this->db->where('id_pemohon',$id);
		}
		
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function get_detail_surat($tabel_surat, $id_surat){
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->join($tabel_surat.' sub','surat.id_surat=sub.id_surat');
		$this->db->where('surat.id_surat',$id_surat);
		
		$query=$this->db->get();
		return $query->row_array();
	}
	
	public function update_surat($id_surat, $data){
		$this->db->update('surat', $data, array('id_surat' => $id_surat));
		return $this->db->affected_rows();
	}
	
	public function update_sub_surat($id_surat, $id_sub_surat, $data, $tabel_surat){
		$this->db->update($tabel_surat, $data, array('id_surat' => $id_surat, 'id_sub_surat' => $id_sub_surat));
		return $this->db->affected_rows();
	}
	
	public function cancel_surat($id_surat){
		$data = array("nomor_surat" => "batal");
		$this->db->update("surat", $data, array('id_surat' => $id_surat));
		return $this->db->affected_rows();
	}
}