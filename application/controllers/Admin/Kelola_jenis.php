<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_jenis extends CI_Controller {

	public function index() {
		$data['title'] = 'Kelola Jenis';
		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola Jenis';
		$data['alamat2'] = 'Daftar Jenis';

		$this->load->model('Dbrentalmobil/Jenis_model', 'jenis');
		$list_jenis = $this->jenis->getAll();
		$data['jenis'] = $list_jenis;

		$this->load->view('admin/kelola_jenis/daftar_jenis.php', $data);
	}

	public function form() {
		$data['title'] = 'Form Jenis';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola Jenis';
		$data['alamat2'] = 'Daftar Jenis';
		$data['alamat3'] = 'Form';

		$this->load->view('admin/kelola_jenis/tambah_jenis.php', $data);
	}

	public function save() {
		$this->load->model('Dbrentalmobil/Jenis_model', 'jenis');

		$nama = $this->input->post('nama');
		$harga= $this->input->post('biaya_perawatan');
		$idupdate = $this->input->post('idupdate');

		if (isset($idupdate)) {
			$data_jenis = [$nama, $harga, $idupdate];
			$this->jenis->update($data_jenis);
			$this->jenis->autoInc();
			redirect(base_url("index.php").'/Admin/Kelola_jenis');
		} else { 
			$data_jenis = [$nama, $harga];
			$this->jenis->save($data_jenis);
			$this->jenis->autoInc();
			redirect(base_url("index.php").'/Admin/Kelola_jenis');
		}
	}

	public function update() {
		$data['title'] = 'Update Jenis';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola Jenis';
		$data['alamat2'] = 'Daftar Jenis';
		$data['alamat3'] = 'Update';
		
		$_id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Jenis_model', 'jenis');
		$data['data_jenis'] = $this->jenis->findById($_id);
		

		$this->load->view('admin/kelola_jenis/update_jenis.php', $data);
	}

	public function delete() {
		$_id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Jenis_model', 'jenis');
		
		$this->load->model('Dbrentalmobil/Perawatan_model', 'perawatan');
		$list_perawatan = $this->perawatan->getAll();
		$list_jenis = $this->jenis->getAll();
		
		foreach($list_perawatan as $obj) {
			if($_id == $obj->jenis_perawatan_id) {
				$varkos = true;
				break;
			} else {
				$varkos = false;
			}
		}
		if($varkos == false) {
			$this->jenis->delete($_id);
			foreach ($list_jenis as $obj) {
				if($obj->id > $_id) {
					$idnow = $obj->id;
					$idup = $obj->id - 1;
					$data_id = [$idup, $idnow];
					$this->jenis->resetId($data_id);
				}
			}
		}else {
			echo '<script>alert("Data ini tidak dapat dihapus, cek kembali Data Perawatan Anda!")</script>';
		}
		$this->jenis->autoInc();

		redirect(base_url("index.php").'/Admin/Kelola_jenis', 'refresh');
	}
}
