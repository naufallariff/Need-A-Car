<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function register() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Data Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'required' => 'Data Tidak Boleh Kosong!',
            'is_unique' => 'Email anda telah dipakai!',
            'valid_email' => 'Email anda tidak valid!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Data Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password_valid', 'Password_valid', 'required|trim|min_length[3]|matches[password]', [
            'required' => 'Data Tidak Boleh Kosong!',
            'matches' => 'Password yang anda masukkan tidak sama!',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('terms', 'Terms', 'required', [
            'required' => 'Tolong Ceklis untuk menyetujui.'
        ]);
        

        if($this->form_validation->run() == false) {
            $data['title']='Register';
            $this->load->view('register.php', $data);
        } else {
            date_default_timezone_set("Asia/Jakarta");
            $data = [
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'email' => $this->input->post('email'),
                'created_at' => (date("Y-m-d H:i:s" )),
                'last_login' => (date("Y-m-d H:i:s" )),
                'status' => 1,
                'role' => 'public',
                'foto' => 'default.jpeg'
            ];
            $this->load->model('Dbrentalmobil/Users_model', 'users');
            $this->users->save($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Register Berhasil, Silahkan Login!</div>');
            redirect("Login");
        }
    }

    private function checkLogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->load->model('Dbrentalmobil/Users_model', 'users');
        $user = $this->users->login($email);

        // var_dump($user);
        
        if ($user) {
            if($user["status"] == 1) {
                if(md5($password) == $user["password"]) {
                    date_default_timezone_set("Asia/Jakarta");
                    $updateLastLogin = [
                        'last_login' => (date("Y-m-d H:i:s")),
                        'id' => $user['id']
                    ];
                    $this->users->lastLogin($updateLastLogin);
                    $data = [
                        'id' => $user['id'],
                        'username' => ucwords($user['username']),
                        'email' => $user['email'],
                        'bagian' => $user['role'],
                        'foto' => $user['foto'],
                        'last_login' => (date("Y-m-d H:i:s")),
                        'status' => $user['status']
                    ];
                    $this->session->set_userdata($data);
                    if($this->session->userdata['bagian'] == 'administrator') {
                        redirect('Dashboard');
                    }else {
                        redirect();
                    }
                }else {
                    $data['title'] = 'Login';
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('Login', $data);
                }
            }else {
                $data['title'] = 'Login';
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum teraktivasi</div>');
                redirect('Login', $data);
            }
        } else {
            $data['title'] = 'Login';
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda belum terdaftar</div>');
            redirect('Login', $data);
        }
    }

    public function login() {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Data Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Data Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            redirect('Login', $data);
        } else {
            $this->checkLogin();
        }
    }

    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('bagian');
        $this->session->unset_userdata('foto');
        $this->session->unset_userdata('last_login');
        $this->session->unset_userdata('status');

        $data['title'] = 'Login';
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil logout</div>');
        redirect('Login', $data);
    }
}