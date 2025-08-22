<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_perawatan extends CI_Controller {

	public function index() {
		$data['title'] = 'Kelola Perawatan';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola Perawatan';
		$data['alamat2'] = 'Daftar Perawatan';

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

		$this->load->view('admin/kelola_perawatan/daftar_perawatan.php', $data);
	}

	public function view() {
		$data['title'] = 'View Perawatan';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola Perawatan';
		$data['alamat2'] = 'Daftar Perawatan';
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

		$this->load->view('admin/kelola_perawatan/view_perawatan.php', $data);

	}

	public function form() {
		$data['title'] = 'Form Perawatan';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola Perawatan';
		$data['alamat2'] = 'Daftar Perawatan';
		$data['alamat3'] = 'Form';

		$this->load->model('Dbrentalmobil/Jenis_model', 'jenis');
		$list_jenis = $this->jenis->getAll();
		$data['jenis'] = $list_jenis;
        
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$list_mobil = $this->mobil->getAll();
		$data['mobil'] = $list_mobil;
        
		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;

		$this->load->view('admin/kelola_perawatan/tambah_perawatan.php', $data);
	}

	public function save() {

		$this->load->model('Dbrentalmobil/Perawatan_model', 'perawatan');

		$tanggal = $this->input->post('tanggal');
		$km_mobil = $this->input->post('km_mobil');
		$deskripsi = $this->input->post('deskripsi');
		$mobil_id = $this->input->post('merk');
		$jenis = $this->input->post('jenis');
		$idupdate = $this->input->post('idupdate');

		if (isset($idupdate)) {
			$data_perawatan = [$tanggal, $km_mobil, $deskripsi, $mobil_id, $jenis, $idupdate];
			$this->perawatan->update($data_perawatan);
			$this->perawatan->autoInc();
			redirect(base_url("index.php").'/Admin/Kelola_perawatan/view?id='. $idupdate);
		} else { 
			$data_perawatan = [$tanggal, $km_mobil, $deskripsi, $mobil_id, $jenis];
			$this->perawatan->save($data_perawatan);
			$update_data = $this->perawatan->getAll();
			foreach($update_data as $obj) {
				$varid = $obj->id;
			}
			$this->perawatan->autoInc();
			redirect(base_url("index.php").'/Admin/Kelola_perawatan/view?id='. $varid);
		}
	}

	public function update() {
		$data['title'] = 'Update Perawatan';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola Perawatan';
		$data['alamat2'] = 'Daftar Perawatan';
		$data['alamat3'] = 'Update';
		
		$_id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Perawatan_model', 'perawatan');
		$data['perawatan'] = $this->perawatan->findById($_id);

		$this->load->model('Dbrentalmobil/Jenis_model', 'jenis');
		$list_jenis = $this->jenis->getAll();
		$data['jenis'] = $list_jenis;
        
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$list_mobil = $this->mobil->getAll();
		$data['mobil'] = $list_mobil;
        
		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;
		
		$this->load->view('admin/kelola_perawatan/update_perawatan.php', $data);
	}

	public function delete() {
		$_id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Perawatan_model', 'perawatan');
		$this->perawatan->delete($_id);


		$list_perawatan = $this->perawatan->getAll();
		foreach ($list_perawatan as $obj) {
			if($obj->id > $_id) {
				$idnow = $obj->id;
				$idup = $obj->id - 1;
				$data_id = [$idup, $idnow];
				$this->perawatan->resetId($data_id);
			}
		}
		$this->perawatan->autoInc();

		redirect(base_url("index.php").'/Admin/Kelola_perawatan', 'refresh');
	}
}
