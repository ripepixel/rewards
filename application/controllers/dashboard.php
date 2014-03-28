<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
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
		$data['slider_title'] = "Your Dashboard";
		$data['slider'] = 'template/blank-slider';
		$data['main'] = 'dashboard/index';
		$this->load->view('template/template', $data);
	}

	public function new_outlet()
	{
		$data['slider_title'] = "Create Your Outlet";
		$data['slider'] = 'template/blank-slider';
		$data['main'] = 'dashboard/new_outlet';
		$this->load->view('template/template', $data);
	}

	public function save_outlet()
	{
		$this->form_validation->set_rules('name', 'Business Name', 'required');
		$this->form_validation->set_rules('street', 'Street', 'required');
		$this->form_validation->set_rules('town', 'Town', 'required');
		$this->form_validation->set_rules('county', 'County', 'required');
		$this->form_validation->set_rules('postcode', 'Postcode', 'required');
		$this->form_validation->set_rules('email', 'Public Email', 'valid_email');
		
		if($this->form_validation->run() == false) {
			$data['slider_title'] = "Create Your Outlet";
			$data['slider'] = 'template/blank-slider';
			$data['main'] = 'dashboard/new_outlet';
			$this->load->view('template/template', $data);

		} else {
			// File Upload
			$photo['file_name'] = '';
			if(!empty($_FILES['photo']['name'])) {
				$config = array();
				$config['upload_path'] = './uploads/outlets/'; // where the files are uploaded to
	            $config['allowed_types'] = 'gif|jpg|png';
	            $config['max_size'] = '1000';
	            $config['max_width'] = '2000';
	            $config['max_height'] = '1000';
	            $config['max_filename'] = '100';

	            $this->load->library('upload', $config);
	            
				if($this->upload->do_upload('photo')) {
					$photo = $this->upload->data();
				} else {
					// file upload failed
					$this->session->set_flashdata('error', 'There was an error with the file upload'. $this->upload->display_errors());
				}
			}


			$is_active = $this->business_model->hasActivePlan() ? 1 : 0;
			$web = $this->input->post('website');
			$website = !empty($web) ? prep_url($web) : '';
			$data = array(
				'business_id' => $this->session->userdata('business_id'),
				'name' => $this->input->post('name'),
				'street' => $this->input->post('street'),
				'town' => $this->input->post('town'),
				'county' => $this->input->post('county'),
				'postcode' => $this->input->post('postcode'),
				'telephone' => $this->input->post('telephone'),
				'email' => $this->input->post('email'),
				'website' => $website,
				'twitter' => $this->input->post('twitter'),
				'facebook' => $this->input->post('facebook'),
				'image' => $photo['file_name'],
				'is_active' => $is_active
				);
			$this->outlet_model->saveOutlet($data);

			$this->session->set_flashdata('success', 'Your outlet has been saved');
			redirect('dashboard');
		}
	}

	public function edit_outlet()
	{
		$oid = $this->uri->segment(3);
		if($this->uri->segment(3) == '') {
			$data['outlet'] = $this->outlet_model->getFirstOutlet();
		}elseif($this->outlet_model->isMyOutlet($oid) == false) {
			$this->session->set_flashdata('error', 'Sorry, you can not access that outlet');
			redirect('dashboard');
		} else {
			$data['outlet'] = $this->outlet_model->getOutlet($oid);
		}

		$data['slider_title'] = "Update Your Outlet";
		$data['slider'] = 'template/blank-slider';
		$data['main'] = 'dashboard/edit_outlet';
		$this->load->view('template/template', $data);
	}

	public function update_outlet()
	{
		$this->form_validation->set_rules('name', 'Business Name', 'required');
		$this->form_validation->set_rules('street', 'Street', 'required');
		$this->form_validation->set_rules('town', 'Town', 'required');
		$this->form_validation->set_rules('county', 'County', 'required');
		$this->form_validation->set_rules('postcode', 'Postcode', 'required');
		$this->form_validation->set_rules('email', 'Public Email', 'valid_email');
		
		if($this->form_validation->run() == false) {
			$data['slider_title'] = "Create Your Outlet";
			$data['slider'] = 'template/blank-slider';
			$data['main'] = 'dashboard/new_outlet';
			$this->load->view('template/template', $data);
		} else {
			// File Upload
			$photo['file_name'] = '';
			if(!empty($_FILES['photo']['name'])) {
				$config = array();
				$config['upload_path'] = './uploads/outlets/'; // where the files are uploaded to
	            $config['allowed_types'] = 'gif|jpg|png';
	            $config['max_size'] = '1000';
	            $config['max_width'] = '2000';
	            $config['max_height'] = '1000';
	            $config['max_filename'] = '100';

	            $this->load->library('upload', $config);
	            
				if($this->upload->do_upload('photo')) {
					// remove old photo
					$outlet = $this->outlet_model->getOutlet($this->input->post('outlet_id'));
					$old_photo = './uploads/outlets/'.$outlet->image;
					unlink($old_photo);
					$photo = $this->upload->data();
				} else {
					// file upload failed
					$this->session->set_flashdata('error', 'There was an error with the file upload'. $this->upload->display_errors());
				}
			}

			$is_active = $this->business_model->hasActivePlan() ? 1 : 0;
			$web = $this->input->post('website');
			$website = !empty($web) ? prep_url($web) : '';
			$data = array(
				'name' => $this->input->post('name'),
				'street' => $this->input->post('street'),
				'town' => $this->input->post('town'),
				'county' => $this->input->post('county'),
				'postcode' => $this->input->post('postcode'),
				'telephone' => $this->input->post('telephone'),
				'email' => $this->input->post('email'),
				'website' => $website,
				'twitter' => $this->input->post('twitter'),
				'facebook' => $this->input->post('facebook'),
				'image' => $photo['file_name']
				);
			$this->outlet_model->updateOutlet($this->input->post('outlet_id'), $data);

			$this->session->set_flashdata('success', 'Your outlet has been updated');
			redirect('dashboard');
		}
	}

	public function new_rewards()
	{
		$data['slider_title'] = "Create Your Rewards";
		$data['slider'] = 'template/blank-slider';
		$data['main'] = 'dashboard/new_rewards';
		$this->load->view('template/template', $data);
	}
	
	public function save_rewards()
	{
		if(!empty($_POST['ok'])) {
			// add rewards
			if(!empty($_POST['points'])) {
				$outlet = $this->outlet_model->getFirstOutlet();
				foreach($_POST['points'] as $cnt => $qty) {
					if($_POST['title'][$cnt] != '') {
						$data = array(
							'business_id' => $this->session->userdata('business_id'),
							'outlet_id' => $outlet->id,
							'points' => $qty,
							'title' => $_POST['title'][$cnt],
							'details' => $_POST['title'][$cnt],
							'is_active' => 1,
							'is_deleted' => 0
							);

						$this->reward_model->addReward($data);
					}
					
				}
				$this->session->set_flashdata('success', 'Woohoo, your rewards have been saved.');
				redirect('dashboard/edit_rewards');
				
			} else {
				$this->session->set_flashdata('error', 'You need to enter your reward details');
				redirect('dashboard/new_rewards');
			}
		}

	}


	public function edit_rewards()
	{
		$outlet = $this->outlet_model->getFirstOutlet();
		$data['rewards'] = $this->reward_model->getRewards($outlet->id);
		$data['slider_title'] = "Update Your Rewards";
		$data['slider'] = 'template/blank-slider';
		$data['main'] = 'dashboard/edit_rewards';
		$this->load->view('template/template', $data);
	}







	
}