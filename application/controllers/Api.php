<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('authentication_model');
		$this->load->model('surat_model');
        $this->load->helper('url_helper');
	}
	
	public function index(){
		echo "Hello";
	}
	
	private function check_api_key(){
		$api_key = "5baa441c93eaa4d6fb824dfc561a96d6";
		
		$this->input->request_headers();
		$header_key = $this->input->get_request_header('x-api-key');
		
		$response = array('Status' => "Access Forbidden", "Code" => 404);
		
		if($api_key != $header_key){
			echo json_encode($response);
			exit();
		}
	}
	
	public function daftar_warga(){
		$this->check_api_key();
		
		$id_warga = $this->generate_new_id("warga","id_warga","WRG");
		
		$data = array(
			'id_warga' => $id_warga,
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')), 
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'kebangsaan' => $this->input->post('kebangsaan'),
			'status_pernikahan' => $this->input->post('status_pernikahan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'kontak' => $this->input->post('kontak'),
			'nik' => $this->input->post('nik')
		);
		
		
		$this->authentication_model->daftar_warga($data);
		
		$response = array('Status' => "Success", "Code" => 200);
		$this->output->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
	}
	
	public function update_data_warga(){
		$this->check_api_key();
		
		$data = array(
			'username' => $this->input->post('username'),
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'kebangsaan' => $this->input->post('kebangsaan'),
			'status_pernikahan' => $this->input->post('status_pernikahan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'kontak' => $this->input->post('kontak'),
			'nik' => $this->input->post('nik')
		);
		
		$id_warga = $this->input->post('id_warga');
		$pass = md5($this->input->post('password'));
		
		$stat = $this->authentication_model->update_data_warga($id_warga, $pass, $data);
		
		if($stat > 0){
			$response = array('Status' => "Success", "Code" => 200);
			$this->output->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
						
		}else{
			$response = array('Status' => "Tidak Ada Perubahan", "Code" => 401);
			$this->output->set_status_header(401)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
		}
	}
	
	public function update_pass_warga(){
		$this->check_api_key();
		
		$data = array(
			'password' => md5($this->input->post('password_baru'))
		);
		
		$username = $this->input->post('username');
		$id_warga = $this->input->post('id_warga');
		$pass = md5($this->input->post('password_lama'));
		
		$stat = $this->authentication_model->update_pass_warga($id_warga, $pass, $data, $username);
		
		if($stat > 0){
			$response = array('Status' => "Success", "Code" => 200);
			$this->output->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
						
		}else{
			$response = array('Status' => "Tidak Ada Perubahan", "Code" => 401);
			$this->output->set_status_header(401)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
		}
	}
	
	public function get_data_warga(){
		$this->check_api_key();
		
		$data = array(
			'username' => $this->input->post('username'),
			'id_warga' => $this->input->post('id_warga')
		);
		
		$response = $this->authentication_model->get_data_warga($data);
		
		if($response != null){
			$response = array('Status' => "Success", "Code" => 200, "Data" => $response);
			
			$this->output->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
		}else{
			$response = array('Status' => "Access Forbidden", "Code" => 404);
			
			$this->output->set_status_header(404)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
		}
	}

	public function daftar_petugas(){
		$this->check_api_key();
		
		$id_petugas = $this->generate_new_id("petugas","id_petugas","PTG");
		
		$data = array(
			'id_petugas' => $id_petugas,
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')), 
			'nama' => $this->input->post('nama'),
			'jabatan' => $this->input->post('jabatan'),
			'nip' => $this->input->post('nip'),
			'kontak' => $this->input->post('kontak'),
			'nik' => $this->input->post('nik')
		);
		
		$response = array('Status' => "Success", "Code" => 200);
		
		$this->authentication_model->daftar_petugas($data);
		
		$this->output->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
	}
	
	public function update_data_petugas(){
		$this->check_api_key();
		
		$data = array(
			'username' => $this->input->post('username'),
			'nama' => $this->input->post('nama'),
			'jabatan' => $this->input->post('jabatan'),
			'nip' => $this->input->post('nip'),
			'kontak' => $this->input->post('kontak'),
			'nik' => $this->input->post('nik')
		);
		
		$id_petugas = $this->input->post('id_petugas');
		$pass = md5($this->input->post('password'));
		
		$stat = $this->authentication_model->update_data_petugas($id_petugas, $pass, $data);
		
		if($stat > 0){
			$response = array('Status' => "Success", "Code" => 200);
			$this->output->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
						
		}else{
			$response = array('Status' => "Tidak Ada Perubahan", "Code" => 401);
			$this->output->set_status_header(401)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
		}
	}
	
	public function update_pass_petugas(){
		$this->check_api_key();
		
		$data = array(
			'password' => md5($this->input->post('password_baru'))
		);
		
		$username = $this->input->post('username');
		$id_petugas = $this->input->post('id_petugas');
		$pass = md5($this->input->post('password_lama'));
		
		$stat = $this->authentication_model->update_pass_petugas($id_petugas, $pass, $data, $username);
		
		if($stat > 0){
			$response = array('Status' => "Success", "Code" => 200);
			$this->output->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
						
		}else{
			$response = array('Status' => "Tidak Ada Perubahan", "Code" => 401);
			$this->output->set_status_header(401)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
		}
	}
	
	public function get_data_petugas(){
		$this->check_api_key();
		
		$data = array(
			'username' => $this->input->post('username'),
			'id_petugas' => $this->input->post('id_petugas')
		);
		
		$response = $this->authentication_model->get_data_petugas($data);
		
		if($response != null){
			$response = array('Status' => "Success", "Code" => 200, "Data" => $response);
			
			$this->output->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
		}else{
			$response = array('Status' => "Access Forbidden", "Code" => 401);
			
			$this->output->set_status_header(401)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
		}
	}
	
	public function login_warga(){
		$this->check_api_key();
		
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')), 
		);
		
		$response = $this->authentication_model->login_warga($data);
		
		if($response != null){
			$response = array('Status' => "Success", "Code" => 200, "Data" => $response);
			
			$this->output->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
		}else{
			$response = array('Status' => "Access Forbidden", "Code" => 404);
			
			$this->output->set_status_header(404)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
		}
	}
	
	public function login_petugas(){
		$this->check_api_key();
		
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')), 
		);
		
		$response = $this->authentication_model->login_petugas($data);
		
		if($response != null){
			$response = array('Status' => "Success", "Code" => 200, "Data" => $response);
			
			$this->output->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
		}else{
			$response = array('Status' => "Access Forbidden", "Code" => 404);
			
			$this->output->set_status_header(404)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
		}
	}
	
	public function generate_new_id($table_name, $column_id, $initial){
		$last_id = $this->authentication_model->last_id($table_name, $column_id);
		
		if($last_id == null){
			$new_id = $initial."001";
		}else{
			$num = (int) substr($last_id,3);
			$num++;
			
			if($num < 10){
				$new_id = $initial."00".$num;
			}else if($num < 100){
				$new_id = $initial."0".$num;
			}else{
				$new_id = $initial.$num;
			}
		}
		
		return $new_id;
	}
	
	public function set_surat_keterangan_pergi(){
		$this->check_api_key();
		
		$id_surat = $this->generate_new_id("surat","id_surat","SRT");
		$id_sub_surat = $this->generate_new_id("keterangan_berpergian","id_sub_surat","SUB");
		
		$data_surat = array(
			'id_surat' => $id_surat,
			'id_pemohon' => $this->input->post('id_pemohon'),
			'nomor_surat' => $this->input->post('nomor_surat'), 
			'tipe_surat' => $this->input->post('tipe_surat'),
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'kebangsaan' => $this->input->post('kebangsaan'),
			'status_pernikahan' => $this->input->post('status_pernikahan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nik' => $this->input->post('nik'),
			'tanggal_surat' => $this->input->post('tanggal_surat'),
			'atas_nama_ttd' => $this->input->post('atas_nama_ttd'),
			'jabatan_ttd' => $this->input->post('jabatan_ttd'),
			'nip_ttd' => $this->input->post('nip_ttd')
		);
		
		$data_sub_surat = array(
			'id_sub_surat' => $id_sub_surat,
			'id_surat' => $id_surat,
			'daerah_keberadaan' => $this->input->post('daerah_keberadaan'), 
			'tahun_kepergian' => $this->input->post('tahun_kepergian')
		);
		
		if($this->surat_model->set_surat($data_surat) > 0){
			if($this->surat_model->set_sub_surat($data_sub_surat, 'keterangan_berpergian') > 0){
				
				$response = array('Status' => "Success", "Code" => 200);
				
				$this->output->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}else{
				$response = array('Status' => "Failed", "Code" => 404);
				
				$this->output->set_status_header(404)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}
		}else{
			$response = array('Status' => "Failed", "Code" => 404);
				
			$this->output->set_status_header(404)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response));
		}
	}
	
	public function set_surat_kelakuan_baik(){
		$this->check_api_key();
		
		$id_surat = $this->generate_new_id("surat","id_surat","SRT");
		$id_sub_surat = $this->generate_new_id("keterangan_kelakuan","id_sub_surat","SUB");
		
		$data_surat = array(
			'id_surat' => $id_surat,
			'id_pemohon' => $this->input->post('id_pemohon'),
			'nomor_surat' => $this->input->post('nomor_surat'), 
			'tipe_surat' => $this->input->post('tipe_surat'),
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'kebangsaan' => $this->input->post('kebangsaan'),
			'status_pernikahan' => $this->input->post('status_pernikahan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nik' => $this->input->post('nik'),
			'tanggal_surat' => $this->input->post('tanggal_surat'),
			'atas_nama_ttd' => $this->input->post('atas_nama_ttd'),
			'jabatan_ttd' => $this->input->post('jabatan_ttd'),
			'nip_ttd' => $this->input->post('nip_ttd')
		);
		
		$data_sub_surat = array(
			'id_sub_surat' => $id_sub_surat,
			'id_surat' => $id_surat,
		);
		
		if($this->surat_model->set_surat($data_surat) > 0){
			if($this->surat_model->set_sub_surat($data_sub_surat, 'keterangan_kelakuan') > 0){
				
				$response = array('Status' => "Success", "Code" => 200);
				
				$this->output->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}else{
				$response = array('Status' => "Failed", "Code" => 404);
				
				$this->output->set_status_header(404)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}
		}else{
			$response = array('Status' => "Failed", "Code" => 404);
				
			$this->output->set_status_header(404)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response));
		}
	}
	
	public function set_surat_keterangan_cerai(){
		$this->check_api_key();
		
		$id_surat = $this->generate_new_id("surat","id_surat","SRT");
		$id_sub_surat = $this->generate_new_id("keterangan_cerai","id_sub_surat","SUB");
		
		$data_surat = array(
			'id_surat' => $id_surat,
			'id_pemohon' => $this->input->post('id_pemohon'),
			'nomor_surat' => $this->input->post('nomor_surat'), 
			'tipe_surat' => $this->input->post('tipe_surat'),
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'kebangsaan' => $this->input->post('kebangsaan'),
			'status_pernikahan' => $this->input->post('status_pernikahan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nik' => $this->input->post('nik'),
			'tanggal_surat' => $this->input->post('tanggal_surat'),
			'atas_nama_ttd' => $this->input->post('atas_nama_ttd'),
			'jabatan_ttd' => $this->input->post('jabatan_ttd'),
			'nip_ttd' => $this->input->post('nip_ttd')
		);
		
		$data_sub_surat = array(
			'id_sub_surat' => $id_sub_surat,
			'id_surat' => $id_surat,
			'status_cerai' => $this->input->post("status_cerai"),
			'nama_pasangan' => $this->input->post("nama_pasangan"),
			'tahun_cerai' => $this->input->post("tahun_cerai"),
			'tempat_cerai' => $this->input->post("tempat_cerai"),
		);
		
		if($this->surat_model->set_surat($data_surat) > 0){
			if($this->surat_model->set_sub_surat($data_sub_surat, 'keterangan_cerai') > 0){
				
				$response = array('Status' => "Success", "Code" => 200);
				
				$this->output->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}else{
				$response = array('Status' => "Failed", "Code" => 404);
				
				$this->output->set_status_header(404)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}
		}else{
			$response = array('Status' => "Failed", "Code" => 404);
				
			$this->output->set_status_header(404)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response));
		}
	}
	
	public function set_surat_keterangan_ksm(){
		$this->check_api_key();
		
		$id_surat = $this->generate_new_id("surat","id_surat","SRT");
		$id_sub_surat = $this->generate_new_id("keterangan_ksm","id_sub_surat","SUB");
		
		$data_surat = array(
			'id_surat' => $id_surat,
			'id_pemohon' => $this->input->post('id_pemohon'),
			'nomor_surat' => $this->input->post('nomor_surat'), 
			'tipe_surat' => $this->input->post('tipe_surat'),
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'kebangsaan' => $this->input->post('kebangsaan'),
			'status_pernikahan' => $this->input->post('status_pernikahan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nik' => $this->input->post('nik'),
			'tanggal_surat' => $this->input->post('tanggal_surat'),
			'atas_nama_ttd' => $this->input->post('atas_nama_ttd'),
			'jabatan_ttd' => $this->input->post('jabatan_ttd'),
			'nip_ttd' => $this->input->post('nip_ttd')
		);
		
		$data_sub_surat = array(
			'id_sub_surat' => $id_sub_surat,
			'id_surat' => $id_surat,
			'nomor_polisi' => $this->input->post("nomor_polisi"),
			'merk' => $this->input->post("merk"),
			'tipe' => $this->input->post("tipe"),
			'jenis' => $this->input->post("jenis"),
			'tahun_pembuatan' => $this->input->post("tahun_pembuatan"),
			'tahun_perakitan' => $this->input->post("tahun_perakitan"),
			'isi_silinder' => $this->input->post("isi_silinder"),
			'warna' => $this->input->post("warna"),
			'nomor_rangka' => $this->input->post("nomor_rangka"),
			'nomor_mesin' => $this->input->post("nomor_mesin"),
			'nomor_bpkb' => $this->input->post("nomor_bpkb"),
			'atas_nama_bpkb' => $this->input->post("atas_nama_bpkb")
		);

		if($this->surat_model->set_surat($data_surat) > 0){
			if($this->surat_model->set_sub_surat($data_sub_surat, 'keterangan_ksm') > 0){
				
				$response = array('Status' => "Success", "Code" => 200);
				
				$this->output->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}else{
				$response = array('Status' => "Failed", "Code" => 404);
				
				$this->output->set_status_header(404)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}
		}else{
			$response = array('Status' => "Failed", "Code" => 404);
				
			$this->output->set_status_header(404)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response));
		}
	}
	
	public function set_surat_keterangan_bebas_pajak(){
		$this->check_api_key();
		
		$id_surat = $this->generate_new_id("surat","id_surat","SRT");
		$id_sub_surat = $this->generate_new_id("keterangan_bebas_pajak","id_sub_surat","SUB");
		
		$data_surat = array(
			'id_surat' => $id_surat,
			'id_pemohon' => $this->input->post('id_pemohon'),
			'nomor_surat' => $this->input->post('nomor_surat'), 
			'tipe_surat' => $this->input->post('tipe_surat'),
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'kebangsaan' => $this->input->post('kebangsaan'),
			'status_pernikahan' => $this->input->post('status_pernikahan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nik' => $this->input->post('nik'),
			'tanggal_surat' => $this->input->post('tanggal_surat'),
			'atas_nama_ttd' => $this->input->post('atas_nama_ttd'),
			'jabatan_ttd' => $this->input->post('jabatan_ttd'),
			'nip_ttd' => $this->input->post('nip_ttd')
		);
		
		$data_sub_surat = array(
			'id_sub_surat' => $id_sub_surat,
			'id_surat' => $id_surat,
			'objek_pajak' => $this->input->post("objek_pajak")
		);

		if($this->surat_model->set_surat($data_surat) > 0){
			if($this->surat_model->set_sub_surat($data_sub_surat, 'keterangan_bebas_pajak') > 0){
				
				$response = array('Status' => "Success", "Code" => 200);
				
				$this->output->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}else{
				$response = array('Status' => "Failed", "Code" => 404);
				
				$this->output->set_status_header(404)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}
		}else{
			$response = array('Status' => "Failed", "Code" => 404);
				
			$this->output->set_status_header(404)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response));
		}
	}
	
	public function set_surat_keterangan_beda_nama(){
		$this->check_api_key();
		
		$id_surat = $this->generate_new_id("surat","id_surat","SRT");
		$id_sub_surat = $this->generate_new_id("keterangan_beda_nama","id_sub_surat","SUB");
		
		$data_surat = array(
			'id_surat' => $id_surat,
			'id_pemohon' => $this->input->post('id_pemohon'),
			'nomor_surat' => $this->input->post('nomor_surat'), 
			'tipe_surat' => $this->input->post('tipe_surat'),
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'kebangsaan' => $this->input->post('kebangsaan'),
			'status_pernikahan' => $this->input->post('status_pernikahan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nik' => $this->input->post('nik'),
			'tanggal_surat' => $this->input->post('tanggal_surat'),
			'atas_nama_ttd' => $this->input->post('atas_nama_ttd'),
			'jabatan_ttd' => $this->input->post('jabatan_ttd'),
			'nip_ttd' => $this->input->post('nip_ttd')
		);
		
		$data_sub_surat = array(
			'id_sub_surat' => $id_sub_surat,
			'id_surat' => $id_surat,
			'objek_salah_nama' => $this->input->post('objek_salah_nama'),
			'nama_objek_salah_nama' => $this->input->post('nama_objek_salah_nama'),
			'tanggal_lahir_objek_salah_nama' => $this->input->post('tanggal_lahir_objek_salah_nama'),
			'tempat_lahir_objek_salah_nama' => $this->input->post('tempat_lahir_objek_salah_nama'),
			'jenis_kelamin_objek_salah_nama' => $this->input->post('jenis_kelamin_objek_salah_nama'),
			'alamat_objek_salah_nama' =>$this->input->post('alamat_objek_salah_nama')
		);

		if($this->surat_model->set_surat($data_surat) > 0){
			if($this->surat_model->set_sub_surat($data_sub_surat, 'keterangan_beda_nama') > 0){
				
				$response = array('Status' => "Success", "Code" => 200);
				
				$this->output->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}else{
				$response = array('Status' => "Failed", "Code" => 404);
				
				$this->output->set_status_header(404)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}
		}else{
			$response = array('Status' => "Failed", "Code" => 404);
				
			$this->output->set_status_header(404)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response));
		}
	}
	
	public function set_surat_keterangan_kehilangan(){
		$this->check_api_key();
		
		$id_surat = $this->generate_new_id("surat","id_surat","SRT");
		$id_sub_surat = $this->generate_new_id("keterangan_kehilangan","id_sub_surat","SUB");
		
		$data_surat = array(
			'id_surat' => $id_surat,
			'id_pemohon' => $this->input->post('id_pemohon'),
			'nomor_surat' => $this->input->post('nomor_surat'), 
			'tipe_surat' => $this->input->post('tipe_surat'),
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'kebangsaan' => $this->input->post('kebangsaan'),
			'status_pernikahan' => $this->input->post('status_pernikahan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nik' => $this->input->post('nik'),
			'tanggal_surat' => $this->input->post('tanggal_surat'),
			'atas_nama_ttd' => $this->input->post('atas_nama_ttd'),
			'jabatan_ttd' => $this->input->post('jabatan_ttd'),
			'nip_ttd' => $this->input->post('nip_ttd')
		);
		
		$data_sub_surat = array(
			'id_sub_surat' => $id_sub_surat,
			'id_surat' => $id_surat,
			'objek_hilang' => $this->input->post('objek_hilang'),
			'tempat_hilang' => $this->input->post('tempat_hilang'),
			'tanggal_hilang' => $this->input->post('tanggal_hilang')
		);

		if($this->surat_model->set_surat($data_surat) > 0){
			if($this->surat_model->set_sub_surat($data_sub_surat, 'keterangan_kehilangan') > 0){
				
				$response = array('Status' => "Success", "Code" => 200);
				
				$this->output->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}else{
				$response = array('Status' => "Failed", "Code" => 404);
				
				$this->output->set_status_header(404)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}
		}else{
			$response = array('Status' => "Failed", "Code" => 404);
				
			$this->output->set_status_header(404)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response));
		}
	}
	
	public function set_surat_keterangan_telah_menikah(){
		$this->check_api_key();
		
		$id_surat = $this->generate_new_id("surat","id_surat","SRT");
		$id_sub_surat = $this->generate_new_id("keterangan_telah_menikah","id_sub_surat","SUB");
		
		$data_surat = array(
			'id_surat' => $id_surat,
			'id_pemohon' => $this->input->post('id_pemohon'),
			'nomor_surat' => $this->input->post('nomor_surat'), 
			'tipe_surat' => $this->input->post('tipe_surat'),
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'kebangsaan' => $this->input->post('kebangsaan'),
			'status_pernikahan' => $this->input->post('status_pernikahan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nik' => $this->input->post('nik'),
			'tanggal_surat' => $this->input->post('tanggal_surat'),
			'atas_nama_ttd' => $this->input->post('atas_nama_ttd'),
			'jabatan_ttd' => $this->input->post('jabatan_ttd'),
			'nip_ttd' => $this->input->post('nip_ttd')
		);
		
		$data_sub_surat = array(
			'id_sub_surat' => $id_sub_surat,
			'id_surat' => $id_surat,
			'nama_pasangan' => $this->input->post('nama_pasangan'),
			'tanggal_lahir_pasangan' => $this->input->post('tanggal_lahir_pasangan'),
			'tempat_lahir_pasangan' => $this->input->post('tempat_lahir_pasangan'),
			'jenis_kelamin_pasangan' => $this->input->post('jenis_kelamin_pasangan'),
			'agama_pasangan' => $this->input->post('agama_pasangan'),
			'kebangsaan_pasangan' => $this->input->post('kebangsaan_pasangan'),
			'pekerjaan_pasangan' => $this->input->post('pekerjaan_pasangan'),
			'alamat_pasangan' => $this->input->post('alamat_pasangan'),
			'tanggal_nikah' => $this->input->post('tanggal_nikah'),
			'tempat_nikah' => $this->input->post('tempat_nikah')
		);

		if($this->surat_model->set_surat($data_surat) > 0){
			if($this->surat_model->set_sub_surat($data_sub_surat, 'keterangan_telah_menikah') > 0){
				
				$response = array('Status' => "Success", "Code" => 200);
				
				$this->output->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}else{
				$response = array('Status' => "Failed", "Code" => 404);
				
				$this->output->set_status_header(404)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}
		}else{
			$response = array('Status' => "Failed", "Code" => 404);
				
			$this->output->set_status_header(404)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response));
		}
	}
	
	public function set_surat_pertanggung_jawaban_ortu(){
		$this->check_api_key();
		
		$id_surat = $this->generate_new_id("surat","id_surat","SRT");
		$id_sub_surat = $this->generate_new_id("pertanggung_jawaban_ortu","id_sub_surat","SUB");
		
		$data_surat = array(
			'id_surat' => $id_surat,
			'id_pemohon' => $this->input->post('id_pemohon'),
			'nomor_surat' => $this->input->post('nomor_surat'), 
			'tipe_surat' => $this->input->post('tipe_surat'),
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'kebangsaan' => $this->input->post('kebangsaan'),
			'status_pernikahan' => $this->input->post('status_pernikahan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nik' => $this->input->post('nik'),
			'tanggal_surat' => $this->input->post('tanggal_surat'),
			'atas_nama_ttd' => $this->input->post('atas_nama_ttd'),
			'jabatan_ttd' => $this->input->post('jabatan_ttd'),
			'nip_ttd' => $this->input->post('nip_ttd')
		);
		
		$data_sub_surat = array(
			'id_sub_surat' => $id_sub_surat,
			'id_surat' => $id_surat,
			'nama_anak' => $this->input->post('nama_anak'),
			'tempat_lahir_anak' => $this->input->post('tempat_lahir_anak'),
			'tanggal_lahir_anak' => $this->input->post('tanggal_lahir_anak'),
			'jenis_kelamin_anak' => $this->input->post('jenis_kelamin_anak'),
			'agama_anak' => $this->input->post('agama_anak'),
			'kebangsaan_anak' => $this->input->post('kebangsaan_anak'),
			'pekerjaan_anak' => $this->input->post('pekerjaan_anak'),
			'alamat_anak' => $this->input->post('alamat_anak'),
			'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
			'nama_instansi_kegiatan' => $this->input->post('nama_instansi_kegiatan'),
			'alamat_instansi' => $this->input->post('alamat_instansi'),
			'hubungan_ortu_dengan_anak' => $this->input->post('hubungan_ortu_dengan_anak'),
			'nama_kades' => $this->input->post('nama_kades'),
			'nama_desa' => $this->input->post('nama_desa'),
			'nama_kadus' => $this->input->post('nama_kadus'),
			'nama_dusun' => $this->input->post('nama_dusun')
		);

		if($this->surat_model->set_surat($data_surat) > 0){
			if($this->surat_model->set_sub_surat($data_sub_surat, 'pertanggung_jawaban_ortu') > 0){
				
				$response = array('Status' => "Success", "Code" => 200);
				
				$this->output->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}else{
				$response = array('Status' => "Failed", "Code" => 404);
				
				$this->output->set_status_header(404)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response));
			}
		}else{
			$response = array('Status' => "Failed", "Code" => 404);
				
			$this->output->set_status_header(404)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response));
		}
	}
	
	public function get_all_surat(){
		$this->check_api_key();
		
		$tipe = $this->input->post("tipe");
		
		if($tipe == ""){
			$response = $this->surat_model->get_all_surat(null, null);
		}else{
			$response = $this->surat_model->get_all_surat($tipe, null);
		}
		
		
		$this->output->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response));
	}
	
	public function get_warga_surat(){
		$this->check_api_key();
		
		$tipe = $this->input->post("tipe");
		$id_warga = $this->input->post("id_warga");
		
		if($tipe != null){
			$response = $this->surat_model->get_all_surat($tipe, $id_warga);
		}else{
			$response = $this->surat_model->get_all_surat(null, $id_warga);
		}
		
		$this->output->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response));
	}
	
	public function get_detail_surat(){
		$this->check_api_key();
		
		$id_surat = $this->input->post("id_surat");
		$tipe = $this->input->post("tipe");
		$tabel_surat = "";
		
		switch($tipe){
			case "Keterangan Berpergian" : $tabel_surat = "keterangan_berpergian"; break;
			case "Keterangan Kelakuan Baik" : $tabel_surat = "keterangan_kelakuan"; break;
			case "Keterangan Cerai" : $tabel_surat = "keterangan_cerai"; break;
			case "Keterangan Kepemilikan Sepeda Motor" : $tabel_surat = "keterangan_ksm"; break;
			case "Keterangan Bebas Pajak" : $tabel_surat = "keterangan_bebas_pajak"; break;
			case "Keterangan Beda Nama" : $tabel_surat = "keterangan_beda_nama"; break;
			case "Keterangan Kehilangan" : $tabel_surat = "keterangan_kehilangan"; break;
			case "Keterangan Telah Menikah" : $tabel_surat = "keterangan_telah_menikah"; break;
			case "Pertanggungjawaban Orang Tua" : $tabel_surat = "pertanggung_jawaban_ortu"; break;
			default : $tabel_surat = ""; break;
		}
		
		
		$response = $this->surat_model->get_detail_surat($tabel_surat, $id_surat);
		
		$this->output->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response));
	}
	
	
	public function update_surat(){
		$this->check_api_key();
		
		$id_surat = $this->input->post("id_surat");
		$id_sub_surat = $this->input->post("id_sub_surat");
		$tipe = $this->input->post("tipe");
		$tabel_surat = "";
		$data_sub_surat = [];
		
		$data_surat = array(
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'kebangsaan' => $this->input->post('kebangsaan'),
			'status_pernikahan' => $this->input->post('status_pernikahan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nik' => $this->input->post('nik')
		);
		
		switch($tipe){
			case "Keterangan Berpergian" : 
				$tabel_surat = "keterangan_berpergian"; 
				$data_sub_surat = array(
					'daerah_keberadaan' => $this->input->post('daerah_keberadaan'), 
					'tahun_kepergian' => $this->input->post('tahun_kepergian')
				);
			break;
			case "Keterangan Cerai" : 
				$tabel_surat = "keterangan_cerai"; 
				$data_sub_surat = array(
					'status_cerai' => $this->input->post("status_cerai"),
					'nama_pasangan' => $this->input->post("nama_pasangan"),
					'tahun_cerai' => $this->input->post("tahun_cerai"),
					'tempat_cerai' => $this->input->post("tempat_cerai"),
				);
			break;
			case "Keterangan Kepemilikan Sepeda Motor" : 
				$tabel_surat = "keterangan_ksm"; 
				$data_sub_surat = array(
					'nomor_polisi' => $this->input->post("nomor_polisi"),
					'merk' => $this->input->post("merk"),
					'tipe' => $this->input->post("tipe"),
					'jenis' => $this->input->post("jenis"),
					'tahun_pembuatan' => $this->input->post("tahun_pembuatan"),
					'tahun_perakitan' => $this->input->post("tahun_perakitan"),
					'isi_silinder' => $this->input->post("isi_silinder"),
					'warna' => $this->input->post("warna"),
					'nomor_rangka' => $this->input->post("nomor_rangka"),
					'nomor_mesin' => $this->input->post("nomor_mesin"),
					'nomor_bpkb' => $this->input->post("nomor_bpkb"),
					'atas_nama_bpkb' => $this->input->post("atas_nama_bpkb")
				);
			break;
			case "Keterangan Bebas Pajak" : 
				$tabel_surat = "keterangan_bebas_pajak"; 
				$data_sub_surat = array(
					'objek_pajak' => $this->input->post("objek_pajak")
				);
			break;
			case "Keterangan Beda Nama" : 
				$tabel_surat = "keterangan_beda_nama"; 
				$data_sub_surat = array(
					'objek_salah_nama' => $this->input->post('objek_salah_nama'),
					'nama_objek_salah_nama' => $this->input->post('nama_objek_salah_nama'),
					'tanggal_lahir_objek_salah_nama' => $this->input->post('tanggal_lahir_objek_salah_nama'),
					'tempat_lahir_objek_salah_nama' => $this->input->post('tempat_lahir_objek_salah_nama'),
					'jenis_kelamin_objek_salah_nama' => $this->input->post('jenis_kelamin_objek_salah_nama'),
					'alamat_objek_salah_nama' =>$this->input->post('alamat_objek_salah_nama')
				);
			break;
			case "Keterangan Kehilangan" : 
				$tabel_surat = "keterangan_kehilangan"; 
				$data_sub_surat = array(
					'objek_hilang' => $this->input->post('objek_hilang'),
					'tempat_hilang' => $this->input->post('tempat_hilang'),
					'tanggal_hilang' => $this->input->post('tanggal_hilang')
				);
			break;
			case "Keterangan Telah Menikah" : 
				$tabel_surat = "keterangan_telah_menikah"; 
				$data_sub_surat = array(
					'nama_pasangan' => $this->input->post('nama_pasangan'),
					'tanggal_lahir_pasangan' => $this->input->post('tanggal_lahir_pasangan'),
					'tempat_lahir_pasangan' => $this->input->post('tempat_lahir_pasangan'),
					'jenis_kelamin_pasangan' => $this->input->post('jenis_kelamin_pasangan'),
					'agama_pasangan' => $this->input->post('agama_pasangan'),
					'kebangsaan_pasangan' => $this->input->post('kebangsaan_pasangan'),
					'pekerjaan_pasangan' => $this->input->post('pekerjaan_pasangan'),
					'alamat_pasangan' => $this->input->post('alamat_pasangan'),
					'tanggal_nikah' => $this->input->post('tanggal_nikah'),
					'tempat_nikah' => $this->input->post('tempat_nikah')
				);
			break;
			case "Pertanggungjawaban Orang Tua" : 
				$tabel_surat = "pertanggung_jawaban_ortu";
				$data_sub_surat = array(
					'nama_anak' => $this->input->post('nama_anak'),
					'tempat_lahir_anak' => $this->input->post('tempat_lahir_anak'),
					'tanggal_lahir_anak' => $this->input->post('tanggal_lahir_anak'),
					'jenis_kelamin_anak' => $this->input->post('jenis_kelamin_anak'),
					'agama_anak' => $this->input->post('agama_anak'),
					'kebangsaan_anak' => $this->input->post('kebangsaan_anak'),
					'pekerjaan_anak' => $this->input->post('pekerjaan_anak'),
					'alamat_anak' => $this->input->post('alamat_anak'),
					'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
					'nama_instansi_kegiatan' => $this->input->post('nama_instansi_kegiatan'),
					'alamat_instansi' => $this->input->post('alamat_instansi'),
					'hubungan_ortu_dengan_anak' => $this->input->post('hubungan_ortu_dengan_anak'),
					'nama_kades' => $this->input->post('nama_kades'),
					'nama_desa' => $this->input->post('nama_desa'),
					'nama_kadus' => $this->input->post('nama_kadus'),
					'nama_dusun' => $this->input->post('nama_dusun')
				);
			break;
			default : $tabel_surat = ""; break;
		}
		
		$statMain = $this->surat_model->update_surat($id_surat, $data_surat);
		
		if($tipe != 'Keterangan Kelakuan Baik'){
			$stat = $this->surat_model->update_sub_surat($id_surat, $id_sub_surat, $data_sub_surat, $tabel_surat);
			
			if($stat > 0 || $statMain > 0){
				$response = array('Status' => "Success", "Code" => 200);
				$this->output->set_status_header(200)
							->set_content_type('application/json', 'utf-8')
							->set_output(json_encode($response));
			}else{
				$response = array('Status' => "Tidak Ada Perubahan", "Code" => 401);
				$this->output->set_status_header(401)
							->set_content_type('application/json', 'utf-8')
							->set_output(json_encode($response));
			}
		}else{
			if($statMain > 0){
				$this->output->set_status_header(200)
							->set_content_type('application/json', 'utf-8')
							->set_output(json_encode($response));
			}else{
				$response = array('Status' => "Tidak Ada Perubahan", "Code" => 401);
				$this->output->set_status_header(401)
							->set_content_type('application/json', 'utf-8')
							->set_output(json_encode($response));
			}
		}
	}
	
	public function cancel_surat(){
		$this->check_api_key();
		
		$id_surat = $this->input->post("id_surat");
		
		$stat = $this->surat_model->cancel_surat($id_surat);
		
		if($stat > 0){
			$response = array('Status' => "Success", "Code" => 200);
			$this->output->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
						
		}else{
			$response = array('Status' => "Tidak Ada Perubahan", "Code" => 401);
			$this->output->set_status_header(401)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response));
		}
	}
}