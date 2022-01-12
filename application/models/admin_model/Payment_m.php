<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Payment_m extends CI_Model 
{

	public function show_all_data() 
	{
		$this->db->select('*');
		$this->db->from('payment_details');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function show_data_by_id($id) 
	{
		$condition = "p.user_id =" . "'" . $id . "'";
		$this->db->select('u.firstname,s.grade,p.id,p.plan_name,p.payment_date,p.plan_amount');
		$this->db->from('tbl_users as u');
		$this->db->join('payment_details as p','u.id=p.user_id');
		$this->db->join('student_school_info as s','u.id=s.user_id');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}