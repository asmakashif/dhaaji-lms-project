<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}


	public function save_guardian_data()
	{
		$relation=$this->input->post('relation');
		$guardian_name=$this->input->post('guardian_name');
		$guardian_address=$this->input->post('guardian_address');
		$phone_number=$this->input->post('phone_number');
		$email=$this->input->post('email');
		$user_id=$this->session->userdata('id');
		$registerinsert=array
		(
			'relation'=>$relation,
			'guardian_name'=>$guardian_name,
			'guardian_address'=>$guardian_address,
			'phone_number'=>$phone_number,
			'email'=>$email,
			'user_id' => $user_id,
		);
		// $user_id=$this->session->userdata('id');
		$insert_success=$this->db->insert('guardian',$registerinsert);
		return $insert_success;
	}

	public function fetchGuardianData($user_id )
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('guardian');
		// var_dump($this->db->last_query());
		// exit();
		if($query->num_rows() > 0)
		{
			return  $query->row_array();
		}
		else
		{
			return false;
		}
	}

	public function getHelpQuestion()
	{
		$this->db->select('*');
		$this->db->from('help_center');//table name
		$this->db->where('active',0);
		$ques_list=$this->db->get()->result();
		return $ques_list;
	}
	
	function update_data($data)
	{
		$user_id=$this->session->userdata('id');
		$this->db->where('user_id', $user_id);
		if($this->db->update('student_school_info', $data))
		{
			return TRUE;
		} 
	}
	
	function updateGuardiandata($data)
	{
		$user_id=$this->session->userdata('id');
		$this->db->where('user_id', $user_id);
		if($this->db->update('guardian', $data))
		{
			return TRUE;
		} 
	}
}