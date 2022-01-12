<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('student_model/profile');
		$this->load->model('student_model/course_m');
		$this->load->model('notifications_m');
		if(!$this->session->userdata('id'))
            redirect('user_controller/login');
	}

	public function my_profile()
	{

		$this->form_validation->set_rules('firstname', 'First Name', 'required|max_length[150]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required|max_length[150]');
		$this->form_validation->set_rules('contact', 'Mobile Number', 'required|min_length[10]|max_length[10]|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[150]');
		$this->form_validation->set_rules('school_name', 'School Name', 'required|max_length[150]');
		$this->form_validation->set_rules('school_address', 'School Address', 'required|max_length[150]');
		// $this->form_validation->set_rules('class_name', 'Class', 'required|max_length[150]');
		$this->form_validation->set_rules('grade', 'Grade', 'required|max_length[150]');
		$this->form_validation->set_rules('curriculum', 'Curriculum', 'required|max_length[150]');
		$this->form_validation->set_rules('medium', 'Medium', 'required|max_length[150]');
		$this->form_validation->set_rules('state', 'State', 'required|max_length[150]');
		$this->form_validation->set_rules('city', 'City', 'required|max_length[150]');

		$userData = array(
			'firstname' 		=> $this->input->post('firstname', TRUE), 
			'lastname' 			=> $this->input->post('lastname', TRUE), 
			'contact' 			=> $this->input->post('contact', TRUE), 
			'email' 			=> $this->input->post('email', TRUE),
		);

		$eduData = array(
			'school_name' 			=> $this->input->post('school_name', TRUE),
			'school_address' 			=> $this->input->post('school_address', TRUE),
			// 'class_name' => $this->input->post('class_name', TRUE),
			'grade' => $this->input->post('grade', TRUE),
			'curriculum' 			=> $this->input->post('curriculum', TRUE),
			'medium' 			=> $this->input->post('medium', TRUE),
			'state' 			=> $this->input->post('state', TRUE),
			'city' 			=> $this->input->post('city', TRUE),
		);

		$data['notifications']=$this->notifications_m->get_notifications();
		$data['eduData'] = $this->profile->fetcheducationData($this->session->userdata('id'));
		$data['userData'] = $this->profile->fetchStudentData($this->session->userdata('id'));
		$data['expired']=$this->course_m->checkSubscription($this->session->userdata('id'));
		$data['main_content']='lms_student/my_profile';
		$this->load->view('include/template', $data);
	}

	public function my_edu_info()
	{
		$this->form_validation->set_rules('school_name', 'School Name', 'required|max_length[150]');
		$this->form_validation->set_rules('school_address', 'School Address', 'required|max_length[150]');
		$this->form_validation->set_rules('grade', 'Grade', 'required|max_length[150]');
		$this->form_validation->set_rules('curriculum', 'Curriculum', 'required|max_length[150]');
		$this->form_validation->set_rules('medium', 'Medium', 'required|max_length[150]');

		$userData = array(
			'school_name' 			=> $this->input->post('school_name', TRUE),
			'school_address' 			=> $this->input->post('school_address', TRUE),
			'grade' 			=> $this->input->post('grade', TRUE),
			'curriculum' 			=> $this->input->post('curriculum', TRUE),
			'medium' 			=> $this->input->post('medium', TRUE),

		);
		$data['notifications']=$this->notifications_m->get_notifications();
		$data['userData'] = $this->profile->fetcheducationData($this->session->userdata('id'));
		$data['main_content']='lms_student/my_edu_info';
		$this->load->view('include/template', $data);
	}

	public function view_list()
	{
		$data['student_list']=$this->profile->get_student_data();
		$data['main_content']='lms_student/student_list';
		$this->load->view('include/template', $data);
	}
}