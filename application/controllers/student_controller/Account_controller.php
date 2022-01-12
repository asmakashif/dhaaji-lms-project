<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('student_model/profile');
		$this->load->model('student_model/account_model');
		$this->load->model('notifications_m');
		if(!$this->session->userdata('id'))
            redirect('user_controller/login');
	}

	public function edit_account()
	{

		$this->form_validation->set_rules('school_name', 'School Name', 'required|max_length[150]');
		$this->form_validation->set_rules('school_address', 'School Address', 'required|max_length[150]');
		$this->form_validation->set_rules('state', 'State', 'required|max_length[150]');
		$this->form_validation->set_rules('city', 'City', 'required|max_length[150]');
		$this->form_validation->set_rules('contact', 'Mobile Number', 'required|min_length[10]|max_length[10]|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[150]');
		$this->form_validation->set_rules('relation', 'Relationship', 'required|max_length[150]');
		$this->form_validation->set_rules('guardian_name', 'Guardian Name', 'required|max_length[150]');
		$this->form_validation->set_rules('guardian_address', 'Guardian Address', 'required|max_length[150]');
		$this->form_validation->set_rules('phone_number', 'Mobile Number', 'required|min_length[10]|max_length[10]|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[150]');

		$guardianData = array(
			'relation' 			=> $this->input->post('relation', TRUE),
			'guardian_name' 		=> $this->input->post('guardian_name', TRUE),
			'guardian_address' 		=> $this->input->post('guardian_address', TRUE),
			'phone_number' 			=> $this->input->post('phone_number', TRUE), 
			'email' 			=> $this->input->post('email', TRUE),
		);

		$eduData = array(
			'school_name' 			=> $this->input->post('school_name', TRUE),
			'school_address' 		=> $this->input->post('school_address', TRUE),
			'state' 		=> $this->input->post('state', TRUE),
			'city' 		=> $this->input->post('city', TRUE),
		);

		$userData = array(
			'contact' 			=> $this->input->post('contact', TRUE), 
			'email' 			=> $this->input->post('email', TRUE),
		);
		
		$data['notifications']=$this->notifications_m->get_notifications();
		$data['guardianData'] = $this->account_model->fetchGuardianData($this->session->userdata('id'));
		$data['eduData'] = $this->profile->fetcheducationData($this->session->userdata('id'));
		$data['userData'] = $this->profile->fetchStudentData($this->session->userdata('id'));
		// $data['city_list']=$this->account_model->city_list();
		// $data['state_list']=$this->account_model->state_list();
		$data['main_content']='auth/edit_account';
		$this->load->view('include/template', $data);
	}

	public function add()
	{
		$data['notifications']=$this->notifications_m->get_notifications();
		$data['main_content']='auth/add_guardian';
		$this->load->view('include/template', $data);
	}

	public function save_guardian_data()
	{
		$result=$this->account_model->save_guardian_data();
		if($result)
		{
			$this->session->set_flashdata('flashSuccess', 'Added Successfully.');
			redirect('student_controller/student_dashboard/index');
		}
		else
		{
			$this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
			redirect('student_controller/account_controller/add');
		}
	}
	
	function update_data() 
  	{
  		$data = array(
  			'school_name' => $this->input->post('school_name'),
  			'school_address' => $this->input->post('school_address'),
     		'state' => $this->input->post('state'),
     		'city' => $this->input->post('city'),
     		'pointofcontact' => $this->input->post('pointofcontact'),
     		'created_date' => date("Y-m-d H:i:s")
    	);
    	
    	if($this->account_model->update_data($data))
    	redirect('student_controller/account_controller/edit_account');
 	}
 	
 	function updateGuardiandata() 
  	{
  		$data = array(
  			'relation' => $this->input->post('relation'),
  			'guardian_name' => $this->input->post('guardian_name'),
     		'guardian_address' => $this->input->post('guardian_address'),
     		'phone_number' => $this->input->post('phone_number'),
     		'email' => $this->input->post('email'),
     		'created_date' => date("Y-m-d H:i:s")
    	);
    	
    	if($this->account_model->updateGuardiandata($data))
    	redirect('student_controller/account_controller/edit_account');
 	}
}