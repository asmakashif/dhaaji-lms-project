<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResponseController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('student_model/profile');
		$this->load->model('admin_model/ResponseModel','rm');
        $this->load->model('Chart_model','chartmodel',true);
		$this->load->model('notifications_m');
	}

    public function students_response()
    {
        $data['notifications']=$this->notifications_m->get_notifications();
        $allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
        $data['posts']=$this->rm->fetchComment();
        $data['fetchComment']=$this->rm->fetchSingleComment();
        $data['main_content']='lms_admin/evaluation/student_response';
        $this->load->view('include1/template', $data);
    }

    public function commentReply($comment_id)
    {
        $data['notifications']=$this->notifications_m->get_notifications();
        $data['userData'] = $this->profile->fetchStudentData($this->session->userdata('id'));
        $data['data_info']=$this->rm->fetchDatainfolastId($comment_id);
        $data['reply_data']=$this->rm->fetchReply($comment_id);
        $data['main_content']='lms_admin/evaluation/Replyresponse';
        $this->load->view('include/template',$data);
    }

    public function saveCommentReply()
    {
        $insert_id=$this->rm->saveCommentReply();

        $this->load->model('Notifications_m', 'nm');
        $nd=[
                'NotificationContent'=> $this->session->userdata('email').       'Replied to your question',
                'NotificationSenderID'=>$this->session->userdata('id'),
                'NotificationRedirect'=>'/dhaji_lms/student_controller/comment_controller/fetch_comment/',
                //path to be passed inside site_url()
            ];
            $this->nm->addNotification($nd);

        if(!empty($insert_id))
        {
            $this->session->set_flashdata('flashSuccess', 'Submited Successfully');
            $data['data_info']=$this->rm->fetchDatainfolastId($insert_id);
            redirect('admin_controller/ResponseController/students_response');
        }
        else
        {
            $this->session->set_flashdata('flashError', 'Something is wrong please try again.');
            redirect('admin_controller/ResponseController/students_response');
        }
    }
}