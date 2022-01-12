<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Razorpay extends CI_Controller {
      // construct
     public function __construct() {
        parent::__construct();      
        $this->load->model('main_model','mm');
        $this->load->model('student_model/payment_model');
        $this->load->model('student_model/profile');
        $this->load->model('student_model/course_m');
        $this->load->model('user_model');
    }
    // index page
    public function index() {
        $data['title'] = 'Razorpay | TechArise';  
       // $data['productInfo'] = $this->site->getProduct();           
        $this->load->view('razorpay/index', $data);
    }
    // checkout page
    public function checkout($plan_id,$stdid) 
    { 
        $data['data_info']=$this->payment_model->fetchDatainfolastId($plan_id);
        $data['std_info']=$this->user_model->getStudentInfo($stdid);
        $data['return_url'] = base_url().'razorpay/callback';
        $data['surl'] = base_url().'razorpay/success';
        $data['furl'] = base_url().'razorpay/failed';
        $data['currency_code'] = 'INR';
        $data['stdid']=$stdid;
        $this->load->view('razorpay/checkout', $data);
    }
    

    public function courseCheckout($course_id) 
    { 
        $data['data_info']=$this->course_m->fetchDatainfolastId($course_id);
        $data['userData'] = $this->profile->fetchStudentData($this->session->userdata('id'));
        $data['return_url'] = base_url().'razorpay/callback';
        $data['surl'] = base_url().'razorpay/success';
        $data['furl'] = base_url().'razorpay/failed';
        $data['currency_code'] = 'INR';
        $data['main_content']='razorpay/courseCheckout';
        $this->load->view('include/template', $data);
    }
    
 
    // initialized cURL Request
    private function get_curl_handle($payment_id, $amount)  {
        $url = 'https://api.razorpay.com/v1/payments/'.$payment_id.'/capture';
        $key_id = 'rzp_live_44FYsLTZuEDNHn';
        $key_secret = 'LxSPSBi2PtODhmIEHiOqoCNu';
        $fields_string = "amount=$amount";

        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id.':'.$key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        //curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__).'/ca-bundle.crt');
        return $ch;
    }   
        
    // callback method
    public function callback() {        
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {                
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
               //echo curl_error($ch);die();
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                        //Check success response
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;
                        } else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                //close connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }
            if ($success === true) {
                $txn_id=$response_array['notes']['soolegal_order_id'];
                $user_id=$response_array['notes']['stdudent_id'];
                $plan_amount=$response_array['notes']['amount'];
                $plan_name=$response_array['notes']['plan_name'];
                $payment_date=$response_array['notes']['payment_date'];
                $exp_date=$response_array['notes']['exp_date'];
                $insert_card_info=array
                (
                    'txn_id'=>$txn_id,
                    'plan_amount'=>$plan_amount,
                    'plan_name'=>$plan_name,
                    'user_id' => $user_id,
                    'status' => 1,
                    'Payment_Id'=>$razorpay_payment_id,
                    'payment_date'=>$payment_date,
                    'exp_date'=>$exp_date,
                );
                $insert_success=$this->db->insert('payment_details',$insert_card_info);
                if($insert_success)
                {
                    $this->db->where('id',$user_id);
                    $this->db->update('tbl_users',array('status' =>1,'plan_name'=>$plan_name));
                }

            redirect('razorpay/success');
 
            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    } 
    public function success() 
    {
        $this->load->view('razorpay/success_msg');
    }  
    public function failed() 
    {
       $this->load->view('razorpay/error_msg');
    } 

    public function Coursecallback() {        
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {                
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
               //echo curl_error($ch);die();
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                        //Check success response
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;
                        } else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                //close connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }
            if ($success === true) {
                $txn_id=$response_array['notes']['soolegal_order_id'];
                $payment_date=$response_array['notes']['payment_date'];
                $exp_date=$response_array['notes']['exp_date'];
                $user_id=$response_array['notes']['stdudent_id'];
                $price=$response_array['notes']['price'];
                $course_name=$response_array['notes']['course_name'];

                $insert_course_info=array
                (
                    'course_name'=>$course_name,
                    'price'=>$price,
                    'user_id' => $user_id,
                    'txn_id'=>$txn_id,
                    'Payment_Id'=>$razorpay_payment_id,
                    'payment_date'=>$payment_date,
                    'exp_date'=>$exp_date,
                    'status' => 1
                );
                $insert_success=$this->db->insert('extraCourseCheckout',$insert_course_info);
                if($insert_success)
                {
                    $this->db->where('id',$user_id);
                    $this->db->update('tbl_users',array('extraCourseStatus' =>1));
                }

            redirect('razorpay/Checkoutsuccess');
 
            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    } 

    public function Checkoutsuccess() 
    {
        $data['main_content']='razorpay/Checkoutsuccess';
        $this->load->view('include/template', $data);
    }  
    public function Checkoutfailed() 
    {
       $this->load->view('razorpay/error_msg');
    } 

    public function bookscallback() {        
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {                
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
               //echo curl_error($ch);die();
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                        //Check success response
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;
                        } else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                //close connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }
            if ($success === true) {
                $txn_id=$response_array['notes']['soolegal_order_id'];
                $stdid=$response_array['notes']['stdudent_id'];
               
                $this->db->where('id',$stdid);
                $this->db->update('books_order_details',array('txn_id'=>$txn_id,'Payment_Id'=>$razorpay_payment_id,'status'=>'Pending'));

            redirect('razorpay/success');
 
            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    } 
}
?>