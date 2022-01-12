<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CurrentOrders extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('notifications_m');
	}

	public function current_orders()
	{	
		$data['orders']=$this->master_model->getOrderDetails();
		$data['main_content']='lms_admin/books_store/current_orders/index';
		$this->load->view('include1/template', $data);
	}

	public function current_orders()
	{	
		$data['orders']=$this->master_model->getOrderDetails();
		$data['main_content']='lms_admin/books_store/current_orders/index';
		$this->load->view('include1/template', $data);
	}

}