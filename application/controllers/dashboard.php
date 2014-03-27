<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->general_model->isBusinessLogged();
		$this->load->model('business_model');
	}
	
	
	public function index()
	{
		$data['slider_title'] = "Your Dashboard";
		$data['slider'] = 'template/blank-slider';
		$data['main'] = 'dashboard/index';
		$this->load->view('template/template', $data);
	}
	
	
}