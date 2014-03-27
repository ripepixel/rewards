<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Businesses extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->load->model('business_model');
	}
	
	
	public function register()
	{
		$data['plans'] = $this->general_model->getPlans();

		$data['slider_title'] = "Register Today";
		$data['slider'] = 'template/blank-slider';
		$data['main'] = 'businesses/register';
		$this->load->view('template/template', $data);
	}


	public function process_registration()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[businesses.email]');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('conf_password', 'Confirmation Password', 'required|matches[password]');
		
		if($this->form_validation->run() == false) {
			$this->form_validation->set_error_delimiters('<span class="has-error">', '</span>');
			
			$data['plans'] = $this->general_model->getPlans();

			$data['slider_title'] = "Register Today";
			$data['slider'] = 'template/blank-slider';
			$data['main'] = 'businesses/register';
			$this->load->view('template/template', $data);
		} else {
			// register business
			$pass = $this->input->post('password');
			$sec_pass = md5($pass);
			$email_conf = $this->createRandomPassword(20);
			$data = array(
				'email' => $this->input->post('email'),
				'password' => $sec_pass,
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'plan_id' => $this->input->post('plan'),
				'email_confirmation' => $email_conf,
				'is_active' => 0
			);
			
			$this->business_model->createBusiness($data);
			
			$this->session->set_flashdata('success', 'Thanks for registering. Please check your email to confirm registration.');
			redirect('businesses/signin');
		}
	}
	
	
	public function signin()
	{
		$data['slider_title'] = "Sign in to your account";
		$data['slider'] = 'template/blank-slider';
		$data['main'] = 'businesses/signin';
		$this->load->view('template/template', $data);
	}
	
	public function process_signin()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required');
		
		if($this->form_validation->run() == false) {
			$this->form_validation->set_error_delimiters('<span class="has-error">', '</span>');
			
			$data['slider_title'] = "Sign in to your account";
			$data['slider'] = 'template/blank-slider';
			$data['main'] = 'businesses/signin';
			$this->load->view('template/template', $data);
		} else {
			$email = $this->input->post('email');
			$pass = $this->input->post('password');
			$sec_pass = md5($pass);
			$bus = $this->business_model->signin($email, $sec_pass); 
			if($bus) {
				// set session variables etc - if any are added, also add to the signout function below
				$this->session->set_userdata('is_logged', true);
				$this->session->set_userdata('business_id', $bus->id);
				$this->session->set_userdata('first_name', $bus->first_name);
				$this->session->set_userdata('last_name', $bus->last_name);
				$this->session->set_userdata('plan_id', $bus->plan_id);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'There was a problem with your email address, password or you have not yet confirmed your account.');
				redirect('businesses/signin');
			}
		}
	}
	
	
	public function confirm_account()
	{		
		$data['conf_code'] = $this->uri->segment(3);
		$data['slider_title'] = "Confirm your account";
		$data['slider'] = 'template/blank-slider';
		$data['main'] = 'businesses/confirm_account';
		$this->load->view('template/template', $data);
	}
	
	public function process_confirmation()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('conf_code', 'Confirmation Code', 'required');
		
		if($this->form_validation->run() == false) {
			
			$this->session->set_flashdata('error', 'There was a problem with your email address or confirmation code.');
			redirect('businesses/confirm_account'.$this->input->post('conf_code'));
		} else {
			// set session variables etc
			if($this->business_model->confirm_account($this->input->post('email'), $this->input->post('conf_code')) == true) {
				$this->session->set_flashdata('success', 'Great, your account has been activated. Please sign in.');
				redirect('businesses/signin');
			} else {
				$this->session->set_flashdata('error', 'There was a problem with your email address or confirmation code.');
				redirect('businesses/confirm_account'.$this->input->post('conf_code'));
			}
		}
	}
	
	
	public function signout()
	{
		$this->session->unset_userdata(array('is_logged' => false, 'business_id' => '', 'first_name' => '', 'last_name' => '', 'plan_id' => ''));
		//$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'You are now signed out.');
		redirect('businesses/signin');
	}
	
	
	
	
	function createRandomPassword($length) { 
	    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
	    srand((double)microtime()*1000000); 
	    $i = 0; 
	    $pass = '' ; 

	    while ($i <= $length) { 
	        $num = rand() % 33; 
	        $tmp = substr($chars, $num, 1); 
	        $pass = $pass . $tmp; 
	        $i++; 
	    } 

	    return $pass; 

	}


}