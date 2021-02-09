<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{


	public function index()
	{

		$data = array(
			'title' => 'Partners',

		);
		$this->load->view('client', $data);
	}
}
