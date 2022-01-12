<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadTest extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_model','mm');
		$this->load->model('user_model');
		$this->load->model('student_model/profile');
        $this->load->library('upload');
	}

	public function index()
	{
		$data['main_content']='main/uploadAnswerSheet';
		$this->load->view('include_1/template', $data);
	}

	public function login()
    {
        $this->load->view('auth/mainlogin');
    }

	public function auth()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Pwd','required');
    
        $email=$this->input->post('email');
        $pass=$this->input->post('password');

        $ceklogin=$this->user_model->login($email,$pass);

        if($ceklogin)
        {

                foreach($ceklogin as $row);
                $userdata=array();
                $userdata['id']=$row->id;
                $userdata['email']=$row->firstname;
                $userdata['role_id']=$row->role_id;
                $userdata['verify_email']=$row->verify_email;
                $userdata['last_accessed_time']=$row->last_accessed_time;
                $userdata['status']=$row->status;
                $userdata['plan_name']=$row->plan_name;
                $userdata['extraCourseStatus']=$row->extraCourseStatus;
                $userdata['approve']=$row->approve;
                $userdata['active']=$row->active;
            
                $this->session->set_userdata($userdata);
                
                if($this->session->userdata('role_id')=='1')
                {
                    $this->session->set_flashdata('flashError', 'Admin is not allowed');
                    redirect('welcome');
                }

                if($this->session->userdata('role_id')=='2')
                {
                    if(($row->verify_email)=='0')
                    {
                        $this->session->set_flashdata('flashError', 'Please verify email.!!!');
                        redirect('user_controller/login');
                    }
                    if(is_null($row->last_accessed_time))
                    {  
                        $this->session->set_userdata($userdata);
                        redirect('user_controller/school_info');
                    }
                    elseif(($row->status)=='0')
                    {
                        redirect('subscription/subscribe/'.$userdata['id']);
                    }
                    elseif(($row->approve)=='0')
                    {
                        $this->session->set_flashdata('flashError', 'Your Profile is not approved by admin.. please contact admin.!!!');
                        redirect('user_controller/login');
                    }
                    elseif(($row->active)=='1')
                    {
                        $this->session->set_flashdata('flashError', 'Your Profile is not active please contact admin.!!!');
                        redirect('user_controller/login');
                    }
                    else
                    {
                    	$this->session->set_userdata($userdata);
                        $this->session->set_flashdata('flashSuccess', 'Login Successful.');
                        redirect('main_controller/UploadTest/uploadTest');
                    }
                }
            }
        
        else
        {
            $this->session->set_flashdata('flashError', 'Username and/or Password incorrect.Try again.!!!');
            $this->load->view('auth/login');
        }
    }

    public function uploadTest()
	{
		$data['eduData'] = $this->profile->fetcheducationData($this->session->userdata('id'));
		$data['userData'] = $this->profile->fetchStudentData($this->session->userdata('id'));
        $data['grade']=$this->mm->grade_list();
		// $data['main_content']='main/upload_answer_sheet';
		$this->load->view('main/upload_answer_sheet', $data);
	}

	public function submitTestPapers()
	{   

        $config['upload_path'] = './uploads/files/'; //path folder
        $config['allowed_types'] = 'doc|docx|pdf'; //Allowing types
        $config['encrypt_name'] = False; //encrypt file name 
 
        $this->upload->initialize($config);
        if(!empty($_FILES['download_file']['name'])){
 
            if ($this->upload->do_upload('download_file')){
 
                $data   = $this->upload->data();
                $image  = $data['file_name']; //get file name
                $this->mm->uploadTestPapers($image);
                redirect('main_controller/UploadTest/testUploadSuccess');
 
            }else{
                echo "Upload failed. Image file must be gif|jpg|png|jpeg|bmp|pdf";
            }
                      
        }else{
            echo "Failed, Image file is empty.";
        } 
	}
	
	public function testUploadSuccess()
    {
        $this->load->view('main/testUploadSuccess');
    }
}