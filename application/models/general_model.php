<?php

class General_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

		function isBusinessLogged()
		{
			if(!$this->session->userdata('is_logged') && !$this->session->userdata('business_id')) {
				$this->session->set_flashdata('error', 'Please sign in first.');
				redirect('businesses/signin');
			}
		}

    function getPlans()
    {
    	$this->db->where('active', 1);
    	$q = $this->db->get('plans');
    	if($q->num_rows() > 0) {
    		return $q->result_array();
    	} else {
    		return FALSE;
    	}
    }



}