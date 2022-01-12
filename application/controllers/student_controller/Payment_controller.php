<?php
class Payment_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('student_model/payment_model');
		$this->load->model('subscription_m','sm');
		if(!$this->session->userdata('id'))
            redirect('user_controller/login');
	}

	public function check_out($fee_id )
    {
    	// $data['std_id']=$std_id;
        $data['data_info']=$this->payment_model->fetchDatainfolastId($fee_id );
        $this->load->view('auth/check_out',$data);
    }

	public function save_card()
	{
		$insert_id=$this->payment_model->save_card_info();
		if(!empty($insert_id))
    	{
	    	$this->session->set_flashdata('flashSuccess', 'Submited Successfully');
		    $data['data_info']=$this->payment_model->fetchDatainfolastId($insert_id);
		    $this->load->view('auth/login', $data);
    	}
    	else
    	{
      		$this->session->set_flashdata('flashError', 'Something is wrong please try again.');
      		$this->load->view('auth/check_out');
    	}
	}
}