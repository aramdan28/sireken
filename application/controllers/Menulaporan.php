<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menulaporan extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          if (!$this->session->userdata('email')) {
               redirect('auth');
          }
          $this->load->model('Laporan_model');
     }
     public function Laporan()
     {
          $data['title'] = 'Menu Laporan Kendala Tidak Aktif';
          $data['user'] = $this->db->get_where('user', ['email' =>
          $this->session->userdata('email')])->row_array();

          $data['kendala'] = $this->Laporan_model->get_kendala();
          // $this->load->view('menulaporan/index', $this->data);

          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('menulaporan/index', $data);
          $this->load->view('templates/footer', $data);
     }

     public function kendalajaringan()
     {
          $kendala  = $_GET['kendala'];
          $kendala  = str_replace('%20', ' ', $kendala);
          if ($kendala == null) {
               echo "string";
          } else {
               $data     = $this->db->get_where('rekaptidakaktif', [
                    'kendala'   => $kendala
               ])->result();
          }
          if (!empty($data)) {
               $dataKendala   = [];
               foreach ($data as $key) {
                    if (key_exists($key->sektor, $dataKendala)) {
                         $jumlah   = $dataKendala[$key->sektor];
                         $jumlah   += 1;
                         $dataKendala[$key->sektor]    = $jumlah;
                    } else {
                         $dataKendala[$key->sektor]    = 1;
                    }
               }
          }
          $this->output->set_content_type('application/json')->set_output(json_encode($dataKendala));
     }

     public function Laporanjaringan()
     {
          $data['title'] = 'Menu Laporan Kendala Jaringan';
          $data['user'] = $this->db->get_where('user', ['email' =>
          $this->session->userdata('email')])->row_array();

          $data['kendala'] = $this->Laporan_model->get_kendalajaringan();

          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('menulaporan/laporankendalajaringan', $data);
          $this->load->view('templates/footer', $data);
     }

     public function kendalajaringangas()
     {
          $kendala  = $_GET['kendala'];
          $kendala  = str_replace('%20', ' ', $kendala);
          if ($kendala == null) {
               echo "string";
          } else {
               $this->db->order_by('sektor', 'ASC');
               $data     = $this->db->get_where('rekapkendalajaringan', [
                    'kendala'   => $kendala
               ])->result();
          }
          if (!empty($data)) {
               $dataKendala   = [];
               foreach ($data as $key) {
                    if (key_exists($key->sektor, $dataKendala)) {
                         $jumlah   = $dataKendala[$key->sektor];
                         $jumlah   += 1;
                         $dataKendala[$key->sektor]    = $jumlah;
                    } else {
                         $dataKendala[$key->sektor]    = 1;
                    }
               }
          }
          $this->output->set_content_type('application/json')->set_output(json_encode($dataKendala));
     }

     public function alljaringan()
     {
          $kendala  = $_GET['kendala'];
          $kendala  = str_replace('%20', ' ', $kendala);
          if ($kendala == null) {
               echo "string";
          } else {
               $this->db->order_by('sektor', 'ASC');
               $data     = $this->db->get_where('rekapkendalajaringan', [
                    'kendala'   => $kendala,
               ])->result();
          }
          if (!empty($data)) {
               $dataKendala   = [];
               foreach ($data as $key) {
                    if (key_exists($key->sektor, $dataKendala)) {
                         $jumlah   = $dataKendala[$key->sektor];
                         $jumlah   += 1;
                         $dataKendala[$key->sektor]    = $jumlah;
                    } else {
                         $dataKendala[$key->sektor]    = 1;
                    }
               }
               foreach ($dataKendala as $row => $value) : ?>
                    <tr>
                         <td><?php echo $row ?></td>
                         <td><?php echo $value ?></td>
                    </tr>
               <?php endforeach ?> <?php
                              } else { ?>
               <tr>
                    <td>not </td>
                    <td>found</td>
               </tr>
               <?php
                              }
                         }

                         public function all()
                         {
                              $kendala  = $_GET['kendala'];
                              $kendala  = str_replace('%20', ' ', $kendala);
                              if ($kendala == null) {
                                   echo "string";
                              } else {
                                   $data     = $this->db->get_where('rekaptidakaktif', [
                                        'kendala'   => $kendala
                                   ])->result();
                              }
                              if (!empty($data)) {
                                   $dataKendala   = [];
                                   foreach ($data as $key) {
                                        if (key_exists($key->sektor, $dataKendala)) {
                                             $jumlah   = $dataKendala[$key->sektor];
                                             $jumlah   += 1;
                                             $dataKendala[$key->sektor]    = $jumlah;
                                        } else {
                                             $dataKendala[$key->sektor]    = 1;
                                        }
                                   }
                                   foreach ($dataKendala as $row => $value) : ?>
                    <tr>
                         <td><?php echo $row ?></td>
                         <td><?php echo $value ?></td>
                    </tr>
               <?php endforeach ?> <?php
                              } else { ?>
               <tr>
                    <td>not </td>
                    <td> found</td>
               </tr> <?php
                              }
                         }
                    }
