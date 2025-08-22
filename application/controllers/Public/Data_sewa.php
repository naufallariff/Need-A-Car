<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_sewa extends CI_Controller {

	public function index() {
		$data['title'] = 'Data sewa';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Data sewa';
		$data['alamat2'] = 'Tabel sewa';

		$this->load->model('Dbrentalmobil/Sewa_model', 'sewa');
		$list_sewa = $this->sewa->getAll();
		$data['sewa'] = $list_sewa;

		$this->load->model('Dbrentalmobil/Users_model', 'users');
		$list_users = $this->users->getAll();
		$data['users'] = $list_users;
        
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$list_mobil = $this->mobil->getAll();
		$data['mobil'] = $list_mobil;
        
		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;

		$this->load->view('public/data_sewa/tabel_sewa.php', $data);
	}

	public function view() {
		$data['title'] = 'View sewa';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Data sewa';
		$data['alamat2'] = 'Tabel sewa';
		$data['alamat3'] = 'View';
		$data['cardTitle'] = 'Data Lengkap sewa';

		$id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Sewa_model', 'sewa');
		$data['sewa'] = $this->sewa->findById($id);

		$this->load->model('Dbrentalmobil/Users_model', 'users');
		$list_users = $this->users->getAll();
		$data['users'] = $list_users;
        
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$list_mobil = $this->mobil->getAll();
		$data['mobil'] = $list_mobil;
        
		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;

		$this->load->view('public/data_sewa/view_sewa.php', $data);

	}
}
