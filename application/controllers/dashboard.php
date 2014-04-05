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
			$oid = $this->outlet_model->saveOutlet($data);
			
			// set default outlet settings
			$os_data = array(
				'outlet_id' => $oid,
				'checkin_points' => 5,
				'min_checkin_period' => 12,
				'new_customer_bonus' => 0
			);
			$this->db->insert('outlet_settings', $os_data);

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

		$data['slider_title'] = "Your Outlet";
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
			$data['slider_title'] = "Update Your Outlet";
			$data['slider'] = 'template/blank-slider';
			$data['main'] = 'dashboard/new_outlet';
			$this->load->view('template/template', $data);
		} else {
			// File Upload
			if(isset($photo)) {
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
						$data['image'] = $photo['file_name'];
					} else {
						// file upload failed
						$this->session->set_flashdata('error', 'There was an error with the file upload'. $this->upload->display_errors());
					}
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
				'facebook' => $this->input->post('facebook')
				);
			$this->outlet_model->updateOutlet($this->input->post('outlet_id'), $data);

			$this->session->set_flashdata('success', 'Your outlet has been updated');
			redirect('dashboard');
		}
	}
	
	public function outlet_settings()
	{
		$outlet = $this->outlet_model->getFirstOutlet();
		$data['os'] = $this->outlet_model->getOutletSettings($outlet->id);
		$data['slider_title'] = "Your Outlet Settings";
		$data['slider'] = 'template/blank-slider';
		$data['main'] = 'dashboard/edit_outlet_settings';
		$this->load->view('template/template', $data);
	}
	
	public function update_outlet_settings()
	{
		$this->form_validation->set_rules('checkin_points', 'Check In Points', 'required|numeric');
		$this->form_validation->set_rules('min_checkin_period', 'Minimum Check In Period', 'required|numeric');
		$this->form_validation->set_rules('new_customer_bonus', 'New Customer Bonus', 'required|numeric');
		
		if($this->form_validation->run() == false) {
			$outlet = $this->outlet_model->getFirstOutlet();
			$data['os'] = $this->outlet_model->getOutletSettings($outlet->id);
			$data['slider_title'] = "Your Outlet Settings";
			$data['slider'] = 'template/blank-slider';
			$data['main'] = 'dashboard/edit_outlet_settings';
			$this->load->view('template/template', $data);
		} else {
			$data = array(
				'checkin_points' => $this->input->post('checkin_points'),
				'min_checkin_period' => $this->input->post('min_checkin_period'),
				'new_customer_bonus' => $this->input->post('new_customer_bonus')
			);
			$this->outlet_model->updateOutletSettings($this->input->post('outlet_s_id'), $data);
			
			$this->session->set_flashdata('success', 'Your outlet settings have been updated');
			redirect('dashboard/outlet_settings');
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
			$errors = false;
			if(!empty($_POST['points'])) {
				$outlet = $this->outlet_model->getFirstOutlet();
				foreach($_POST['points'] as $cnt => $qty) {
					if($_POST['title'][$cnt] != '') {
						// check if quantity is already used
						if($this->reward_model->qtyExists($qty, $outlet->id)) {
							$errors = true;
						} else {
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
					
				}
				if($errors == true) {
					// some quantities already existed
					$this->session->set_flashdata('error', 'Some rewards have not been saved because their points quantity already existed.');
					redirect('dashboard/edit_rewards');
				} else {
					$this->session->set_flashdata('success', 'Woohoo, your rewards have been saved.');
					redirect('dashboard/edit_rewards');
				}
				
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
		$data['slider_title'] = "Your Rewards";
		$data['slider'] = 'template/blank-slider';
		$data['main'] = 'dashboard/edit_rewards';
		$this->load->view('template/template', $data);
	}

	public function update_reward()
	{
		if(!empty($_POST['ok'])) {
			// add rewards
			$errors = false;
			if(!empty($_POST['modal_points'])) {
				$outlet = $this->outlet_model->getFirstOutlet();
				if($_POST['modal_name'] != '') {
					// check if quantity is already used
					if($this->reward_model->qtyExists($qty, $outlet->id)) {
						$errors = true;
					} else {
						$data = array(
							'points' => $_POST['modal_points'],
							'title' => $_POST['modal_name'],
							);

						$this->reward_model->updateReward($_POST['rid'], $data);
					}
				}
				if($errors == true) {
					// some quantities already existed
					$this->session->set_flashdata('error', 'The reward has not been saved because the points quantity already existed.');
					redirect('dashboard/edit_rewards');
				} else {
					$this->session->set_flashdata('success', 'Your reward have been saved.');
					redirect('dashboard/edit_rewards');
				}
				
			} else {
				$this->session->set_flashdata('error', 'You need to enter your reward details');
				redirect('dashboard/edit_rewards');
			}
		}
	}

	public function delete_reward()
	{
		$rid = $this->uri->segment(3);
		if($this->reward_model->deleteReward($rid) == true) {
			$this->session->set_flashdata('success', 'The reward has been deleted');
			redirect('dashboard/edit_rewards');
		} else {
			$this->session->set_flashdata('error', 'There was an error deleting your reward');
			redirect('dashboard/edit_rewards');
		}
	}

	public function special_offers()
	{
		$data['offers'] = $this->reward_model->getOffers();
		$data['slider_title'] = "Your Special Offers";
		$data['slider'] = 'template/blank-slider';
		$data['main'] = 'dashboard/special_offers';
		$this->load->view('template/template', $data);
	}

	public function save_offer()
	{
		$this->form_validation->set_rules('title', 'Offer Title', 'required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('expiry_date', 'Expiry Date', 'required|callback_is_expired');
		$this->form_validation->set_rules('original_price', 'Original Price', 'required|numeric');
		$this->form_validation->set_rules('offer_price', 'Offer Price', 'required|numeric');
		$this->form_validation->set_rules('terms', 'Terms and Conditions', 'required');
		
		if($this->form_validation->run() == false) {
			$data['offers'] = $this->reward_model->getOffers();
			$data['slider_title'] = "Your Special Offers";
			$data['slider'] = 'template/blank-slider';
			$data['main'] = 'dashboard/special_offers';
			$this->load->view('template/template', $data);
		} else {
			// File Upload
			$photo['file_name'] = '';
			if(!empty($_FILES['photo']['name'])) {
				$config = array();
				$config['upload_path'] = './uploads/offers/'; // where the files are uploaded to
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
			$outlet = $this->outlet_model->getFirstOutlet();

			$data = array(
				'business_id' => $this->session->userdata('business_id'),
				'outlet_id' => $outlet->id,
				'title' => $this->input->post('title'),
				'start_date' => date("Y-m-d", strtotime(str_replace("/", "-", $this->input->post('start_date')) )),
				'expiry_date' => date("Y-m-d", strtotime(str_replace("/", "-", $this->input->post('expiry_date')) )),
				'original_price' => $this->input->post('original_price'),
				'offer_price' => $this->input->post('offer_price'),
				'terms' => $this->input->post('terms'),
				'image' => $photo['file_name'],
				'is_deleted' => 0
				);
			$this->reward_model->saveOffer($data);

			$this->session->set_flashdata('success', 'Your offer has been saved');
			redirect('dashboard/special_offers');
		}
	}
	
	public function update_offer()
	{
		$this->form_validation->set_rules('o_title', 'Offer Title', 'required');
		$this->form_validation->set_rules('o_start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('o_expiry_date', 'Expiry Date', 'required|callback_is_expired');
		$this->form_validation->set_rules('o_original_price', 'Original Price', 'required|numeric');
		$this->form_validation->set_rules('o_offer_price', 'Offer Price', 'required|numeric');
		$this->form_validation->set_rules('o_terms', 'Terms and Conditions', 'required');
		
		if($this->form_validation->run() == false) {
			$data['offers'] = $this->reward_model->getOffers();
			$data['slider_title'] = "Your Special Offers";
			$data['slider'] = 'template/blank-slider';
			$data['main'] = 'dashboard/special_offers';
			$this->load->view('template/template', $data);
		} else {
			// File Upload
			if(isset($_FILES['photo'])) {
				$photo['file_name'] = '';
				if(!empty($_FILES['photo']['name'])) {
					$config = array();
					$config['upload_path'] = './uploads/offers/'; // where the files are uploaded to
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
				$outlet = $this->outlet_model->getFirstOutlet();

				if($photo['file_name']) {
					// remove old image and set new image
					$offer = $this->reward_model->getOffer($this->input->post('oid'));
					unlink('./uploads/offers/'.$offer['image']);
					$data['image'] = $photo['file_name'];
				}
				
			}

			$data = array(
				'title' => $this->input->post('o_title'),
				'start_date' => date("Y-m-d", strtotime(str_replace("/", "-", $this->input->post('o_start_date')) )),
				'expiry_date' => date("Y-m-d", strtotime(str_replace("/", "-", $this->input->post('o_expiry_date')) )),
				'original_price' => $this->input->post('o_original_price'),
				'offer_price' => $this->input->post('o_offer_price'),
				'terms' => $this->input->post('o_terms')
				);
			$this->reward_model->updateOffer($this->input->post('oid'), $data);
			$this->session->set_flashdata('success', 'Your offer has been updated');
			redirect('dashboard/special_offers');
		}
	}
	
	public function delete_offer()
	{
		$oid = $this->uri->segment(3);
		
		if($this->reward_model->deleteOffer($oid)) {
			$this->session->set_flashdata('success', 'The offer has been deleted. If users have added this offer to their profile, it will still be available to them, but will expire on its original expiration date.');
			redirect('dashboard/special_offers');
		} else {
			$this->session->set_flashdata('error', 'The offer could not be deleted.');
			redirect('dashboard/special_offers');
		}
	}
	
	public function expire_offer()
	{
		$oid = $this->uri->segment(3);
		
		if($this->reward_model->expireOffer($oid)) {
			$this->session->set_flashdata('success', 'The offer has been expired. If users have added this offer to their profile, it will still be available to them, but will expire on its original expiration date.');
			redirect('dashboard/special_offers');
		} else {
			$this->session->set_flashdata('error', 'The offer could not be set to expired.');
			redirect('dashboard/special_offers');
		}
	}


	public function pay_for_plan()
	{
		# check not already paid
		$paid_plan = $this->business_model->hasActivePlan();
		if($paid_plan) {
			// go to plan details - already paid
			redirect('dashboard/my_plan');
		} else {
			$data['plan'] = $this->business_model->getPlanDetails($this->session->userdata('plan_id'));
			$data['plans'] = $this->general_model->getPlans();
			$data['slider_title'] = "Lets Get Started";
			$data['slider'] = 'template/blank-slider';
			$data['main'] = 'dashboard/pay_for_plan';
			$this->load->view('template/template', $data);
		}
	}
	
	public function send_for_payment()
	{
		
		$this->loadGoCardless();
		# send to goCardless for payment
		$plan_id = $this->input->post('plan');
		$plan = $this->business_model->getPlanDetails($plan_id);
		$user = $this->business_model->getBusiness($this->session->userdata('business_id'));
		$sub_details = array(
			'amount' => $plan->price,
			'interval_length' => $plan->interval_length,
			'interval_unit' => $plan->interval_unit,
			'name' => $plan->title." Plan",
			'state' => $this->session->userdata('business_id').":".$plan->id,
			'user' => array(
				'first_name' => $user->first_name,
				'last_name' => $user->last_name,
				'email' => $user->email
			)
		);
		if($plan->setup_fee) {
			$sub_details['setup_fee'] = $plan->setup_fee;
		}
		
		// Generate the url
		$subscription_url = $this->gocardless->new_subscription_url($sub_details);
		
		redirect($subscription_url);
		
	}
	
	
	public function process_payment()
	{
		$this->loadGoCardless();
		# check response code and deal accordingly
		// Required confirm variables
		$confirm_params = array(
		  'resource_id'    => $_GET['resource_id'],
		  'resource_type'  => $_GET['resource_type'],
		  'resource_uri'   => $_GET['resource_uri'],
		  'signature'      => $_GET['signature']
		);

		// State is optional
		if (isset($_GET['state'])) {
		  $confirm_params['state'] = $_GET['state'];
			list($bus_id, $plan_id) = explode(":", $_GET['state']);
		}

		$confirmed_resource = $this->gocardless->confirm_resource($confirm_params);
		if($confirmed_resource->status == 'active') {
			// set up payment
			$data = array(
				'business_id' => $bus_id,
				'plan_id' => $plan_id,
				'resource_id' => $confirm_params['resource_id'],
				'resource_type' => $confirm_params['resource_type'],
				'resource_uri' => $confirm_params['resource_uri'],
				'signature' => $confirm_params['signature'],
				'amount' => $confirmed_resource->amount,
				'created_at' => $confirmed_resource->created_at,
				'status' => $confirmed_resource->status,
				'is_active' => 1
			);
			
			$this->business_model->createPlanPurchase($data);
			
			// update plan id incase it has changed 
			$b_data = array(
				'plan_id' => $plan_id
			);
			$this->business_model->updateBusiness($bus_id, $b_data);
			
			// set outlet to active
			$outlet = $this->outlet_model->getFirstOutlet();
			$o_data = array(
				'is_active' => 1
			);
			$this->outlet_model->updateOutlet($outlet->id, $o_data);
			
			// send email to business with the good news
			// send email to me with the order details
			
			// redirect
			$this->session->set_userdata('has_paid', true);
			$this->session->set_flashdata('success', 'Awesome, you have confirmed your payment.');
			redirect('dashboard/thanks');
			
		} else {
			$this->session->set_flashdata('error', 'There was a problem with your payment.');
			redirect('dashboard');
		}
		
	}
	
	public function thanks()
	{
		# check if has_paid session = true
		if($this->session->userdata('has_paid') && $this->session->userdata('has_paid') == true) {
			$this->session->unset_userdata('has_paid');
			$data['slider_title'] = "Thanks for joining us";
			$data['slider'] = 'template/blank-slider';
			$data['main'] = 'dashboard/thanks';
			$this->load->view('template/template', $data);
		} else {
			redirect('dashboard');
		}
	}
	
	public function my_plan()
	{
		$this->loadGoCardless();
		
		$data['business'] = $this->business_model->getBusiness($this->session->userdata('business_id'));
		$data['payment'] = $this->business_model->getPaymentDetails($this->session->userdata('business_id'));
		$data['plan'] = $this->business_model->getPlanDetails($data['payment']->plan_id);
		$data['subscription'] = GoCardless_Subscription::find($data['payment']->resource_id);
		$data['slider_title'] = "Your Details";
		$data['slider'] = 'template/blank-slider';
		$data['main'] = 'dashboard/my_plan';
		$this->load->view('template/template', $data);
	}

	public function change_password()
	{
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('conf_password', 'Password Confirmation', 'required|matches[password]');
		if($this->form_validation->run() == false) {
			$this->loadGoCardless();		
			$data['business'] = $this->business_model->getBusiness($this->session->userdata('business_id'));
			$data['payment'] = $this->business_model->getPaymentDetails($this->session->userdata('business_id'));
			$data['plan'] = $this->business_model->getPlanDetails($data['payment']->plan_id);
			$data['subscription'] = GoCardless_Subscription::find($data['payment']->resource_id);
			$data['slider_title'] = "Your Details";
			$data['slider'] = 'template/blank-slider';
			$data['main'] = 'dashboard/my_plan';
			$this->load->view('template/template', $data);
		} else {
			$pass = $this->input->post('password');
			$sec_pass = md5($pass);
			$this->business_model->updatePassword($this->session->userdata('business_id'), $sec_pass);

			// send them an email to let them know it has been changed
			
			$this->session->set_flashdata('success', 'Your password has been changed successfully.');
			redirect('dashboard/my_plan');
		}
	}
	
	
	
	function loadGoCardless()
	{
		$account_details = array(
		  'app_id'        => $this->config->item('gocardless_app_id'),
		  'app_secret'    => $this->config->item('gocardless_app_secret'),
		  'merchant_id'   => $this->config->item('gocardless_merchant_id'),
		  'access_token'  => $this->config->item('gocardless_access_token')
		);

		// Initialize GoCardless
		GoCardless::set_account_details($account_details);
		//https://sandbox.gocardless.com/merchants/0JJNJY6F0N/confirm_resource
	}
	
	function is_expired($str)
	{
		# check if date entered is before today
		$now = time();
		$dte = strtotime(str_replace("/", "-", $str));
		if($dte < $now ) {
			$this->form_validation->set_message('is_expired', 'The date needs to be in the future.');
			return false;
		} else {
			return true;
		}
	}


	function getReward()
	{
		$id = $_POST['id'];
		$reward = $this->reward_model->getReward($id);
		echo json_encode($reward);

	}
	
	function getOffer()
	{
		$id = $_POST['id'];
		$offer = $this->reward_model->getOffer($id);
		echo json_encode($offer);

	}
	




	
}