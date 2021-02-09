<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
     public function getAllUser()
     {
          return $this->db->get('user')->result_array();
     }
     public function getUserByid($id_karyawan)
     {
          return $this->db->get_where('user', ['id_karyawan' => $id_karyawan])->row_array();
     }
     public function getUser()
     {
          $this->datatables->select('*');
          $this->datatables->from('user');
          return $this->datatables->generate();
     }
     public function hapususer($id_karyawan)
     {
          $this->db->where('id_karyawan', $id_karyawan);
          $this->db->delete('user');
     }
     public function ubahuser($image)
     {
          $id_karyawan = $this->input->post('id_karyawan', true);
          $name = $this->input->post('name', true);
          $email = $this->input->post('email', true);
          $jabatan = $this->input->post('jabatan', true);


          $this->db->set('name', $name);
          $this->db->set('email', $email);
          $this->db->set('jabatan', $jabatan);
          if (!is_null($image))
               $this->db->set('image', $image);

          $this->db->where('id_karyawan', $id_karyawan);
          $this->db->update('user');
          $this->db->where('id_karyawan', $id_karyawan)->update('user', [
               'name' => $name,
               'email' => $email,
               'jabatan' => $jabatan,
               'image' => $image
          ]);
     }

     public function get_keyword($keyword)
     {
          $this->db->select('*');
          $this->db->from('user');
          $this->db->like('name', $keyword);
          $this->db->or_like('email', $keyword);
          $this->db->or_like('jabatan', $keyword);
          return $this->db->get()->result_array();
     }
}
