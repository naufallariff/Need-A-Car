<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_merk extends CI_Controller {

	public function index() {
		$data['title'] = 'Data Merk';
		$data['home'] = 'Home';
		$data['alamat1'] = 'Data Merk';
		$data['alamat2'] = 'Tabel Merk';

		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;

		$this->load->view('public/data_merk/tabel_merk.php', $data);
	}
}
