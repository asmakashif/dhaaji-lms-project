<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Search_course extends CI_Controller 
{ 
    function __construct() 
    { 
        parent::__construct(); 

        // Load pagination library 
        $this->load->library('ajax_pagination'); 
        $this->load->model('notifications_m');
        // Load post model 
        $this->load->model('student_model/search_model');

        // Per page limit 
        $this->perPage = 6; 
    } 

    public function index()
    { 

        $data = array(); 

        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->search_model->getRows($conditions); 

        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['base_url']    = base_url('student_controller/search_course/ajaxPaginationData'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 

        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 

        // Get records 
        $conditions = array( 
            'limit' => $this->perPage 
        ); 
        $data['posts'] = $this->search_model->getRows($conditions); 

        // Load the list page view 
        $data['notifications']=$this->notifications_m->get_notifications();
        $data['main_content']='lms_student/search_course/index';
        $this->load->view('include/template', $data);
    } 

    public function ajaxPaginationData()
    { 
        // Define offset 
        $page = $this->input->post('page'); 
        if(!$page){ 
            $offset = 0; 
        }else{ 
            $offset = $page; 
        } 

        // Set conditions for search and filter 
        $keywords = $this->input->post('keywords'); 
        $sortBy = $this->input->post('sortBy'); 
        if(!empty($keywords)){ 
            $conditions['search']['keywords'] = $keywords; 
        } 
        if(!empty($sortBy)){ 
            $conditions['search']['sortBy'] = $sortBy; 
        } 

        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->search_model->getRows($conditions); 

        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['base_url']    = base_url('student_controller/search_course/ajaxPaginationData'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 

        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 

        // Get records 
        $conditions['start'] = $offset; 
        $conditions['limit'] = $this->perPage; 
        unset($conditions['returnType']); 
        $data['posts'] = $this->search_model->getRows($conditions); 

        // Load the data list view 
        //$data['main_content']='lms_student/search_course/ajax-data';
        //$this->load->view('include/template', $data); 
        $data['notifications']=$this->notifications_m->get_notifications();
        $this->load->view('lms_student/search_course/ajax-data', $data); 
    }

    public function add_course()
    {
        $data['notifications']=$this->notifications_m->get_notifications();
        $data['main_content']='lms_student/search_course/add_course';
        $this->load->view('include/template', $data);
    } 

    public function save_course()
    {
        $data['save_course']=$this->search_model->add_course();
        $data['main_content']='lms_student/search_course/add_course';
        $this->load->view('include/template', $data);
    }
}