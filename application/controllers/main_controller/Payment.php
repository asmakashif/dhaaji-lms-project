<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Payment extends CI_Controller 
{
    // construct
    public function __construct() 
    {
        parent::__construct();     
        $this->load->model('main_model','mm'); 
    }

    public function index($book_id) 
    { 
        $data['data_info']=$this->mm->fetchDatainfolastId($book_id);
        $this->load->view('main/billingAddress', $data);
    }

    public function saveEmail()
    {
        $result=$this->mm->saveEmail();
        if($result){
             $this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
             redirect('main_controller/payment/billingAddress');
        }else{
            $this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
             redirect('main_controller/payment/index');
        }
    }

    public function billingAddress($book_id)
    {
        $data['data_info']=$this->mm->fetchDatainfolastId($book_id);
        $this->load->view('main/billingAddress',$data);
    }

    public function saveBillingAddress()
    {
        $result=$this->mm->saveBillingAddress();
        if($result){
             $this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
             redirect('main_controller/payment/ConfirmbillingAddress');
        }else{
            $this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
             redirect('main_controller/payment/index');
        }
    }

    public function ConfirmbillingAddress()
    {
        $data['billing']=$this->mm->getBillingAddress();
        $this->load->view('main/ConfirmBillingAddress',$data);
    }


    public function checkout($stdid) 
    { 
        // $data['data_info']=$this->mm->fetchDatainfolastId($book_id);
        // $data['std_info']=$this->mm->getStudentInfo($stdid);
        $data['data_info']=$this->mm->getBillingData($stdid);
        $data['return_url'] = base_url().'razorpay/callback';
        $data['surl'] = base_url().'razorpay/success';
        $data['furl'] = base_url().'razorpay/failed';
        $data['currency_code'] = 'INR';
        $data['stdid']=$stdid;
        $this->load->view('main/checkout', $data);
    }
}
