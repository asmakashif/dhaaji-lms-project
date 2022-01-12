<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('student_model/Course_m','cm');
        $this->load->model('notifications_m');
        $this->load->model('student_model/quiz_m','qm');
        if(!$this->session->userdata('id'))
            redirect('user_controller/login');
    }

    public function view_course($course_id)
    {
        //$data['course'] = $this->course_model->getCourse();
        $data['notifications']=$this->notifications_m->get_notifications();
        $data['course_data']=$this->cm->getCourseData($course_id);
        $data['chapter_data']=$this->cm->getChapter($course_id);
        $data['main_content']    = 'lms_student/courses/chapters';
        $this->load->view('include/template', $data);
    }

    public function view_chapter($chapters_id)
    {
        $data['notifications']=$this->notifications_m->get_notifications();
        $data['files']=$this->cm->getRows();
        $this->db->select('course_material');
        $this->db->where('chapters_id',$chapters_id);
        $fileInfo=$this->db->get('chapters')->row();
        $data['pdfdown']=$fileInfo;
        $data['chapter_data']=$this->cm->editChapterData($chapters_id);
        $data['section_data']=$this->cm->getSection($chapters_id);
        $data['section_id']= $data['section_data'][0]->section_id;
        $data['chapters_id']=$chapters_id;
        $user_id=$this->session->userdata('id');
        $data['cont_course']=$this->cm->continue_course($user_id);
        $data['main_content']    = 'lms_student/courses/section';
        $this->load->view('include/template', $data);
    }

    public function view_test_chapter($chapters_id)
    {
        $data['notifications']=$this->notifications_m->get_notifications();
        $data['files']=$this->cm->getRows();
        $this->db->select('course_material');
        $this->db->where('chapters_id',$chapters_id);
        $fileInfo=$this->db->get('chapters')->row();
        $data['pdfdown']=$fileInfo;
        $data['chapter_data']=$this->cm->editChapterData($chapters_id);
        $data['section_data']=$this->cm->getSection($chapters_id);
        $data['chapters_id']=$chapters_id;
        $user_id=$this->session->userdata('id');
        $data['main_content']    = 'lms_student/courses/section';
        $this->load->view('include/template', $data);
    }

    
    public function viewExtraCourse($course_id)
    {
        //$data['course'] = $this->course_model->getCourse();
        $data['notifications']=$this->notifications_m->get_notifications();

        $data['expired']=$this->cm->checkCourseSubscription($this->session->userdata('id'));
        
        $data['course_data']=$this->cm->getCourseData($course_id);
        $data['chapter_data']=$this->cm->getChapter($course_id);
        $data['main_content']    = 'lms_student/courses/extraCourseChapter';
        $this->load->view('include/template', $data);
    }

    public function viewExtraChapter($chapters_id)
    {
        $data['notifications']=$this->notifications_m->get_notifications();
        // $data['files']=$this->cm->getRows();
        $this->db->select('course_material');
        $this->db->where('chapters_id',$chapters_id);
        $fileInfo=$this->db->get('chapters')->row();
        $data['pdfdown']=$fileInfo;
        $data['chapter_data']=$this->cm->editChapterData($chapters_id);
        $data['section_data']=$this->cm->getSection($chapters_id);
        $data['chapters_id']=$chapters_id;
        $data['main_content']    = 'lms_student/courses/extraCourseSection';
        $this->load->view('include/template', $data);
    }

    public function my_course()
    {
        $data['notifications']=$this->notifications_m->get_notifications();
        $data['section_data']=$this->cm->getMyCourses($this->session->userdata('id'));
        // $data['course_data'] = $this->cm->getMyCourses();
        $data['main_content']='lms_student/my_course';
        $this->load->view('include/template', $data);
    }


    public function download($chapters_id)
    {
        if(!empty($chapters_id)){
            //load download helper
            $this->load->helper('download');
            //get file info from database
            //$fileInfo = $this->cm->getRows(array('chapters_id' => $chapters_id));
            //file path
             $this->db->select('file_name');
             $this->db->where('chapters_id',$chapters_id);
             $fileInfo=$this->db->get('chapters')->row();
            //starts by indrajeet
            $file = 'uploads/files/'.$fileInfo->file_name;
            //download file from directory
            force_download($file, NULL);
        }
    }

    public function WatchingTrackeringVideo()
    {
        $chapters_id=$this->input->post('chapters_id');
        if($this->input->post('flag') == 'complete'){
            $timePlayed=$this->input->post('timePlayed');
            $act=1; 
        }else{
           $timePlayed=$this->input->post('timePlayed');
           $act=0;
        }
        $section_id=$this->input->post('section_id');
        $user_id=$this->session->userdata('id');
        $this->db->where('chapter_id',$chapters_id);
        $this->db->where('section_id',$section_id);
        $this->db->where('user_id',$user_id);
        $result=$this->db->get('video_path')->row();
        if(empty($result))
        {
            return $this->db->insert('video_path',array('section_id' =>$section_id,'user_id'=>$user_id,'chapter_id'=>$chapters_id,'timePlayed'=> $timePlayed,'active'=>$act));
        }
        else
        {
            $this->db->where('chapter_id',$chapters_id);
            $this->db->where('section_id',$section_id);
            $this->db->where('user_id',$user_id);
            $res=$this->db->delete('video_path');
            if($res)
            {
                return $this->db->insert('video_path',array('section_id' =>$section_id,'user_id'=>$user_id,'chapter_id'=>$chapters_id,'timePlayed'=> $timePlayed,'active'=>$act));
            }
        }
    }
    
    public function viewPDF($chapters_id)
    {
        $this->db->select('course_material');
        $this->db->where('chapters_id',$chapters_id);
        $fileInfo=$this->db->get('chapters')->row();
        $data['pdfdown']=$fileInfo;
        $this->load->view('lms_student/pdf', $data);
    }
}