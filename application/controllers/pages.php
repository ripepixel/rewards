<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index()
	{
		$data['slider'] = 'pages/home-slider';
		$data['main'] = 'pages/index';
		$this->load->view('template/template', $data);
	}
}
