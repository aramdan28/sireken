<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten_model extends CI_Model
{
     public function getAllKonten()
     {
          return $this->db->get('tb_konten')->result_array();
     }
     public function getAllKontenById($id)
     {
          return $this->db->get_where('tb_konten', ['id' => $id])->row();
     }
     public function getKonten()
     {
          $this->datatables->select('*');
          $this->datatables->from('tb_konten');
          return $this->datatables->generate();
     }
     public function hapuskonten($id)
     {
          $this->db->where('id', $id);
          $this->db->delete('tb_konten');
     }
     public function getKontenById($id)
     {
          return $this->db->get_where('tb_konten', ['id' => $id])->row_array();
     }
     public function ubahkonten($image)
     {
          $id = $this->input->post('id', true);
          $judul = $this->input->post('judul', true);
          $keterangan = $this->input->post('keterangan', true);

          $this->db->set('judul', $judul);
          $this->db->set('keterangan', $keterangan);
          if (!is_null($image))
               $this->db->set('image', $image);
          $this->db->where('id', $id);
          $this->db->update('tb_konten');
          $this->db->where('id', $id)->update('tb_konten', [
               'judul' => $judul,
               'keterangan' => $keterangan,
               'image' => $image
          ]);
     }
}
