<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_management extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model/student_management_m','sm');
        $this->load->model('subscription_m');
        $this->load->model('Chart_model','chartmodel',true);
        $this->load->model('user_model');
    }

    public function activate_deactivate()
    {	
        $allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
        $data['student']=$this->sm->getStudentData();
        $data['main_content']='lms_admin/student_administration/activate_deactivate';
        $this->load->view('include1/template', $data);
    }

    public function is_active($id)
    {   
        $allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
        $result=$this->sm->is_active($id);
// $this->sendMail();
        $data['fetchdatabyid']=$this->sm->editStudentData($id);
        $data['main_content']='lms_admin/student_administration/activateStudent';
        $this->load->view('include1/template', $data);
    }

    public function sendMail()
    {
        //set up email
        $config['protocol']   = 'smtp';
        $config['smtp_host']  = 'ssl://smtp.gmail.com';
        $config['smtp_port']  = 465;
        $config['smtp_user']  = 'asma.arsc@gmail.com';
        $config['smtp_pass']  = 'asma.arsc@123';
        $config['charset']    = 'iso-8859-1';
        $config['newline']    = "\r\n";
        $config['mailtype']   = 'html';
        $config['validation'] = TRUE;

        $message =  "
        <html>
        <head>
        </head>
        <body>
        <h2>Your account is active... Now start learning at your own spaace!!!</h2>
        </body>
        </html>
        ";

        $this->load->library('email', $config);
        $this->email->from('asma.arsc@gmail.com','ARSC!');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Account Activation Successfull');
        $this->email->message($message);

//sending email
        if($this->email->send())
        {
            $this->session->set_flashdata('flashSuccess', 'Email Sent Successfully.!');
            redirect('/admin_controller/student_management/activate_deactivate');
        }
        else
        {
            $this->session->set_flashdata('flashError', 'Please try again!!!');
        }



    }
    public function in_active($id)
    {   
        $allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
        $result=$this->sm->in_active($id);
// $this->sendMail();
        $data['fetchdatabyid']=$this->sm->editStudentData($id);
        $data['main_content']='lms_admin/student_administration/deactivateStudent';
        $this->load->view('include1/template', $data);
    }

    public function in_activeMail()
    {
//set up email
        $config['protocol']   = 'smtp';
        $config['smtp_host']  = 'ssl://smtp.gmail.com';
        $config['smtp_port']  = 465;
        $config['smtp_user']  = 'asma.arsc@gmail.com';
        $config['smtp_pass']  = 'asma.arsc@123';
        $config['charset']    = 'iso-8859-1';
        $config['newline']    = "\r\n";
        $config['mailtype']   = 'html';
        $config['validation'] = TRUE;

        $message = "
        <html>
        <head>=
        </head>
        <body>
        <h2>Your account got deactivated... Please contact admin for further!!!</h2>
        </body>
        </html>
        ";

        $this->load->library('email', $config);
        $this->email->from('asma.arsc@gmail.com','ARSC!');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Account deactivated');
        $this->email->message($message);

//sending email
        if($this->email->send())
        {
            $this->session->set_flashdata('flashSuccess', 'Email Sent Successfully.!');
            redirect('/admin_controller/student_management/activate_deactivate');
        }
        else
        {
            $this->session->set_flashdata('flashError', 'Please try again!!!');
        }
    }

    public function add_approve()
    {	
        $allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
        $data['approve']=$this->sm->getStudentApprovalData();
        $data['main_content']='lms_admin/student_administration/add_approve';
        $this->load->view('include1/template', $data);
    }

    public function approve($id)
    {    
        $allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
        $result=$this->sm->approve($id);
        redirect('/admin_controller/student_management/add_approve'); 
    }

    public function addStudent()
    {
        $allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
        $data['subscribe']=$this->subscription_m->getSubscriptionData();
        $data['main_content']='lms_admin/student_administration/addStudent';
        $this->load->view('include1/template', $data);
    }

    // public function deleteStudent($id)
    // {
    //     $result=$this->sm->deleteStudent($id);
    //     if($result){
    //         $this->session->set_flashdata('flashSuccess', 'Deleted Successfully.');
    //         redirect('admin_controller/student_management/add_approve');
    //     }else{
    //         $this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
    //         redirect('admin_controller/student_management/add_approve');
    //     }
    // }

    public function deleteStudent($id)
    { 
        // Check whether id is not empty 
        if($id){ 
            // $galleryData = $this->mm->getRows($menu_id); 
             
            // Delete gallery data 
            $delete = $this->sm->deleteStudent($id); 
             
            if($delete){ 
                // Delete images data  
                $condition = array('user_id' => $id);  
                $deleteSchool = $this->sm->deleteStudentSchoolInfo($condition);
                //$deleteProduct = $this->mm->deleteProduct($condition);   
                 
                $this->session->set_userdata('success_msg', 'Deleted successfully.');
                redirect('admin_controller/student_management/add_approve'); 
            }
            else
            { 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
                redirect('admin_controller/student_management/add_approve');
            } 
        } 
    } 


    public function saveStudent()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last name', 'required');
        $this->form_validation->set_rules('contact', 'Contact', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

        $this->db->select('email');
        $this->db->from('tbl_users');
        $this->db->where('email', $this->input->post('email'));

        $result=$this->db->get()->result();

        if(!empty($result))
        {
            $this->session->set_flashdata('flashError', 'Email already exists.!!!. Please try again!!!');
            redirect('admin_controller/student_management/add_approve');
        }
        else
        {
            //get user inputs
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $contact = $this->input->post('contact');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $plan_name = $this->input->post('plan_name');
            $last_accessed_time=$this->input->post('last_accessed_time');
            $created_date= date("Y-m-d H:i:s");

            //generate simple random code
            $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = substr(str_shuffle($set), 0, 12);

            //insert user to users table and get id
            $user['firstname'] = $firstname;
            $user['lastname'] = $lastname;
            $user['contact'] = $contact;
            $user['email'] = $email;
            $user['password'] = $password;
            $user['plan_name'] = $plan_name;
            $user['role_id'] = 2;
            $user['code'] = $code;
            $user['verify_email'] = false;
            $user['last_accessed_time']=null;
            $user['status']=1;
            $user['extraCourseStatus']=1;
            $user['approve']=1;
            $user['created_date']=$created_date;

            $id = $this->user_model->insert($user);
            
            $user_id = $this->db->insert_id($id);
            $result = array('plan_name'=>$plan_name,'plan_amount'=>'free','user_id'=>$user_id,'status'=>1,'payment_date'=>date("Y-m-d H:i:s"),'exp_date'=>date('Y-m-d H:i:s', strtotime('+1 years')));
            $this->db->insert('payment_details', $result);

            //set up email
            $config['protocol']   = 'smtp';
            $config['smtp_host']  = 'ssl://smtp.gmail.com';
            $config['smtp_port']  = 465;
            $config['smtp_user']  = 'asma.arsc@gmail.com';
            $config['smtp_pass']  = 'asma.arsc@123';
            $config['charset']    = 'iso-8859-1';
            $config['newline']    = "\r\n";
            $config['mailtype']   = 'html';
            $config['validation'] = TRUE;

            $message =  "
            <html>
            <head>
            <title>Verification Code</title>
            </head>
            <body>
            <h2>Thank you for Registering.</h2>
            <p>Your Account:</p>
            <p>Email: ".$email."</p>
            <p>Password: ".$password."</p>
            <p>Please click the link below to activate your account.</p>
            <h4><a href='".base_url()."user_controller/activate/".$id."/".$code."'>Activate My Account</a></h4>
            </body>
            </html>
            ";
            
            $this->load->library('email', $config);
            $this->email->from('asma.arsc@gmail.com','ARSC!');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Signup Verification Email');
            $this->email->message($message);
            //sending email
            if($this->email->send())
            {
                $this->session->set_flashdata('flashSuccess', 'Student Added Successfully.!');
                redirect('admin_controller/student_management/add_approve');
            }
            else
            {
                $this->session->set_flashdata('flashError', 'Please try again!!!');
            }
        }
    }

}
