<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_jenis extends CI_Controller {

	public function index() {
		$data['title'] = 'Data Jenis';
		$data['home'] = 'Home';
		$data['alamat1'] = 'Data Jenis';
		$data['alamat2'] = 'Tabel Jenis';

		$this->load->model('Dbrentalmobil/Jenis_model', 'jenis');
		$list_jenis = $this->jenis->getAll();
		$data['jenis'] = $list_jenis;

		$this->load->view('public/data_jenis/tabel_jenis.php', $data);
	}
}
