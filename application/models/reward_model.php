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

		function getRandomRewards($oid)
		{
			$this->db->where('outlet_id', $oid);
    	$this->db->where('business_id', $this->session->userdata('business_id'));
    	$this->db->where('is_deleted', 0);
			//$this->db->order_by('points', 'ASC');
			$this->db->order_by('id', 'RANDOM');
			$this->db->limit(5);
			
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

    function saveOffer($data)
    {
        $this->db->insert('offers', $data);
        return true;
    }

		function updateOffer($oid, $data)
    {
      $this->db->where('id', $oid);
  		$this->db->where('business_id', $this->session->userdata('business_id'));
			$this->db->update('offers', $data);
      return true;
    }

		function deleteOffer($oid)
		{
			// need to check if there are any instances of the offer in the users_offers table (when it exists)
			// if there are, just set is_deleted = 1
			// otherwise, delete completely
			$this->db->where('id', $oid);
			$this->db->where('business_id', $this->session->userdata('business_id'));
			$q = $this->db->get('offers');
			$row = $q->row();
			
			$image = $q->image;
			
			unlink('./uploads/offers/'.$image);
			
			$this->db->where('id', $row->id);
			$this->db->delete('offers');
			
			return true;
		}
		
		function expireOffer($oid)
		{
			$this->db->where('id', $oid);
			$this->db->where('business_id', $this->session->userdata('business_id'));
			$expiry = date('Y-m-d', time() - 86400);
			$data = array(
				'expiry_date' => $expiry
			);
			$this->db->update('offers', $data);
			
			return true;
		}

    function getOffers()
    {
        $this->db->where('business_id', $this->session->userdata('business_id'));
        $this->db->where('is_deleted', 0);
        $this->db->order_by('expiry_date', 'DESC');
        $q = $this->db->get('offers');
        if($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }

		function getOffer($oid)
    {
        $this->db->where('id', $oid);
        $this->db->where('business_id', $this->session->userdata('business_id'));
        $this->db->where('is_deleted', 0);

        $q = $this->db->get('offers');
        if($q->num_rows() > 0) {
            return $q->row();
        } else {
            return false;
        }
    }






}