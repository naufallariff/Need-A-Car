<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sewa_mobil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function sewa1()
    {
        $data['gambar1'] = 'rush-1.jpeg';
        $data['gambar2'] = 'rush-2.jpeg';
        $data['gambar3'] = 'rush-3.png';

        $data['kategori'] = '7 Penumpang';
        $data['produk'] = 'Toyota';
        $data['merk_mobil'] = 'Rush';


        $this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
        $list_mobil = $this->mobil->getAll();
        $data['mobil'] = $list_mobil;

        $this->load->model('Dbrentalmobil/Merk_model', 'merk');
        $list_merk = $this->merk->getAll();
        $data['merk'] = $list_merk;

        $this->load->view('landing_page/sewa_mobil.php', $data);
    }
    public function sewa2()
    {
        $data['gambar1'] = 'ertiga-1.png';
        $data['gambar2'] = 'ertiga-2.png';
        $data['gambar3'] = 'ertiga-3.png';

        $data['kategori'] = '7 Penumpang';
        $data['produk'] = 'Suzuki';
        $data['merk_mobil'] = 'Ertiga';

        $this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
        $list_mobil = $this->mobil->getAll();
        $data['mobil'] = $list_mobil;

        $this->load->model('Dbrentalmobil/Merk_model', 'merk');
        $list_merk = $this->merk->getAll();
        $data['merk'] = $list_merk;

        $this->load->view('landing_page/sewa_mobil.php', $data);
    }
    public function sewa3()
    {
        $data['gambar1'] = 'xpander-1.jpeg';
        $data['gambar2'] = 'xpander2.jpg';
        $data['gambar3'] = 'xpander3.png';

        $data['kategori'] = '7 Penumpang';
        $data['produk'] = 'Mitshubishi';
        $data['merk_mobil'] = 'Xpander';

        $this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
        $list_mobil = $this->mobil->getAll();
        $data['mobil'] = $list_mobil;

        $this->load->model('Dbrentalmobil/Merk_model', 'merk');
        $list_merk = $this->merk->getAll();
        $data['merk'] = $list_merk;

        $this->load->view('landing_page/sewa_mobil.php', $data);
    }
    public function sewa4()
    {
        $data['gambar1'] = 'mobilio1.png';
        $data['gambar2'] = 'mobilio2.png';
        $data['gambar3'] = 'mobilio3.png';

        $data['kategori'] = '7 Penumpang';
        $data['produk'] = 'Honda';
        $data['merk_mobil'] = 'Mobilio';

        $this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
        $list_mobil = $this->mobil->getAll();
        $data['mobil'] = $list_mobil;

        $this->load->model('Dbrentalmobil/Merk_model', 'merk');
        $list_merk = $this->merk->getAll();
        $data['merk'] = $list_merk;

        $this->load->view('landing_page/sewa_mobil.php', $data);
    }

    public function save() {

        $this->form_validation->set_rules('mulai', 'Mulai', 'required', [
            'required' => 'Data Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('akhir', 'Akhir', 'required', [
            'required' => 'Data Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('noktp', 'Noktp', 'required|trim', [
            'required' => 'Data Tidak Boleh Kosong!',
            'trim' => 'Tidak Boleh Ada Spasi!'
        ]);
        $this->form_validation->set_rules('tujuan', 'tujuan', 'required|trim', [
            'required' => 'Data Tidak Boleh Kosong!',
            'trim' => 'Tidak Boleh Ada Spasi!'
        ]);
        $this->form_validation->set_rules('mobil_id', 'Mobil_id', 'required', [
            'required' => 'Data Tidak Boleh Kosong!'
        ]);


        $this->load->model('Dbrentalmobil/Sewa_model', 'sewa');

        $data = [
            'tanggal_mulai' => $this->input->post('mulai'),
            'tanggal_akhir' => $this->input->post('akhir'),
            'tujuan' => $this->input->post('tujuan'),
            'noktp' => $this->input->post('noktp'),
            'users_id' => $this->input->post('id'),
            'mobil_id' => $this->input->post('mobil_id')
        ];

        if(!$this->session->has_userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Masuk ke akun anda!</div>');
            redirect('Login');
        }else {
            if($this->form_validation->run() == true) {
                $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Selamat, Anda berhasil menyewa mobil kami. Terimakasih 🙏</div>');
                $this->sewa->save($data);
                $this->sewa->autoInc();
                redirect("Landing_page/Sewa_mobil/sewa1");
            }else {
                $data['gambar1'] = 'rush-1.jpeg';
                $data['gambar2'] = 'rush-2.jpeg';
                $data['gambar3'] = 'rush-3.png';

                $data['kategori'] = '7 Penumpang';
                $data['produk'] = 'Toyota';
                $data['merk_mobil'] = 'Rush';


                $this->load->model('Dbrentalmobil/Mobil_model', 'mobil');
                $list_mobil = $this->mobil->getAll();
                $data['mobil'] = $list_mobil;

                $this->load->model('Dbrentalmobil/Merk_model', 'merk');
                $list_merk = $this->merk->getAll();
                $data['merk'] = $list_merk;

                $this->session->set_flashdata('message', '<div class="alert alert-danger mt-4" role="alert">Anda Belum memasukkan data</div>');
          
                $this->load->view('landing_page/sewa_mobil.php', $data);
            }
        }
    }
}
