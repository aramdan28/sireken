<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hubungi_model extends CI_Model
{
     public function getAllHubungi()
     {
          return $this->db->get('tb_kontak')->result_array();
     }
     public function getAllhubungiById($id)
     {
          return $this->db->get_where('tb_kontak', ['id' => $id])->row();
     }
     public function hapushubungi($id)
     {
          $this->db->where('id', $id);
          $this->db->delete('tb_kontak');
     }
     public function getHubungiById($id)
     {
          return $this->db->get_where('tb_kontak', ['id' => $id])->row_array();
     }
     public function kirim_pesan($data)
     {
          $this->db->insert($data);

     }
     
}
