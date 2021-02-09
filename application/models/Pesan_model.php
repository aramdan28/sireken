<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_model extends CI_Model
{
    public function getPesan()
    {
        $this->datatables->select('*');
        $this->datatables->from('tb_kontak');
        return $this->datatables->generate();
    }
}
