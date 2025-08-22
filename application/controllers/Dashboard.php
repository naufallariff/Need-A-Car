<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
    public function index() {
        $data['title'] = 'Dashboard';
        $data['home'] = 'Home';        
        $data['alamat'] = 'Profile';

        $id = $this->session->userdata('id');
        $this->load->model('Dbrentalmobil/Users_model', 'users');
        $data['list_users'] = $this->users->findById($id);

        $this->load->view('dashboard/index', $data);
    }

	public function faq()
	{
		$data['title'] = 'Dashboard';
		$data['home'] = 'Home';
		$data['alamat'] = 'Frequently Asked Questions';
		$this->load->view('dashboard/faq', $data);
	}

	public function contact()
	{
		$data['title'] = 'Dashboard';
		$data['home'] = 'Home';
		$data['alamat'] = 'Contact';
		$this->load->view('dashboard/contact', $data);
	}
}
