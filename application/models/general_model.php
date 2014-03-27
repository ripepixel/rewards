<?php

class General_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
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