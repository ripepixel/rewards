<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->general_model->isBusinessLogged();
		$this->load->model('business_model');
		$this->load->model('outlet_model');
		$this->load->model('reward_model');
	}

	public function index()
	{
		$data['outlet'] = $this->outlet_model->getFirstOutlet();
		$data['rewards'] = $this->reward_model->getRandomRewards($data['outlet']->id);
		
		$data['main'] = 'app/index';
		$this->load->view('app_template/template', $data);
	}
	
	
}