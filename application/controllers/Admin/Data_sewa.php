<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_sewa extends CI_Controller {

	public function index() {
		$data['title'] = 'Kelola sewa';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola sewa';
		$data['alamat2'] = 'Daftar sewa';

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

		$this->load->view('admin/data_sewa/daftar_sewa.php', $data);
	}

	public function view() {
		$data['title'] = 'View sewa';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola sewa';
		$data['alamat2'] = 'Daftar sewa';
		$data['alamat3'] = 'View';
		$data['cardTitle'] = 'Data Lengkap sewa';

		$id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Sewa_model', 'sewa');
		$data['sewa'] = $this->sewa->findbyId($id);

		$this->load->model('Dbrentalmobil/Users_model', 'users');
		$list_users = $this->users->getAll();
		$data['users'] = $list_users;
        
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$list_mobil = $this->mobil->getAll();
		$data['mobil'] = $list_mobil;
        
		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;

		$this->load->view('admin/data_sewa/view_sewa.php', $data);

	}
     
	public function form() {
		$data['title'] = 'Form sewa';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola sewa';
		$data['alamat2'] = 'Daftar sewa';
		$data['alamat3'] = 'Form';

		$this->load->model('Dbrentalmobil/Users_model', 'users');
		$list_users = $this->users->getAll();
		$data['users'] = $list_users;
        
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$list_mobil = $this->mobil->getAll();
		$data['mobil'] = $list_mobil;
        
		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;

		$this->load->view('admin/data_sewa/tambah_sewa.php', $data);
	}

	public function save() {

		$this->load->model('Dbrentalmobil/Sewa_model', 'sewa');

		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$tujuan = $this->input->post('tujuan');
		$mobil_id = $this->input->post('merk');
		$users = $this->input->post('users');
		$noktp = $this->input->post('noktp');
		$idupdate = $this->input->post('idupdate');

		if (isset($idupdate)) {
			$data_sewa = [$tanggal_mulai, $tanggal_akhir, $tujuan, $mobil_id, $noktp, $users, $idupdate];
			$this->sewa->update($data_sewa);
			$this->sewa->autoInc();
			redirect(base_url("index.php").'/Admin/Data_sewa/view?id='. $idupdate);
		} else { 
			$data_sewa = [$tanggal_mulai, $tanggal_akhir, $tujuan, $mobil_id, $noktp, $users];
			$this->sewa->save($data_sewa);
			$update_data = $this->sewa->getAll();
			foreach($update_data as $obj) {
				$varid = $obj->id;
			}
			$this->sewa->autoInc();
			redirect(base_url("index.php").'/Admin/Data_sewa/view?id='. $varid);
		}
	}

	public function update() {
		$data['title'] = 'Update sewa';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola sewa';
		$data['alamat2'] = 'Daftar sewa';
		$data['alamat3'] = 'Update';
		
		$_id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Sewa_model', 'sewa');
		$data['sewa'] = $this->sewa->findbyId($_id);

		$this->load->model('Dbrentalmobil/Users_model', 'users');
		$list_users = $this->users->getAll();
		$data['users'] = $list_users;
        
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$list_mobil = $this->mobil->getAll();
		$data['mobil'] = $list_mobil;
        
		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;
		
		$this->load->view('admin/data_sewa/update_sewa.php', $data);
	}

	public function delete()
	{
		$_id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Sewa_model', 'sewa');
		$list_sewa = $this->sewa->getAll();

		$this->sewa->delete($_id);

		foreach ($list_sewa as $obj) {
			if ($obj->id > $_id) {
				$idnow = $obj->id;
				$idup = $obj->id - 1;
				$data_id = [$idup, $idnow];
				$this->sewa->resetId($data_id);
			}
		}
		$this->sewa->autoInc();
		redirect(base_url("index.php") . '/Admin/Data_sewa', 'refresh');
	}
}
