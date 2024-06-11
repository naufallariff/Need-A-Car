<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_user extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Kelola User';

        $data['home'] = 'Home';
        $data['alamat1'] = 'Kelola User';
        $data['alamat2'] = 'Daftar User';

        $this->load->model('Dbrentalmobil/Users_model', 'users');
        $list_users = $this->users->getAll();
        $data['users'] = $list_users;

        $this->load->view('admin/data_user/daftar_user.php', $data);
    }
    public function update(){
        $data['title'] = 'Update Mobil';

        $data['home'] = 'Home';
        $data['alamat1'] = 'Kelola Mobil';
        $data['alamat2'] = 'Daftar Mobil';
        $data['alamat3'] = 'Update';


		$_id = $this->input->get('id');
		$this->load->model('Dbrentalmobil/Users_model', 'user');
		$data['data_user'] = $this->user->findById($_id);

		$this->load->view('admin/data_user/update_user.php', $data);
    }

    public function delete()
    {
        $_id = $this->input->get('id');
        $this->load->model('Dbrentalmobil/Users_model', 'user');
        $list_user = $this->user->getAll();

        $this->load->model('Dbrentalmobil/Sewa_model', 'sewa');
        $list_sewa = $this->sewa->getAll();

        foreach ($list_sewa as $obj) {
            if ($_id == $obj->mobil_id) {
                $coba = true;
                break;
            } else {
                $coba = false;
            }
        }
        
        if($coba == false) {
            $this->user->delete($_id);
            foreach ($list_user as $obj) {
                if ($obj->id > $_id) {
                    $idnow = $obj->id;
                    $idup = $obj->id - 1;
                    $data_id = [$idup, $idnow];
                    $this->user->resetId($data_id);
                }
            }
        }else {
			echo '<script>alert("Data ini tidak dapat dihapus, cek kembali Data Sewa anda!")</script>';
        }
        $this->user->autoInc();
        redirect(base_url("index.php") . '/Admin/Data_user', 'refresh');
    }
    public function ubah() {
        $this->load->model('Dbrentalmobil/Users_model', 'user');
        $data = [
            'status' => $this->input->post('status'),
            'role' => $this->input->post('roledas'),
            'id' => $this->input->post('id')
        ];
        $this->user->ubah($data);
        redirect(base_url("index.php") . '/Admin/Data_user', 'refresh');
    }
}
