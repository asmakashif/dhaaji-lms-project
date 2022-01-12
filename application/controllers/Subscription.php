<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('subscription_m','sm');
	}

	public function subscribe($id)
	{
		// echo $id; die();
		$data['std_id']=$id;
		$data['subscribe']=$this->sm->getSubscriptionData();
		$this->load->view('auth/subscription',$data);
	}
    
    public function in_active($id)
    {   
    	$result=$this->sm->in_active($id);
        redirect('welcome/logout'); 
    }
}