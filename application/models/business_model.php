<?php

class Business_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function createBusiness($data)
    {
    	$this->db->insert('businesses', $data);
			return true;
    }

		function confirm_account($email, $code)
		{
			$this->db->where('email', $email);
			$this->db->where('email_confirmation', $code);
			$q = $this->db->get('businesses');
			if($q->num_rows() == 1) {
				$row = $q->row();
				$data = array(
					'is_active' => 1
				);
				$this->db->where('id', $row->id);
				$this->db->update('businesses', $data);
				return true;
			} else {
				return false;
			}
		}
		
		function signin($email, $pass)
		{
			$this->db->where('email', $email);
			$this->db->where('password', $pass);
			$this->db->where('is_active', 1);
			$q = $this->db->get('businesses');
			if($q->num_rows() == 1) {
				$row = $q->row();
				return $row;
			} else {
				return false;
			}
		}
		
		function hasActivePlan()
		{
			$this->db->where('business_id', $this->session->userdata('business_id'));
			$this->db->where('is_active', 1);
			$q = $this->db->get('plan_purchases');
			if($q->num_rows() > 0) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hasCreatedOutlet()
		{
			$this->db->where('business_id', $this->session->userdata('business_id'));
			$this->db->where('is_active', 1);
			$q = $this->db->get('outlets');
			if($q->num_rows() > 0) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hasCreatedRewards()
		{
			$this->db->where('business_id', $this->session->userdata('business_id'));
			$this->db->where('is_active', 1);
			$q = $this->db->get('rewards');
			if($q->num_rows() > 0) {
				return TRUE;
			} else {
				return FALSE;
			}
		}



}