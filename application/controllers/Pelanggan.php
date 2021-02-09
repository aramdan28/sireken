<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konten_model', 'Menu_model', 'Pelanggan_model');
        is_logged_in();
    }

    public function datapelanggan()
    {
        $data['title'] = 'Data Pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // PAGINATION
        $this->load->library('pagination');


        // ambil keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        //CONFIG
        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('id_pelanggan', $data['keyword']);
        $this->db->or_like('nama', $data['keyword']);
        $this->db->or_like('idp', $data['keyword']);
        $this->db->or_like('nik', $data['keyword']);
        $this->db->or_like('alamat', $data['keyword']);
        $this->db->or_like('kampung', $data['keyword']);
        $this->db->or_like('nohp', $data['keyword']);
        $this->db->from('tb_pelanggan');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 8;


        // INITIALITATION
        $this->pagination->initialize($config);


        // $data['pelanggan'] = $this->db->get('tb_pelanggan')->result_array();
        $data['start'] = $this->uri->segment(3);
        // $data['pelanggan'] = $this->Pelanggan_model->getpelanggan();

        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kampung', 'Kampung', 'required');
        $this->form_validation->set_rules('rt', 'rt', 'required');
        $this->form_validation->set_rules('rw', 'Rw', 'required');
        $this->form_validation->set_rules('nohp', 'Nohp', 'required');
        $this->form_validation->set_rules('image', 'Image', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/pelanggan/datapelanggan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            print_r($data);
        }
    }

    public function getPelanggan()
    {
        header('Content-Type: application/json');
        echo $this->Pelanggan_model->getPelanggan();
    }

    public function addPelanggan()
    {
        $nik = $this->input->post('nik');
        $id_pelanggan = $this->input->post('id_pelanggan');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $alamat = $this->input->post('alamat');
        $kampung = $this->input->post('kampung');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $nohp = $this->input->post('nohp');

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
                'id_pelanggan' => $id_pelanggan,
                'nama' => $nama,
                'alamat' => $alamat,
                'kampung' => $kampung,
                'rt' => $rt,
                'rw ' => $rw,
                'nik' => $nik,
                'nohp' => $nohp,
                'status' => $status,
                'image' => $_data['upload_data']['file_name']
            );
            echo "TRUE";
            $this->db->insert('tb_pelanggan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added</div>');
            redirect('Pelanggan/datapelanggan');
        }
    }
    public function hapuspelanggan($id)
    {
        $this->Pelanggan_model->hapusdatapelanggan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Pelanggan/datapelanggan');
    }
    public function ubahpelanggan($id)
    {
        $data['title'] = 'Ubah Data Pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->Pelanggan_model->getPelangganById($id);

        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kampung', 'kampung', 'required');
        $this->form_validation->set_rules('rt', 'Rt', 'required');
        $this->form_validation->set_rules('rw', 'Rw', 'required');
        $this->form_validation->set_rules('nohp', 'nohp', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/pelanggan/ubah', $data);
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
            $this->Pelanggan_model->ubahpelanggan($new_image);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Pelanggan berhasil diubah!</div>');
            redirect('pelanggan/datapelanggan');
        }
    }

    public function cari()
    {
        $data['title'] = 'Kelola User';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // lIBRARY
        $this->load->library('pagination');


        //CONFIG
        $config['total_rows'] = $this->Pelanggan_model->getAllPelanggan();
        $config['per_page'] = 8;


        // INITIALITATION
        $this->pagination->initialize($config);


        // $data['pelanggan'] = $this->db->get('tb_pelanggan')->result_array();
        $data['start'] = $this->uri->segment(3);
        $data['pelanggan'] = $this->Pelanggan_model->getpelanggan($config['per_page'], $data['start']);


        $keyword = $this->input->post('keyword');
        $data['pelanggan'] = $this->Pelanggan_model->get_keyword($keyword);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/pelanggan/datapelanggan', $data);
        $this->load->view('templates/footer', $data);
    }
}
