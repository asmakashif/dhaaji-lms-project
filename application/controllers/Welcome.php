<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('student_model/course_m');
    }
    
	public function index()
	{
		$data['main_content']='include_1/main_content';
		$this->load->view('include_1/template', $data);
		//$this->load->view('index');
	}

	// public function logout()
	// {
	// 	$user_id=$this->session->userdata('id');
	// 	$logout_time=date('Y-m-d H:i:s');
	// 	if(!empty($logout_time)){
 //         $cartdata=array('user_id' => $user_id,'logout_time'=>$logout_time);
 //         $this->db->update('time_spent',$cartdata);
	// 	}
	// 	$this->session->unset_userdata('userdata');
	// 	$this->session->sess_destroy();
	// 	redirect('welcome/index');
	// }

	public function logout()
	{
        $user_id=$this->session->userdata('id');
		$carts=$this->cart->contents();
		if(!empty($carts)){
         $cartdata=array('user_id' => $user_id,'cart_details'=>json_encode($carts),'active'=>1);
         $this->db->insert('temp_cart',$cartdata);
         $this->db->update('temp_cart',$cartdata);
		}
		$logout_time=date('Y-m-d H:i:s');
		if(!empty($logout_time)){
         $cartdata=array('user_id' => $user_id,'logout_time'=>$logout_time);
         $this->db->update('time_spent',$cartdata);
		}
		$this->session->unset_userdata('userdata');
		$this->session->sess_destroy();
		redirect('welcome/index');
	}
	
		public function mobilelogout()
	{
        $user_id=$this->session->userdata('id');
		$logout_time=date('Y-m-d H:i:s');
        $data = array(
            'user_id' => $user_id,
            'logout_time'=>$logout_time
        );
        $this->user_model->logout($user_id,$data);
		$this->session->unset_userdata('userdata');
		$this->session->sess_destroy();
		redirect('user_controller/login');
	}
	
}
