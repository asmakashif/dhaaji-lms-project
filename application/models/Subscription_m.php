<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getSubscriptionData()
	{
		$this->db->select('*');
		$this->db->from('fee_structure');
		$this->db->where('class_id!=',1);
		$subscription=$this->db->get()->result();
		return $subscription;
	}

	public function getSubscriptionDatabyUserId($user_id)
	{
		$this->db->select('*');
		$this->db->from('payment_details as p');//table name
	    $this->db->join('tbl_users as u','p.user_id=u.id');
	    $this->db->group_by('p.user_id');
		$this->db->where('p.user_id',$user_id);
		$query=$this->db->get()->result();
		return $query;
	}
	
	public function in_active($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('tbl_users',array('status' =>0));
    }
}