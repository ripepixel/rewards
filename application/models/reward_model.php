<?php

class Reward_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function addReward($data)
    {
    	$this->db->insert('rewards', $data);
    	return true;
    }

    function getRewards($oid)
    {
    	$this->db->where('outlet_id', $oid);
    	$this->db->where('business_id', $this->session->userdata('business_id'));
    	$this->db->where('is_deleted', 0);;

    	$q = $this->db->get('rewards');
    	if($q->num_rows() > 0) {
    		return $q->result_array();
    	} else {
    		return false;
    	}
    }

    function qtyExists($qty, $oid)
    {
        $this->db->where('points', $qty);
        $this->db->where('outlet_id', $oid);
        $q = $this->db->get('rewards');
        if($q->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }








}