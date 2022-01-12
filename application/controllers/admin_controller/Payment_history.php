<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payment_history extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('admin_model/payment_m','pm');
		$this->load->model('Chart_model','chartmodel',true);
	}

	public function view_table()
	{
		$result = $this->pm->show_all_data();
		if ($result != false) 
		{
			return $result;
		} else 
		{
			return 'Database is empty !';
		}
	}

	public function index() 
	{
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['show_table'] = $this->view_table();
		$data['main_content']='lms_admin/finance/payment_history';
		$this->load->view('include1/template', $data);
	}

	public function select_by_id() 
	{
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$id = $this->input->post('id');
		if ($id != "") {
			$result = $this->pm->show_data_by_id($id);
			if ($result != false) 
			{
				$data['result_display'] = $result;
			} 
			else 
			{
				$data['result_display'] = "No record found !";
			}
		} 
		else 
		{
			$data = array(
				'id_error_message' => "User id is required"
			);
		}
		$data['show_table'] = $this->view_table();
		$data['main_content']='lms_admin/finance/payment_history';
		$this->load->view('include1/template', $data);
	}
}