<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_mobil extends CI_Controller {

	public function index() {
		$data['title'] = 'Kelola Mobil';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola Mobil';
		$data['alamat2'] = 'Daftar Mobil';

		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$list_mobil = $this->mobil->getAll();
		$data['mobil'] = $list_mobil;

		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;

		$this->load->view('admin/kelola_mobil/daftar_mobil.php', $data);
	}

	public function view() {
		$data['title'] = 'View Mobil';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola Mobil';
		$data['alamat2'] = 'Daftar Mobil';
		$data['alamat3'] = 'View';
		$data['cardTitle'] = 'Data Lengkap Mobil';

		$id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$data['data_mobil'] = $this->mobil->findById($id);

		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;

		$this->load->view('admin/kelola_mobil/view_mobil.php', $data);

	}
     
	public function form() {
		$data['title'] = 'Form Mobil';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola Mobil';
		$data['alamat2'] = 'Daftar Mobil';
		$data['alamat3'] = 'Form';

		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;

		$this->load->view('admin/kelola_mobil/tambah_mobil.php', $data);
	}

	public function save() {

		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');

		$nopol = $this->input->post('nopol');
		$warna = $this->input->post('warna');
		$biaya_sewa = $this->input->post('biaya_sewa');
		$deskripsi = $this->input->post('deskripsi');
		$cc = $this->input->post('cc');
		$tahun = $this->input->post('tahun');
		$merk = $this->input->post('merk');
		$foto = 'nopict.jpg';
		$idupdate = $this->input->post('idupdate');
		
		$list_mobil = $this->mobil->getAll();

		foreach($list_mobil as $obj) {
			if($nopol === $obj->nopol) {
				$varkos = true;
				break;
			} else {
				$varkos = false;
			}
		}

		if (isset($idupdate)) {
			$data_mobil = [$nopol, $warna, $biaya_sewa, $deskripsi, $cc, $tahun, $merk, $foto, $idupdate];
			$this->mobil->update($data_mobil);
			$this->mobil->autoInc();
			redirect(base_url("index.php").'/Admin/Kelola_mobil/view?id='. $idupdate);
		} else { 
			if($varkos == true) {
				$this->mobil->autoInc();
				echo '<script>alert("Duplicate Found in No. Polisi")</script>';
				redirect(base_url("index.php").'/Admin/Kelola_mobil/form', 'refresh');
			} else {
				$data_mobil = [$nopol, $warna, $biaya_sewa, $deskripsi, $cc, $tahun, $merk, $foto];
				$this->mobil->save($data_mobil);
				$update_data = $this->mobil->getAll();
				foreach($update_data as $obj) {
					$varid = $obj->id;
				}
				$this->mobil->autoInc();
				redirect(base_url("index.php").'/Admin/Kelola_mobil/view?id='. $varid);
			}
		}
	}

	public function update() {
		$data['title'] = 'Update Mobil';

		$data['home'] = 'Home';
		$data['alamat1'] = 'Kelola Mobil';
		$data['alamat2'] = 'Daftar Mobil';
		$data['alamat3'] = 'Update';
		
		$_id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$data['data_mobil'] = $this->mobil->findById($_id);

		$this->load->model('Dbrentalmobil/Merk_model', 'merk');
		$list_merk = $this->merk->getAll();
		$data['merk'] = $list_merk;
		
		$this->load->view('admin/kelola_mobil/update_mobil.php', $data);
	}

	public function delete() {
		$_id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$list_mobil = $this->mobil->getAll();

		$this->load->model('Dbrentalmobil/Perawatan_model', 'perawatan');
		$list_perawatan = $this->perawatan->getAll();

		$this->load->model('Dbrentalmobil/Sewa_model', 'sewa');
		$list_sewa = $this->sewa->getAll();
		
		foreach($list_perawatan as $obj) {
			if($_id == $obj->mobil_id) {
				$varkos = true;
				break;
			} else {
				$varkos = false;
			}
		}
		foreach ($list_sewa as $obj) {
			if ($_id == $obj->mobil_id) {
				$coba = true;
				break;
			} else {
				$coba = false;
			}
		}
		
		if($varkos == false) {
			if($coba == false) {
				$this->mobil->delete($_id);
				foreach ($list_mobil as $obj) {
					if($obj->id > $_id) {
						$idnow = $obj->id;
						$idup = $obj->id - 1;
						$data_id = [$idup, $idnow];
						$this->mobil->resetId($data_id);
					}
				}
			}else {
				echo '<script>alert("Data ini tidak dapat dihapus, cek kembali Data Sewa anda!")</script>';
			}
		}else {
			echo '<script>alert("Data ini tidak dapat dihapus, cek kembali Data Perawatan anda!")</script>';
		}
		$this->mobil->autoInc();

		redirect(base_url("index.php").'/Admin/Kelola_mobil', 'refresh');
	}
	public function upload()
	{
		$this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
		$config['upload_path']          = './img/mobil/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['max_width']            = 6000;
		$config['max_height']           = 6000;

		$id = $this->input->post('id');
		$nopol = $this->input->post('nopol');

		$explode = explode('.', $_FILES['mobil_image']['name']);
		$extension = end($explode);
		// die($_FILES['mobil_image']['name']);
		$new_name = $nopol . '.' . $extension;
		$config['file_name'] = $new_name;

		$this->load->library('upload', $config);
		$upd = [$new_name, $id];

		if (!$this->upload->do_upload('mobil_image')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error['error'] . '</div>');
			redirect(base_url("index.php") . '/Admin/Kelola_mobil/view?id=' . $id);
			// redirect('Admin/Kelola_mobil/view');
			// $this->load->view('upload_form', $error);
		} else {
			$data = array('upload_data' => $this->upload->data());
			// die(print_r($data));
			$this->mobil->updateFoto($upd);

			// $this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
			// $mobil = $this->mobil->findById($upd);

			redirect(base_url("index.php") . '/Admin/Kelola_mobil/view?id=' . $id);
			// redirect('Admin/Kelola_mobil/view', $data);
			// $this->load->view('das', $data
		}
	}
}
