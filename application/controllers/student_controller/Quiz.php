<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('student_model/quiz_m','qm');
//$this->load->model('student_model/course_model');
        if(!$this->session->userdata('id'))
            redirect('user_controller/login');
        if(!$this->session->userdata('id'))
            redirect('user_controller/login');
    }

    public function take_quiz($chapters_id)
    {
        $data['quizData']=$this->qm->getQuizData($this->session->userdata('id'));
        $data['true']= $this->qm->checkingQj($chapters_id,$this->session->userdata('id')); 
        $check_no_of_attempt = $this->qm->no_of_attempt($chapters_id);  
        if($check_no_of_attempt == 0)	{
            $data['questions'] = $this->qm->takequiz($chapters_id);
            $data['chapterid']	=	$chapters_id;
            // $data['courseid']  =   $course_id;
            $data['noofattempt'] = $check_no_of_attempt;
            $data['main_content'] = 'lms_student/courses/quiz';
            $this->session->set_flashdata('flashSuccess', 'You are attempting exam first time');
            $this->load->view('include/template', $data);
        } else if($check_no_of_attempt == 1)	{
            $data['questions'] = $this->qm->takequiz($chapters_id);
            $data['chapterid']	=	$chapters_id;
            // $data['courseid']  =   $course_id;
            $data['noofattempt'] = $check_no_of_attempt;
            $data['main_content'] = 'lms_student/courses/quiz';
            $this->session->set_flashdata('flashSuccess', 'You are attempting exam second time');
            $this->load->view('include/template', $data);
        }else {
            $this->session->set_flashdata('flashError', 'You already attended exam 2 times');
            redirect(base_url('student_controller/student_dashboard/'));
        }

    }
    public function saveAns(){
        $qno=$this->input->post('qno');
        $ans=$this->input->post('ans');
        $cid=$this->input->post('cid');
        //$course_id=$this->input->post('course_id'); 
        $userid=$this->input->post('userid');
        $chkq=$this->db->query("select * from  quiz_result where chapter_id=".$cid." and user_id=".$userid." and question_id=".$qno." ");

        if($chkq->num_rows() == 0)
        {
            $data=array(
                "user_id"=>$userid,
                //"course_id"=>$course_id,
                "chapter_id"=>$cid,
                "question_id"=>$qno,
                "q_answer"=>$ans
            );            
            $this->db->insert('quiz_result', $data);            
        }else{

            $this->db->set('q_answer',$ans);            
            $this->db->where('user_id', $userid);
            //$this->db->where('course_id', $course_id);
            $this->db->where('chapter_id', $cid);            
            $this->db->where('question_id', $qno);             
            $this->db->update('quiz_result');                       

        }
    }

    public function resultdisplay()
    {
		// $this->qm->takequiz($chapters_id);
        if(isset($_GET['cid'])){
            $cid=$_GET['cid'];
            $data['course'] = $this->qm->coursedetails($cid);
            $data['correct'] = $this->qm->correctanswer($cid);
            $data['wrong'] = $this->qm->wronganswer($cid);
            $check_no_of_attempt = $this->qm->no_of_attempt($cid);  
            if($check_no_of_attempt == 0) {
                $this->db->insert('no_of_attempt',array(
                    "user_id" => $this->session->userdata("id"),
                    "chapter_id" => $cid,
                    "noofattempt" => $check_no_of_attempt + 1
                ));
            }else if($check_no_of_attempt == 1) {
                $this->db->set('noofattempt',$check_no_of_attempt + 1);            
                $this->db->where('user_id', $this->session->userdata("id"));
                $this->db->where('chapter_id', $cid);
                $this->db->update('no_of_attempt'); 
            }else{}
        }
        $data['userdet'] = $this->qm->getUserDetails();
        $data['main_content'] = 'lms_student/courses/quizresult';
        $this->load->view('include/template', $data);
    }
}