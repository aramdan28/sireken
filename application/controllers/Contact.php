<?php
class Contact extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hubungi_model');
    }
    function index()
    {
        $data = array(
            'title' => 'Home',
            'hubungi' => $this->Hubungi_model->getAllHubungi(),
            'isi' => 'home/home'
        );
        $this->load->view('layout/wrap', $data, false);
    }

    public function kirim_pesan()
    {


        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $pesan = $this->input->post('pesan');

            $data = array(
                'nama' => $nama,
                'email' => $email,
                'phone' => $phone,
                'pesan' => $pesan,
            );

            $this->Hubungi_model->insert_flashdata($data, 'hubungi');
            $this->session->set_flashdata('pesan', '<div class="allert alert-success alert-dismissible fade show" role="alert"> Data Informasi Berhasil Ditambahkan 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span area-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('Contact/index');
        }
    }
}
