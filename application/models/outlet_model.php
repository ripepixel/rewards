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
		$q = $this->db->insert('outlets', $data);
		$id = $q->insert_id();
		return $id;
	}

	function updateOutlet($oid, $data)
	{
		$this->db->where('id', $oid);
		$this->db->where('business_id', $this->session->userdata('business_id'));
		$this->db->update('outlets', $data);
		return true;
	}
	
	function getOutletSettings($oid)
	{
		$this->db->where('outlet_id', $oid);
		$q = $this->db->get('outlet_settings');
		if($q->num_rows() == 1) {
			return $q->row();
		} else {
			return false;
		}
	}
	
	function updateOutletSettings($oid, $data)
	{
		$this->db->where('id', $oid);
		$this->db->update('outlet_settings', $data);
		return true;
	}



}
