<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('notifications_m');
        $this->load->model('student_model/certificate_m','cem');
        $this->load->model('student_model/profile');
        $this->load->model('student_model/Course_m','cm');
        // $this->load->library('pdf');
        if(!$this->session->userdata('id'))
            redirect('user_controller/login');
    }

    public function index()
    {
        $data['notifications']=$this->notifications_m->get_notifications();
        $data['student_info'] = $this->cem->getStudentInfo();
        $data['main_content']='lms_student/certification/index';
        $this->load->view('include/template', $data);
    }

    public function view_certificate($course_id)
    {
        $data['notifications']=$this->notifications_m->get_notifications();
        $data['true']= $this->cem->checkingQj($course_id);
        // print_r($data);die();
        $data['course_data']=$this->cm->getCourseData($course_id);
        $data['userData'] = $this->profile->fetchStudentData($this->session->userdata('id'));
        $data['fetchdatabyid']=$this->cem->fetchCourseData($course_id);
        $data['main_content']='lms_student/certification/certificate';
        $this->load->view('include/template', $data);
    }

}