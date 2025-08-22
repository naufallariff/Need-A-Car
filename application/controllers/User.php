<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Register';
        $this->load->view('register.php', $data);
    }

    public function upload()
    {
        $this->load->model('Dbrentalmobil/Users_model', 'users');
        $config['upload_path']          = './img/profil/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 6000;
        $config['max_height']           = 6000;

        $id = $this->input->post('id');


        $explode = explode('.' , $_FILES['userimage']['name']);
        $extension = end($explode);
        $new_name = 'profil'.'.'. $extension;
        $config['file_name'] = $new_name;

        $this->load->library('upload', $config);
        $upd = [$new_name, $id];
        
        if (!$this->upload->do_upload('userimage')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$error['error'].'</div>');
            redirect('Dashboard');
            // $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            // die(print_r($data));
            $this->users->updateFoto($upd);

            $user = $this->users->findById($id);

            $this->session->unset_userdata('foto');
            $this->session->set_userdata('foto', $user['foto']);

            redirect('Dashboard', $data);
            // $this->load->view('das', $data
        }
    }

    public function update()
    {
        date_default_timezone_set("Asia/Jakarta");
        $data = [
            'username' => $this->input->post('fullName'),
            'email' => $this->input->post('email'),
            'status' => 1,
            'role' => $this->input->post('status'),
            'id' => $this->input->post('id')
        ];
        $this->load->model('Dbrentalmobil/Users_model', 'users');

        $list_users = $this->users->getAll();

        foreach ($list_users as $obj) {
            if ($data['email'] == $obj->email) {
                if($data['email'] !== $data['email']) {
                    $varkos = true;
                    break;
                }else {
                    $varkos = false;
                }
            } else {
                $varkos = false;
            }
        }
        if ($varkos == true) {
            $this->users->autoInc();
            echo '<script>alert("Duplicate Found in Your Email")</script>';
            redirect(base_url("index.php") . '/Dashboard', 'refresh');
        } else {
            $this->users->update($data);
            $this->users->autoInc();

            $this->session->unset_userdata('username');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('bagian');

            $this->session->set_userdata('username', $data['username']);
            $this->session->set_userdata('email', $data['email']);
            $this->session->set_userdata('bagian', $data['role']);


            redirect(base_url("index.php") . '/Dashboard');
        }
        
    }
}
