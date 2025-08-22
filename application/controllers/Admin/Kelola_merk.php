<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_merk extends CI_Controller {

	public function index() {
		$data['title'] = 'Kelola Merk';
		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola Merk';
		$data['alamat2'] = 'Daftar Merk';

		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;

		$this->load->view('admin/kelola_merk/daftar_merk.php', $data);
	}

	public function form() {
		$data['title'] = 'Form Merk';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola Merk';
		$data['alamat2'] = 'Daftar Merk';
		$data['alamat3'] = 'Form';

		$this->load->view('admin/kelola_merk/tambah_merk.php', $data);
	}

	public function save() {
		$this->load->model('Dbrentalmobil/Merk_model', 'merk');

		$nama = $this->input->post('nama');
		$produk = $this->input->post('produk');
		$idupdate = $this->input->post('idupdate');

		if (isset($idupdate)) {
			$data_merk = [$nama, $produk, $idupdate];
			$this->merk->update($data_merk);
			$this->merk->autoInc();
			redirect(base_url("index.php").'/Admin/Kelola_merk');
		} else { 
			$data_merk = [$nama, $produk];
			$this->merk->save($data_merk);
			$this->merk->autoInc();
			redirect(base_url("index.php").'/Admin/Kelola_merk');
		}
	}

	public function update() {
		$data['title'] = 'Update Merk';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola Merk';
		$data['alamat2'] = 'Daftar Merk';
		$data['alamat3'] = 'Update';
		
		$_id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$data['data_merk'] = $this->merk->findById($_id);
		

		$this->load->view('admin/kelola_merk/update_merk.php', $data);
	}

	public function delete() {
		$_id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		
		
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$list_mobil = $this->mobil->getAll();
		$list_merk = $this->merk->getAll();
		
		foreach($list_mobil as $obj) {
			if($_id === $obj->merk_id) {
				$varkos = true;
				break;
			} else {
				$varkos = false;
			}
		}
		if($varkos == false) {
			$this->merk->delete($_id);
			// Logic Atur AutoIncrement
			foreach ($list_merk as $obj) {
				if($obj->id > $_id) {
					$idnow = $obj->id;
					$idup = $obj->id - 1;
					$data_id = [$idup, $idnow];
					$this->merk->resetId($data_id);
				}
			}
		}else {
			echo '<script>alert("Data ini tidak dapat dihapus, cek kembali data mobil anda!")</script>';
		}
		$this->merk->autoInc();
		redirect(base_url("index.php").'/Admin/Kelola_merk', 'refresh');
	}
}
