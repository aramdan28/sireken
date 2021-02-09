<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tidakaktif_model extends CI_Model
{
     public function getTidakaktifById($id)
     {
          return $this->db->get_where('rekaptidakaktif', ['id' => $id])->row_array();
     }
     public function getTidakaktif()
     {
          $this->datatables->select('*');
          $this->datatables->from('rekaptidakaktif');
          return $this->datatables->generate();
     }
     public function hapustidakaktif($id)
     {
          $this->db->where('id', $id);
          $this->db->delete('rekaptidakaktif');
     }
     public function ubahtidakaktif()
     {
          $id = $this->input->post('id', true);
          $nik = $this->input->post('nik', true);
          $nama = $this->input->post('nama', true);
          $kampung = $this->input->post('kampung', true);
          $rt = $this->input->post('rt', true);
          $rw = $this->input->post('rw', true);
          $sektor = $this->input->post('sektor', true);
          $nometer = $this->input->post('nometer', true);
          $status = $this->input->post('status', true);
          $tglkunjungan = $this->input->post('tglkunjungan', true);
          $tgleksekusi = $this->input->post('tgleksekusi', true);
          $kendala = $this->input->post('kendala', true);
          $keterangan = $this->input->post('keterangan', true);

          $this->db->set('nik', $nik);
          $this->db->set('nama', $nama);
          $this->db->set('kampung', $kampung);
          $this->db->set('rt', $rt);
          $this->db->set('rw', $rw);
          $this->db->set('sektor', $sektor);
          $this->db->set('nometer', $nometer);
          $this->db->set('status', $status);
          $this->db->set('tglkunjungan', $tglkunjungan);
          $this->db->set('tgleksekusi', $tgleksekusi);
          $this->db->set('kendala', $kendala);
          $this->db->set('keterangan', $keterangan);
          $this->db->where('id', $id);
          $this->db->update('rekaptidakaktif');
          $this->db->where('id', $id)->update('rekaptidakaktif', [
               'nik' => $nik,
               'nama' => $nama,
               'kampung' => $kampung,
               'status' => $status,
               'rt' => $rt,
               'rw' => $rw,
               'sektor' => $sektor,
               'nometer' => $nometer,
               'tglkunjungan' => $tglkunjungan,
               'tgleksekusi' => $tgleksekusi,
               'kendala' => $kendala,
               'keterangan' => $keterangan,
          ]);
     }
}
