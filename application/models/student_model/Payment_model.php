<?php
class Payment_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function fetchDatainfolastId($fee_id )
	{  
		$this->db->where('fee_id ',$fee_id );
		return $this->db->get('fee_structure')->row();
	}


	public function save_card_info()
	{
		$user_id=$this->session->userdata('id');
		$plan_id=$this->input->post('plan_id');
		$plan_amount=$this->input->post('plan_amount');
		$plan_name=$this->input->post('plan_name');
		$status=$this->input->post('status');

		$insert_card_info=array
		(
			'plan_id'=>$plan_id,
			'plan_amount'=>$plan_amount,
			'plan_name'=>$plan_name,
			'user_id' => $user_id,
			'status' => 1
		);
		$insert_success=$this->db->insert('payment_details',$insert_card_info);
		if($insert_success)
		{
			$this->db->where('id',$user_id);
			$this->db->update('tbl_users',array('status' =>1,'plan_name'=>$plan_name));
		}
		return $insert_success;
	}
}