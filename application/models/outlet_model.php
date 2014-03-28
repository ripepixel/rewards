<?php

class Outlet_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function isMyOutlet($oid)
    {
    	$this->db->where('id', $oid);
    	$this->db->where('business_id', $this->session->userdata('business_id'));
    	$q = $this->db->get('outlets');

    	if($q->num_rows() == 1) {
    		return true;
    	} else {
    		return false;
    	}
    }

    function getOutlet($oid)
    {
    	$this->db->where('id', $oid);
    	$this->db->where('business_id', $this->session->userdata('business_id'));
    	$q = $this->db->get('outlets');

    	if($q->num_rows() == 1) {
    		return $q->row();
    	} else {
    		return false;
    	}
    }

    function getFirstOutlet()
    {
    	$this->db->where('business_id', $this->session->userdata('business_id'));
    	$q = $this->db->get('outlets');

    	if($q->num_rows() > 0) {
    		return $q->row();
    	} else {
    		return false;
    	}
    }

    function saveOutlet($data)
	{
		$this->db->insert('outlets', $data);
		return true;
	}

	function updateOutlet($oid, $data)
	{
		$this->db->where('id', $oid);
		$this->db->where('business_id', $this->session->userdata('business_id'));
		$this->db->update('outlets', $data);
		return true;
	}



}
