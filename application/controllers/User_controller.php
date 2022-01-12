<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->model('student_model/profile');
        $this->load->model('student_model/course_m');
    }

    public function register()
    {
        $this->load->view('auth/register_user');
    }

    public function login()
    {
        $data['expired']=$this->course_m->checkSubscription($this->session->userdata('id'));
        $this->load->view('auth/login',$data);
    }

    public function register_user()
    {

        $this->db->select('email');
        $this->db->from('tbl_users');
        $this->db->where('email', $this->input->post('email'));

        $result=$this->db->get()->result();

        if(!empty($result))
        {
            $this->session->set_flashdata('flashError', 'Email already exists.!!!. Please try again!!!');
            redirect('user_controller/register');
        }
        else
        {
            //get user inputs
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $contact = $this->input->post('contact');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $last_accessed_time=$this->input->post('last_accessed_time');
            $created_date= date("Y-m-d H:i:s");
            //generate student id
            $id = '123456789';
            $stdId = substr(str_shuffle($id), 0, 4);
            
            //generate simple random code
            $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = substr(str_shuffle($set), 0, 12);

            //insert user to users table and get id
            $user['firstname'] = $firstname;
            $user['lastname'] = $lastname;
            $user['contact'] = $contact;
            $user['email'] = $email;
            $user['password'] = $password;
            $user['stdId'] = $stdId;
            $user['role_id'] = 2;
            $user['code'] = $code;
            $user['verify_email'] = false;
            $user['last_accessed_time']=null;
            $user['created_date']=$created_date;

            $id = $this->user_model->insert($user);
    
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
            <p>Click below to verify your email and continue the registration process.</p>
            <h4><a href='".base_url()."user_controller/activate/".$id."/".$code."'>Click Here to Verify your Email</a></h4>
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
                $this->session->set_flashdata('flashSuccess', 'Registered Successfully.! Please check your mail for activation');
                redirect('user_controller/login');
            }
            else
            {
                $this->session->set_flashdata('flashError', 'Please try again!!!');
            }
        }
    }

    public function activate()
    {
        $id =  $this->uri->segment(3);
        $code = $this->uri->segment(4);

        //fetch user details
        $user = $this->user_model->getUser($id);

        //if code matches
        if($user['code'] == $code)
        {
            //update user active status
            $data['verify_email'] = true;
            $query = $this->user_model->activate($data, $id);

            if($query)
            {
                $this->session->set_flashdata('message', 'User activated successfully');
            }
            else
            {
                $this->session->set_flashdata('message', 'Something went wrong in activating account');
            }
        }
        else
        {
            $this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
        }
        redirect('user_controller/login');
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
        // $ceklogin=$this->user_model->checkSubscription($this->session->userdata('id'));

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
            // $userdata['plan_id']=$row->plan_id;
            $userdata['approve']=$row->approve;
            $userdata['active']=$row->active;
            
            $this->session->set_userdata($userdata);

            if($this->session->userdata('role_id')=='1')
            {
                // $this->session->set_userdata($userdata);
                $this->session->set_flashdata('flashSuccess', 'Login Successful.');
                redirect('admin_controller/admin_dashboard/index');
            }

            elseif($this->session->userdata('role_id')=='2')
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
                else{
                    $this->db->where('user_id',$this->session->userdata('id'));
                    $carts=$this->db->get('temp_cart')->row();
                    if(!empty($carts)){
                        $cartsdata=json_decode($carts->cart_details); 
                        foreach ($cartsdata as $key => $items) {
                            $data_items=array(
                                'id' => $items->id,
                                'name' => $items->name,
                                'price' => $items->price,
                                'qty' => $items->qty
                            );
                            // print_r($data_items);
                            // die();
                            $this->cart->insert($data_items);
                        } 
                    }

                    $login_time=date('Y-m-d H:i:s');
                    $user_id=$this->session->userdata('id');
                    $date = array(
                        'user_id' => $user_id,
                        'login_time'=>$login_time
                    );
                    $this->user_model->loginTime($date);
                    $this->session->set_userdata($userdata);
                    // $this->checkSubscription();
                    $this->session->set_flashdata('flashSuccess', 'Login Successful.');
                    redirect('student_controller/student_dashboard/index');
                }
            }
            // $this->user_model->checkSubscription($this->session->userdata('id'));
            // redirect('student_controller/student_dashboard/index');
        }
        else
        {
            $this->session->set_flashdata('flashError', 'Username and/or Password incorrect.Try again.!!!');
            $this->load->view('auth/login');
        }
    }

    public function is_active($id)
    {   
        $this->user_model->is_active($id);
    }
    
    public function forgotPassword()
    {
        $this->load->view('auth/forgotPassword');
    }

    public function resetlink()
    {
        $email=$this->input->post('email');
        $result=$this->db->query("SELECT * FROM tbl_users WHERE email='".$email."'")->result_array();
        if(count($result)>0)
        {
            $tokan= rand(1000,9999);

            $this->db->query("UPDATE tbl_users SET password='".$tokan."' WHERE email='".$email."'");

            $config['protocol']   = 'smtp';
            $config['smtp_host']  = 'ssl://smtp.gmail.com';
            $config['smtp_port']  = 465;
            $config['smtp_user']  = 'asma.arsc@gmail.com';
            $config['smtp_pass']  = 'asma.arsc@123';
            $config['charset']    = 'iso-8859-1';
            $config['newline']    = "\r\n";
            $config['mailtype']   = 'html';
            $config['validation'] = TRUE;

            $message="Please click  on password reset link <br><a href='".base_url()."user_controller/reset?tokan=".$tokan."'>Click Here to Verify your Email</a>" ;
            

            $this->load->library('email', $config);
            $this->email->from('asma.arsc@gmail.com','ARSC!');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Password Reset Link');
            $this->email->message($message);
            // $this->email->send();
            // echo "success";
            if($this->email->send())
            {
                $this->session->set_flashdata('flashSuccess', 'Email Sent Successfully.! Please check your mail to reset password');
                redirect('User_controller/login');
            }
            else
            {
                $this->session->set_flashdata('flashError', 'Please try again!!!');
            }
        }
        else
        {
            $this->session->set_flashdata('flashError', 'Email not registered with DHAJI!!!. Please try again!!!');
            redirect('user_controller/forgotPassword');
        }
    }

    public function reset()
    {
        $data['tokan'] = $this->input->get('tokan');
        $_SESSION['tokan']=$data['tokan'];
        $this->load->view('auth/resetpass',$data);
    }

    public function updatepass()
    {
        $_SESSION['tokan'];
        $data=$this->input->post();
        if($data['password']==$data['cpassword'])
        {
            $result=$this->db->query("UPDATE tbl_users SET password='".$data['password']."' WHERE password='".$_SESSION['tokan']."'");
            if($result)
            {
                $this->session->set_flashdata('flashSuccess', 'Updated Successfully.');
                redirect('user_controller/login');
            }
            else
            {
                $this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
                redirect('user_controller/updatepass');
            }
        }
    }

    public function school_info()
    {
        $data['grade']=$this->user_model->grade_list();
        $data['board']=$this->user_model->board_list();
        $data['state'] = $this->user_model->getState();
        $data['userData'] = $this->profile->fetchStudentData($this->session->userdata('id'));
        $this->load->view('auth/school_info',$data);
    }

    public function fetch_city()
    {
        if($this->input->post('state_id'))
        {
            echo $this->user_model->fetch_city($this->input->post('state_id'));
        }
    }

    public function save_school_info()
    {
        $result=$this->user_model->save_school_info();
        if($result)
        {
            $this->session->set_flashdata('flashSuccess', 'Submitted Successfully.');
            redirect('user_controller/login');
        }
        else
        {
            $this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
            redirect('user_controller/school_info');
        }
    }


}