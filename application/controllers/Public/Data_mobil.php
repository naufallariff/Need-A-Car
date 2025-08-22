<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_mobil extends CI_Controller {

	public function index() {
		$data['title'] = 'Data Mobil';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Data Mobil';
		$data['alamat2'] = 'Tabel Mobil';

		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$list_mobil = $this->mobil->getAll();
		$data['mobil'] = $list_mobil;

		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;

		$this->load->view('public/data_mobil/tabel_mobil.php', $data);
	}

	public function view() {
		$data['title'] = 'View Mobil';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Data Mobil';
		$data['alamat2'] = 'Tabel Mobil';
		$data['alamat3'] = 'View';
		$data['cardTitle'] = 'Data Lengkap Mobil';

		$id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$data['data_mobil'] = $this->mobil->findById($id);

		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;

		$this->load->view('public/data_mobil/view_mobil.php', $data);
	}
}
