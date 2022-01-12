<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// $this->load->model('student_model/course_model');
		$this->load->model('student_model/quiz_m','qm');
		$this->load->model('student_model/comment');
		$this->load->model('student_model/course_m');
		$this->load->model('notifications_m');
		$this->load->model('student_model/account_model','am');
		$this->load->model('subscription_m','sm');	
		$this->load->helper('date_helper');
		$this->perPage = 2;
		if(!$this->session->userdata('id'))
            redirect('user_controller/login'); 
	}

	public function index()
	{
		$conditions = array( 
            'limit' => $this->perPage 
        );
        $data['quizData']=$this->qm->getQuizData($this->session->userdata('id'));
		$data['section_data']=$this->course_m->getMyCourses($this->session->userdata('id'));
		$data['expired']=$this->course_m->checkSubscription($this->session->userdata('id'));
		$data['notifications']=$this->notifications_m->get_notifications();
		$data['posts'] = $this->comment->view_comments($conditions); 
		$data['main_content']='include/main_content';
		$this->load->view('include/template', $data);
	}

	public function my_acc_subscription()
	{
		$data['subscribe']=$this->sm->getSubscriptionDatabyUserId($this->session->userdata('id'));
		$data['expired']=$this->course_m->checkSubscription($this->session->userdata('id'));
		$data['notifications']=$this->notifications_m->get_notifications();
		$data['main_content']='lms_student/account/my_subscription';
		$this->load->view('include/template', $data);
	}

	public function my_subscription()
	{
		$data['notifications']=$this->notifications_m->get_notifications();
		$data['expired']=$this->course_m->checkSubscription($this->session->userdata('id'));
		$data['main_content']='lms_student/my_subscription';
		$this->load->view('include/template', $data);
	}

	public function my_cart()
	{
		$data['notifications']=$this->notifications_m->get_notifications();
		$data['expired']=$this->course_m->checkSubscription($this->session->userdata('id'));
		$data['main_content']='lms_student/my_cart';
		$this->load->view('include/template', $data);
	}

	public function continue_course()
	{
		$data['notifications']=$this->notifications_m->get_notifications();
		$data['expired']=$this->course_m->checkSubscription($this->session->userdata('id'));
		$user_id=$this->session->userdata('id');
		$data['cont_course']=$this->course_m->continue_course($user_id);
		$data['main_content']='lms_student/continue_course';
		$this->load->view('include/template', $data);
	}

	// public function courseContinuation()
 //    {
 //        $data['notifications']=$this->notifications_m->get_notifications();
 //        $user_id=$this->session->userdata('id');
 //        $data['cont_course']=$this->course_m->continue_course($user_id);
 //        $data['main_content']='lms_student/courseContinuation';
 //        $this->load->view('include/template', $data);
 //    }

    public function courseContinuation($chapters_id)
    {
        $data['notifications']=$this->notifications_m->get_notifications();
        $data['expired']=$this->course_m->checkSubscription($this->session->userdata('id'));
        $data['files']=$this->course_m->getRows();
        $this->db->select('course_material');
        $this->db->where('chapters_id',$chapters_id);
        $fileInfo=$this->db->get('chapters')->row();
        $data['pdfdown']=$fileInfo;
        $data['true']= $this->qm->checkingQj($chapters_id,$this->session->userdata('id'));
        $data['chapter_data']=$this->course_m->editChapterData($chapters_id);
        $data['section_data']=$this->course_m->getSection($chapters_id);
        $data['section_id']= $data['section_data'][0]->section_id;
        $data['chapters_id']=$chapters_id;
        $user_id=$this->session->userdata('id');
        $data['cont_course']=$this->course_m->continue_course($user_id);
        $data['main_content']    = 'lms_student/courseContinuation';
        $this->load->view('include/template', $data);
    }

    public function courseCont($chapters_id)
    {
        $data['notifications']=$this->notifications_m->get_notifications();
        $data['expired']=$this->course_m->checkSubscription($this->session->userdata('id'));
        $data['files']=$this->course_m->getRows();
        $this->db->select('course_material');
        $this->db->where('chapters_id',$chapters_id);
        $fileInfo=$this->db->get('chapters')->row();
        $data['pdfdown']=$fileInfo;
        $data['true']= $this->qm->checkingQj($chapters_id,$this->session->userdata('id'));
        $data['chapter_data']=$this->course_m->editChapterData($chapters_id);
        $data['section_data']=$this->course_m->getSection($chapters_id);
        $data['section_id']= $data['section_data'][0]->section_id;
        $data['chapters_id']=$chapters_id;
        $user_id=$this->session->userdata('id');
        $data['cont_course']=$this->course_m->continue_course($user_id);
        $data['main_content']    = 'lms_student/contcourse';
        $this->load->view('include/template', $data);
    }

	public function get_help()
	{
		$data['notifications']=$this->notifications_m->get_notifications();
		$data['expired']=$this->course_m->checkSubscription($this->session->userdata('id'));
		$data['get_ques']=$this->am->getHelpQuestion();
		$data['main_content']='lms_student/get_help';
		$this->load->view('include/template', $data);
	}
}