<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examination extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin_model/examination_m','em');
		$this->load->model('Chart_model','chartmodel',true);
		$this->load->library('upload');
		$this->load->model('user_model');
	}

	public function index()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['main_content']='lms_admin/examination/mock_papers';
		$this->load->view('include1/template', $data);
	}

	public function submitMockPapers()
	{	
		$config['upload_path'] = './uploads/files/'; //path folder
        $config['allowed_types'] = 'doc|docx|pdf'; //Allowing types
        $config['encrypt_name'] = False; //encrypt file name 
 
        $this->upload->initialize($config);
        if(!empty($_FILES['file_name']['name'])){
 
            if ($this->upload->do_upload('file_name')){
 
                $data   = $this->upload->data();
                $file  = $data['file_name']; //get file name
                $result=$this->em->submitMockPapers($file);
                if($result)
                {
			 		$this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
             		redirect('admin_controller/examination/index');
				}
				else
				{
					$this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
             		redirect('admin_controller/examination/index');
				}
			}
			else
			{
                echo "Upload failed. Image file must be gif|jpg|png|jpeg|bmp|pdf";
            }
                      
        }
        else
        {
            echo "Failed, Image file is empty.";
        }   

		$this->load->model('Notifications_m', 'nm');
		$nd=[
			'NotificationContent'=>$this->session->userdata('firstname').' Mock Test Paper uploaded',
			'NotificationRedirect'=>'/dhaji_lms/student_controller/files/index'//path to be passed inside site_url()
		];
		$this->nm->addNotification($nd);
	}

	public function addQuiz()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['quiz_title']=$this->em->getQuizTitle();
		$data['main_content']='lms_admin/examination/quiz';
		$this->load->view('include1/template', $data);
	}

	public function view_quiz()
	{
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['quiz']=$this->em->view_quiz();
		$data['main_content']='lms_admin/examination/view_quiz';
		$this->load->view('include1/template', $data);
	}

	public function submitMcqs()
	{
		$result=$this->em->submitMcqs();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
             redirect('admin_controller/examination/view_quiz');
		}else{
			$this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
             redirect('admin_controller/examination/view_quiz');
		}
	}

    public function deleteQuiz($quiz_id)
    {
        $result=$this->em->deleteQuiz($quiz_id);
        if($result){
             $this->session->set_flashdata('flashSuccess', 'Deleted Successfully.');
             redirect('admin_controller/examination/view_quiz');
        }else{
            $this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
             redirect('admin_controller/examination/view_quiz');
        }
    }
  	
  	public function historicalquestionanswer()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
        $data['grade']=$this->user_model->grade_list();
        $data['course']=$this->em->courseList();
        $data['qp']=$this->em->viewQP();
		$data['main_content']='lms_admin/examination/historicalQA';
		$this->load->view('include1/template', $data);
	}

	public function submitQP()
	{	
		$config['upload_path'] = './uploads/QP/'; //path folder
        $config['allowed_types'] = 'doc|docx|pdf'; //Allowing types
        $config['encrypt_name'] = False; //encrypt file name 
 
        $this->upload->initialize($config);
        if(!empty($_FILES['file']['name'])){
 
            if ($this->upload->do_upload('file')){
 
                $data   = $this->upload->data();
                $file  = $data['file_name']; //get file name
                $result=$this->em->submitQP($file);
                if($result)
                {
			 		$this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
             		redirect('admin_controller/examination/historicalquestionanswer');
				}
				else
				{
					$this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
             		redirect('admin_controller/examination/historicalquestionanswer');
				}
			}
			else
			{
                echo "Upload failed. Image file must be gif|jpg|png|jpeg|bmp|pdf";
            }
                      
        }
        else
        {
            echo "Failed, Image file is empty.";
        }   
	}

	public function deleteQP($id)
  	{
    	$result=$this->em->deleteQP($id);
    	if($result){
			 $this->session->set_flashdata('flashSuccess', 'Deleted Successfully.');
             redirect('admin_controller/examination/historicalquestionanswer');
		}else{
			$this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
             redirect('admin_controller/examination/historicalquestionanswer');
		}
  	}

	public function strategy()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['main_content']='lms_admin/examination/strategy';
		$this->load->view('include1/template', $data);
	}

	public function submitToppersView()
    {
        $file_name=$this->input->post('file_name');
        $videolink=$this->input->post('videolink');
        $this->db->where('file_name',$file_name);
        $this->db->where('videolink',$videolink);
        $result=$this->db->get('toppersview')->row();
        if(empty($result))
        {
            $result=$this->db->insert('toppersview',array('user_id' =>1,'file_name' =>$file_name, 'videolink'=>$videolink));
            if($result)
            {
				 $this->session->set_flashdata('flashSuccess', 'Submit Successfully.');
	             redirect('admin_controller/examination/strategy');
			}else{
				$this->session->set_flashdata('flashError', 'Duplicate Enter Class Name !!!. Please try again!!!');
	             redirect('admin_controller/examination/strategy');
			}
        }
        else
        {	
            $this->db->where('user_id',1);
            $res=$this->db->delete('toppersview');
            if($res)
            {
                $result=$this->db->insert('toppersview',array('user_id' =>1,'file_name' =>$file_name, 'videolink'=>$videolink));
	            if($result)
	            {
					 $this->session->set_flashdata('flashSuccess', 'Submit Successfully.');
		             redirect('admin_controller/examination/strategy');
				}else{
					$this->session->set_flashdata('flashError', 'Duplicate Enter Class Name !!!. Please try again!!!');
		             redirect('admin_controller/examination/strategy');
				}
            }
        }
    }

	public function submitSubjectwiseView()
    {
        $file_name=$this->input->post('file_name');
        $videolink=$this->input->post('videolink');
        $this->db->where('file_name',$file_name);
        $this->db->where('videolink',$videolink);
        $result=$this->db->get('subjectwiseview')->row();
        if(empty($result))
        {
            $result=$this->db->insert('subjectwiseview',array('user_id' =>1,'file_name' =>$file_name, 'videolink'=>$videolink));
            if($result)
            {
				 $this->session->set_flashdata('flashSuccess', 'Submit Successfully.');
	             redirect('admin_controller/examination/strategy');
			}else{
				$this->session->set_flashdata('flashError', 'Duplicate Enter Class Name !!!. Please try again!!!');
	             redirect('admin_controller/examination/strategy');
			}
        }
        else
        {	
            $this->db->where('user_id',1);
            $res=$this->db->delete('subjectwiseview');
            if($res)
            {
                $result=$this->db->insert('subjectwiseview',array('user_id' =>1,'file_name' =>$file_name, 'videolink'=>$videolink));
	            if($result)
	            {
					 $this->session->set_flashdata('flashSuccess', 'Submit Successfully.');
		             redirect('admin_controller/examination/strategy');
				}else{
					$this->session->set_flashdata('flashError', 'Duplicate Enter Class Name !!!. Please try again!!!');
		             redirect('admin_controller/examination/strategy');
				}
            }
        }
    }

	public function submitAnswerWritting()
    {
        $file_name=$this->input->post('file_name');
        $videolink=$this->input->post('videolink');
        $this->db->where('file_name',$file_name);
        $this->db->where('videolink',$videolink);
        $result=$this->db->get('answerwritting')->row();
        if(empty($result))
        {
            $result=$this->db->insert('answerwritting',array('user_id' =>1,'file_name' =>$file_name, 'videolink'=>$videolink));
            if($result)
            {
				 $this->session->set_flashdata('flashSuccess', 'Submit Successfully.');
	             redirect('admin_controller/examination/strategy');
			}else{
				$this->session->set_flashdata('flashError', 'Duplicate Enter Class Name !!!. Please try again!!!');
	             redirect('admin_controller/examination/strategy');
			}
        }
        else
        {	
            $this->db->where('user_id',1);
            $res=$this->db->delete('answerwritting');
            if($res)
            {
                $result=$this->db->insert('answerwritting',array('user_id' =>1,'file_name' =>$file_name, 'videolink'=>$videolink));
	            if($result)
	            {
					 $this->session->set_flashdata('flashSuccess', 'Submit Successfully.');
		             redirect('admin_controller/examination/strategy');
				}else{
					$this->session->set_flashdata('flashError', 'Duplicate Enter Class Name !!!. Please try again!!!');
		             redirect('admin_controller/examination/strategy');
				}
            }
        }
    }
}
