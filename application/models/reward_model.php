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

    function updateReward($rid, $data)
    {
        $this->db->where('id', $rid);
        $this->db->where('business_id', $this->session->userdata('business_id'));
        $this->db->update('rewards', $data);
        return true;
    }

    function deleteReward($rid)
    {
        // should check: if transactions exist with this reward, set to deleted; otherwise delete the record
        $this->db->where('reward_id', $rid);
        $q = $this->db->get('transactions');
        if($q->num_rows() > 0) {
            // there are transactions, so just set as deleted
            $data = array('is_active' => 0, 'is_deleted' => 1);
            $this->db->where('id', $rid);
            $this->db->where('business_id', $this->session->userdata('business_id'));
            $this->db->update('rewards', $data);
        } else {
            // no transactions, so delete record
            $this->db->where('id', $rid);
            $this->db->where('business_id', $this->session->userdata('business_id'));
            $this->db->delete('rewards');
        }
        
        if($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function getReward($rid)
    {
        $this->db->where('id', $rid);
        $this->db->where('business_id', $this->session->userdata('business_id'));
        $this->db->where('is_deleted', 0);;

        $q = $this->db->get('rewards');
        if($q->num_rows() > 0) {
            return $q->row();
        } else {
            return false;
        }
    }

    function getRewards($oid)
    {
    	$this->db->where('outlet_id', $oid);
    	$this->db->where('business_id', $this->session->userdata('business_id'));
    	$this->db->where('is_deleted', 0);

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
        $this->db->where('is_deleted', 0);
        $q = $this->db->get('rewards');
        if($q->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }








}