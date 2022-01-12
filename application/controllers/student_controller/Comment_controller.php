<?php
class Comment_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('ajax_pagination'); 
        $this->load->model('student_model/profile');
		$this->load->model('student_model/comment');
		$this->load->model('notifications_m');
		$this->perPage =10; 
        if(!$this->session->userdata('id'))
            redirect('user_controller/login');
	}

	public function index()
	{
        $data['userData'] = $this->profile->fetchStudentData($this->session->userdata('id'));
		$data['notifications']=$this->notifications_m->get_notifications();
		$data['main_content']='lms_student/forum/add_comment';
		$this->load->view('include/template', $data);
	}

	public function add_comment()
	{
		$result=$data['add_comment']=$this->comment->save_comment();

        $this->load->model('Notifications_m', 'nm');
        $nd=[
                'NotificationContent'=> $this->session->userdata('email'). 'Asked a question',
                'NotificationRedirect'=>'/dhaji_lms/student_controller/comment_controller/fetch_comment/',
                //path to be passed inside site_url()
            ];
            $this->nm->addNotification($nd);

        if($result){
            $this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
            redirect('student_controller/comment_controller/fetch_comment');
        }else{
            $this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
            redirect('student_controller/comment_controller/fetch_comment');
        }	
	}

	public function fetch_comment()
    { 
        $data = array(); 

        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->comment->view_comments($conditions); 

        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['base_url']    = base_url('student_controller/comment_controller/ajaxPaginationData'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 

        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 

        // Get records 
        $conditions = array( 
            'limit' => $this->perPage 
        ); 
        $data['posts'] = $this->comment->view_comments($conditions); 

        // Load the list page view 
        $data['notifications']=$this->notifications_m->get_notifications();
        $data['main_content']='lms_student/forum/fetch_comments';
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
        $totalRec = $this->comment->view_comments($conditions); 

        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['base_url']    = base_url('student_controller/comment_controller/ajaxPaginationData'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 

        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 

        // Get records 
        $conditions['start'] = $offset; 
        $conditions['limit'] = $this->perPage; 
        unset($conditions['returnType']); 
        $data['posts'] = $this->comment->view_comments($conditions); 

        $this->load->view('lms_student/forum/ajax_data', $data); 
    }

    public function commentReply($comment_id)
    {
        $data['notifications']=$this->notifications_m->get_notifications();
        $data['userData'] = $this->profile->fetchStudentData($this->session->userdata('id'));
        $data['data_info']=$this->comment->fetchDatainfolastId($comment_id);
        $data['reply_data']=$this->comment->fetchReply($comment_id);
        $data['main_content']='lms_student/forum/commentReply';
        $this->load->view('include/template', $data);
    }

    public function saveCommentReply()
    {
        $insert_id=$this->comment->saveCommentReply();
        if(!empty($insert_id))
        {
            $this->session->set_flashdata('flashSuccess', 'Submited Successfully');
            $data['data_info']=$this->comment->fetchDatainfolastId($insert_id);
            redirect('student_controller/comment_controller/fetch_comment');
        }
        else
        {
            $this->session->set_flashdata('flashError', 'Something is wrong please try again.');
            redirect('student_controller/comment_controller/fetch_comment');
        }
    }
}