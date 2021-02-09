<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konten_model', 'Menu_model', 'Pelanggan_model');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Kelola Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pegawai'] = $this->db->get('tb_pegawai')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/pegawai/kelolapegawai', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getPegawai()
    {
        header('Content-Type: application/json');
        echo $this->Pegawai_model->getPegawai();
    }

    public function addpegawai()
    {
        $id_karyawan = $this->input->post('id_karyawan');
        $name = $this->input->post('name');
        $tempatlahir = $this->input->post('tempatlahir');
        $tgllahir = $this->input->post('tgllahir');
        $alamat = $this->input->post('alamat');
        $pendidikanterakhir = $this->input->post('pendidikanterakhir');
        $date_created = $this->input->post('date_created');
        $jabatan = $this->input->post('jabatan');

        $config['upload_path']          = './assets/img/profile';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            die();
        } else {
            $_data = array('upload_data' => $this->upload->data());
            $data = array(
                'id_karyawan' => $id_karyawan,
                'name' => $name,
                'tempatlahir' => $tempatlahir,
                'tgllahir' => $tgllahir,
                'alamat' => $alamat,
                'pendidikanterakhir' => $pendidikanterakhir,
                'date_created' => $date_created,
                'image' => $_data['upload_data']['file_name']
            );

            $this->db->insert('tb_pegawai', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ditambah</div>');
            redirect('Pegawai');
        }
    }
    public function hapuspegawai($id)
    {
        $this->Pegawai_model->hapusdatapegawai($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data dihapus</div>');
        redirect('Pegawai');
    }
    public function editpegawai($id)
    {
        $data['title'] = 'Ubah Data Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['Pegawai'] = $this->Pegawai_model->getPegawaiById($id);

        $this->form_validation->set_rules('id_karyawan', 'Id_karyawan', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('tempatlahir', 'Tempatlahir', 'required');
        $this->form_validation->set_rules('tgllahir', 'Tgllahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('pendidikanterakhir', 'Pendidikanterakhir', 'required');
        $this->form_validation->set_rules('date_created', 'Date_created', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/pegawai/editpegawai', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];

            if (!empty($upload_image)) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image =  $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $new_image = isset($new_image) ? $new_image : $data['user']['image'];
            $this->Pegawai_model->ubahpegawai($new_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Pelanggan berhasil diubah!</div>');
            redirect('Pegawai');
        }
    }
}
