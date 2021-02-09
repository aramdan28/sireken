<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{

    public function getPegawai()
    {
        $this->datatables->select('*');
        $this->datatables->from('tb_pegawai');
        return $this->datatables->generate();
    }

    public function hapusdatapegawai($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pegawai');
    }
    public function getPegawaiById($id)
    {
        return $this->db->get_where('tb_pegawai', ['id' => $id])->row_array();
    }
    public function ubahpegawai($image)
    {

        $id = $this->input->post('id', true);
        $id_karyawan = $this->input->post('id_karyawan', true);
        $name = $this->input->post('name', true);
        $tempatlahir = $this->input->post('tempatlahir', true);
        $tgllahir = $this->input->post('tgllahir', true);
        $alamat = $this->input->post('alamat', true);
        $pendidikanterakhir = $this->input->post('pendidikanterakhir', true);
        $date_created = $this->input->post('date_created', true);
        $jabatan = $this->input->post('jabatan', true);

        $this->db->set('id_karyawan', $id_karyawan);
        $this->db->set('name', $name);
        $this->db->set('tempatlahir', $tempatlahir);
        $this->db->set('tgllahir', $tgllahir);
        $this->db->set('alamat', $alamat);
        $this->db->set('pendidikanterakhir', $pendidikanterakhir);
        $this->db->set('date_created', $date_created);
        $this->db->set('jabatan', $jabatan);
        if (!is_null($image))
            $this->db->set('image', $image);

        $this->db->where('id', $id);
        $this->db->update('tb_pegawai');
        $this->db->where('id', $id)->update('tb_pegawai', [
            'id_karyawan' => $id_karyawan,
            'name' => $name,
            'tempatlahir' => $tempatlahir,
            'tgllahir' => $tgllahir,
            'alamat' => $alamat,
            'pendidikanterakhir' => $pendidikanterakhir,
            'date_created' => $date_created,
            'jabatan' => $jabatan,
            'image' => $image,
        ]);
    }
}
