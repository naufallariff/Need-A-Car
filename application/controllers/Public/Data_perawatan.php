<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_perawatan extends CI_Controller {

	public function index() {
		$data['title'] = 'Data Perawatan';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Data Perawatan';
		$data['alamat2'] = 'Tabel Perawatan';

		$this->load->model('Dbrentalmobil/Perawatan_model', 'perawatan');
		$list_perawatan = $this->perawatan->getAll();
		$data['perawatan'] = $list_perawatan;

		$this->load->model('Dbrentalmobil/Jenis_model', 'jenis');
		$list_jenis = $this->jenis->getAll();
		$data['jenis'] = $list_jenis;
        
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$list_mobil = $this->mobil->getAll();
		$data['mobil'] = $list_mobil;
        
		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;

		$this->load->view('public/data_perawatan/tabel_perawatan.php', $data);
	}

	public function view() {
		$data['title'] = 'View Perawatan';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Data Perawatan';
		$data['alamat2'] = 'Tabel Perawatan';
		$data['alamat3'] = 'View';
		$data['cardTitle'] = 'Data Lengkap Perawatan';

		$id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Perawatan_model', 'perawatan');
		$data['perawatan'] = $this->perawatan->findById($id);

		$this->load->model('Dbrentalmobil/Jenis_model', 'jenis');
		$list_jenis = $this->jenis->getAll();
		$data['jenis'] = $list_jenis;
        
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$list_mobil = $this->mobil->getAll();
		$data['mobil'] = $list_mobil;
        
		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;

		$this->load->view('public/data_perawatan/view_perawatan.php', $data);

	}
}
