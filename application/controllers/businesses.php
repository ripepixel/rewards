<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Businesses extends CI_Controller {

	public function register()
	{
		$data['plans'] = $this->general_model->getPlans();

		$data['slider_title'] = "Register Today";
		$data['slider'] = 'template/blank-slider';
		$data['main'] = 'businesses/register';
		$this->load->view('template/template', $data);
	}





}