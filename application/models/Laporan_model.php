<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
     public function get_kendala()
     {
          return $this->db->get('rekaptidakaktif')->result_array();
          // $query = $this->db->get('rekaptidakatif')->result_array();
          // return $query;
     }

     public function get_kendalajaringan()
     {
          return $this->db->get('rekapkendalajaringan')->result_array();
          // $query = $this->db->get('rekaptidakatif')->result_array();
          // return $query;
     }

     public function get_kategori()
     {
          return $this->db
               ->select('')
               ->distinct()
               ->get('rekapkendalajaringan')->result_array();
          // $query = $this->db->get('rekaptidakatif')->result_array();
          // return $query;
     }
}
