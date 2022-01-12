<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('notifications_m');
		$this->load->model('master_model');
		$this->load->model('admin_model/ResponseModel','rm');
		$this->load->model('admin_model/files_m','fm');
		$this->load->model('admin_model/toppers_corner_m','tcm');
		$this->load->model('Chart_model','chartmodel',true);
		$this->load->library('Ajax_pagination');
        $this->perPage = 3;
	}

	public function index()
	{	
		$data['fetchComment']=$this->rm->fetchSingleComment();
		$data['notifications']=$this->notifications_m->get_notifications();
		$courses=$this->chartmodel->getAllcourse();
		$allstud = $this->chartmodel->getAllStudents();
		$class=$this->chartmodel->getClass();
		$coursename=array();
		foreach($courses as $crse){
			array_push($coursename,$crse->course_name);
		}		
		
		$data['main_content']='include1/main_content';
		$data['courses']= json_encode($coursename,true);
		$data['crse']=$courses;
		$data['studs']=$allstud;
		$data['class']=$class;
		$this->load->view('include1/template', $data);
	}
	
	public function getScorebyclassid(){
		$studs = $this->chartmodel->getAllStudents();	
		$crse=$this->chartmodel->getAllcourse();	
		$alliqchart =[];
		foreach($studs as $s)
    {   $p=array();
        $colr =$this->chartmodel->randomcolor();
    foreach($crse as $c){
        $pointsrow =$this->chartmodel->getstudentPointsbyclassid($s->id,$this->input->post('classid'),$c->course_id);
        $point=isset($pointsrow->point) ? $pointsrow->point : 0;
        array_push($p,$point);        
    } 
   
       $res =array(
            'label'=> "Name :". $s->firstname." Id: " .$s->id ." Score ", 
            'data'=>$p,
            "fill"=>true,
            "backgroundColor"=>"rgb(".$colr.")",
            "borderColor"=>"rgb(".$colr.")",
            "pointBackgroundColor"=>"rgb(".$colr.")",
            "pointBorderColor"=>"#fff",
            "pointHoverBackgroundColor"=>"#fff",
            "pointHoverBorderColor"=>"rgb(".$colr.")"         
        );
        $alliqchart[]=$res;
		}
		echo	json_encode($alliqchart);
	}


	public function setup_board()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['board']=$this->master_model->GetListBoard();
		$data['main_content']='lms_admin/course_setup/setup_board';
		$this->load->view('include1/template', $data);
	}

	public function setup_class()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['board']=$this->master_model->GetListBoard();
		$data['class']=$this->master_model->GetListClass();
		$data['main_content']='lms_admin/course_setup/setup_class';
		$this->load->view('include1/template', $data);
	}

    public function setup_course()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['board']=$this->master_model->GetListBoard();
		$data['subjects']=$this->master_model->GetListSubjects();
		$data['main_content']='lms_admin/course_setup/setup_course';
		$this->load->view('include1/template', $data);
	}

	public function setup_chapters()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['board']=$this->master_model->GetListBoard();
		$data['chpaters']=$this->master_model->GetListChapters();
		$data['main_content']='lms_admin/course_setup/setup_chapters';
		$this->load->view('include1/template', $data);
	}

	public function setup_sections()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['board']=$this->master_model->GetListBoard();
		$data['sections']=$this->master_model->GetListSections();
		$data['main_content']='lms_admin/course_setup/setup_sections';
		$this->load->view('include1/template', $data);
	}

	public function books()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['books']=$this->master_model->GetListBooks();
		$data['main_content']='lms_admin/books_store/books/index';
		$this->load->view('include1/template', $data);
	}

	public function current_orders()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['orders']=$this->master_model->getOrderDetails();
		$data['main_content']='lms_admin/books_store/current_orders/index';
		$this->load->view('include1/template', $data);
	}

	public function editOrderDetails($id)
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['fetchdatabyid']=$this->master_model->editOrderDetails($id);
		$data['main_content']='lms_admin/books_store/current_orders/updateCurrentOrders';
		$this->load->view('include1/template', $data);
	}

  	public function updateOrderDetails($updateid)
	{

		$result=$this->master_model->updateOrderDetails($updateid);
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Update Successfully.');
             redirect('admin_controller/admin_dashboard/current_orders');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/current_orders');
		}
	}


	public function set_up_fees()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['board']=$this->master_model->GetListBoard();
		$data['result']=$this->master_model->listAllFee();
		$data['main_content']='lms_admin/fees/set_up_fees';
		$this->load->view('include1/template', $data);
	}

	public function collect_fees()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['fees']=$this->master_model->getFeesData();
		$data['main_content']='lms_admin/fees/collect_fees';
		$this->load->view('include1/template', $data);
	}

	public function issue_refund()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['refund']=$this->master_model->getRefundDetails();
		$data['main_content']='lms_admin/fees/issue_refund';
		$this->load->view('include1/template', $data);
	}

	public function review_activity()
	{	
		$courses=$this->chartmodel->getAllcourse();
		$coursename=array();
		foreach($courses as $crse){
			array_push($coursename,$crse->course_name);
		}
		$data=array(
			'courses' => json_encode($coursename,true)
		);
		$this->load->view('lms_admin/student_administration/review_activity',$data);
	}

	public function getWeekchart($id)
	{
		$weekchart =[];
		$weekdata=$this->chartmodel->getTimespentbystudents($id);
		$dayarray=array_fill(0,7,0);
		if(isset($weekdata)){
			$time=array(); 
			foreach($weekdata as $w){
				 $time[$w->day]=$w->minute;               
			}            
			 $newarray=array_replace($dayarray,$time);
		} 
		return $newarray;
	}

	public function getPoints()
	{
		$courses=$this->chartmodel->getAllcourse();
		$pointsarr =array(); 
		foreach($courses as $crse){
			$res=$this->db->select('course.course_name')->from('student_activity')
			->join('course','course.course_id=student_activity.course_id')
			->where('student_activity.course_status',1)
			->where('student_activity.user_id',$this->input->post('sid'))
			->where('student_activity.course_id',$crse->course_id)
			->get()->result();
			$points =0;
			foreach($res as $r){
				if($r->course_name == $crse->course_name){
					$points =$points + 1;
				}else{
					$points=0;
				}
			}
			array_push($pointsarr,$points);
		}
	echo json_encode(array("pd"=>$pointsarr,"wd"=>$this->getWeekchart($this->input->post('sid'))));
	}

	public function timeSpent()
    {
        $time=$this->gm->timeSpent();
        echo json_encode($time, JSON_NUMERIC_CHECK);die(); 
    }
	
	public function student_information()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['student_info']=$this->master_model->getStudentInfo();
		$data['main_content']='lms_admin/student_administration/student_information';
		$this->load->view('include1/template', $data);
	}

	public function help_center()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['main_content']='lms_admin/help_center';
		$this->load->view('include1/template', $data);
	}

	public function message_board()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['main_content']='lms_admin/student_administration/message_board';
		$this->load->view('include1/template', $data);
	}

	public function upload_videos()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['video']=$this->tcm->GetListVideos();
		$data['main_content']='lms_admin/toppers_corner/upload_videos';
		$this->load->view('include1/template', $data);
	}

	public function answer_copy()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['answer']=$this->tcm->GetListAnswerCopy();
		$data['main_content']='lms_admin/toppers_corner/answer_copy';
		$this->load->view('include1/template', $data);
	}

	public function toppers_picture()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['main_content']='lms_admin/toppers_corner/toppers_picture';
		$this->load->view('include1/template', $data);
	}
	
	public function GalleryImages()
	{	
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$data['main_content']='lms_admin/toppers_corner/galleryImages';
		$this->load->view('include1/template', $data);
	}
}