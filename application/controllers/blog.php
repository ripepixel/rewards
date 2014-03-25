<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index()
	{
		$data['slider'] = 'blog/blog-slider';
		$data['main'] = 'blog/index';
		$this->load->view('template/template', $data);
	}
}
