<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jaringan_model extends CI_Model
{
     public function getkendalajaringanById($id)
     {
          return $this->db->get_where('rekapkendalajaringan', ['id' => $id])->row_array();
     }
     public function getJaringan()
     {
          $this->datatables->select('*');
          $this->datatables->from('rekapkendalajaringan');
          return $this->datatables->generate();
          // return $this->db->get('rekapkendalajaringan')->result_array();
          // print_r($data);
     }

     public function hapusjaringan($id)
     {
          $this->db->where('id', $id);
          $this->db->delete('rekapkendalajaringan');
     }
     public function ubahjaringan()
     {
          $id = $this->input->post('id', true);
          $id_pelanggan = $this->input->post('id_pelanggan', true);
          $tgl = $this->input->post('tgl', true);
          $nik = $this->input->post('nik', true);
          $nama = $this->input->post('nama', true);
          $nometer = $this->input->post('nometer', true);
          $sektor = $this->input->post('sektor', true);
          $masalah = $this->input->post('masalah', true);
          $solusi = $this->input->post('solusi', true);
          $status = $this->input->post('status', true);
          $tanggalterakhir = $this->input->post('tanggalterakhir', true);
          $teknisi = $this->input->post('teknisi', true);

          $this->db->set('tgl', $tgl);
          $this->db->set('id_pelanggan', $id_pelanggan);
          $this->db->set('nik', $nik);
          $this->db->set('nama', $nama);
          $this->db->set('nometer', $nometer);
          $this->db->set('sektor', $sektor);
          $this->db->set('masalah', $masalah);
          $this->db->set('solusi', $solusi);
          $this->db->set('status', $status);
          $this->db->set('tanggalterakhir', $tanggalterakhir);
          $this->db->set('teknisi', $teknisi);
          $this->db->where('id', $id);
          $this->db->update('rekapkendalajaringan');
          $this->db->where('id', $id)->update('rekapkendalajaringan', [
               'tgl' => $tgl,
               'id_pelanggan' => $id_pelanggan,
               'nik' => $nik,
               'nama' => $nama,
               'nometer' => $nometer,
               'sektor' => $sektor,
               'teknisi' => $teknisi,
               'masalah' => $masalah,
               'solusi' => $solusi,
               'status' => $status,
               'tanggalterakhir' => $tanggalterakhir,

          ]);
     }
}
