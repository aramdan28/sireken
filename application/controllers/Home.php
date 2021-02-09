<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Home',
            'konten' => $this->Konten_model->getAllKonten(),
            'isi' => 'home/home'
        );
        $this->load->view('layout/wrap', $data, false);
    }


    public function addpesan()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $pesan = $this->input->post('pesan');

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'phone' => $phone,
            'pesan' => $pesan
        );

        $this->db->insert('tb_kontak', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">pesan terkirim</div>');
        redirect('Home');
    }
}
