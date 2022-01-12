<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_model','mm');
		$this->load->model('user_model');
		$this->load->model('admin_model/examination_m','em');
	}
	public function index()
    {

        $this->load->view('main/bookOrderDetails');
    }

	public function about()
	{	
		$data['main_content']='main/about';
		$this->load->view('include_1/template', $data);
	}

	public function faculty()
	{	
		$data['main_content']='main/faculty';
		$this->load->view('include_1/template', $data);
	}

   public function infrastructure()
	{	
		$data['main_content']='main/infrastructure';
		$this->load->view('include_1/template', $data);
	}

	public function upload_answer_sheet()
	{	
		$data['main_content']='main/uploadAnswerSheet';
		$this->load->view('include_1/template', $data);
	}

	  public function course()
	{	
		$data['main_content']='main/course';
		$this->load->view('include_1/template', $data);
	}

	 public function fees()
	{	
		$data['fees'] = $this->mm->viewFees();
		$data['main_content']='main/fees';
		$this->load->view('include_1/template', $data);
	}

	public function gallery()
	{	
	    $data['img']=$this->mm->GetGalleryImages();
		$data['main_content']='main/gallery';
		$this->load->view('include_1/template', $data);
	} 

	public function notification()
	{	
		$data['notice']=$this->mm->GetNotice();
		$data['main_content']='main/notification';
		$this->load->view('include_1/template', $data);
	}  

    public function books()
	{	
		$data['books'] = $this->mm->viewBooklist();
		$data['main_content']='main/viewBooks';
		$this->load->view('include_1/template', $data);
	}

	public function checkout($book_id)
	{	
		$data['data_info']=$this->mm->fetchDatainfolastId($book_id);
		$this->load->view('main/checkout', $data);
	}

	public function submitBillingAddress()
	{	
		$result=$this->mm->submitBillingAddress();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
             redirect('admin_controller/admin_dashboard/setup_board');
		}else{
			$this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/setup_board');
		}
	}

	 public function contact()
	{	
		$data['main_content']='main/contact';
		$this->load->view('include_1/template', $data);
	}

	public function workip()
	{	
		$data['main_content']='main/workip';
		$this->load->view('include_1/template', $data);
	}

	public function toppers()
	{	
		$data['picture']=$this->mm->GetToppersPicture();
		$data['anscopy']=$this->mm->GetToppersCopy();
		$data['video']=$this->mm->GetListVideos();
		$data['main_content']='main/toppers';
		$this->load->view('include_1/template', $data);
	}
	
	public function examination()
	{	
	    $grade=$this->input->post('grade');
		$course=$this->input->post('course');
		$year=$this->input->post('year');
		$data['grade']=$this->mm->grade_list();
		$data['course']=$this->em->courseList();
		$data['year']=$this->em->viewYear();
		$data['exam']=$this->em->viewQP();
		$data['records']=$this->mm->getRecords($grade,$course,$year);
		$data['main_content']='main/examination';
		$this->load->view('include_1/template', $data);
	}

	public function getRecords()
	{
		$grade=$this->input->post('grade');
		$course=$this->input->post('course');
		$year=$this->input->post('year');
		$data['grade']=$this->user_model->grade_list();
		$data['course']=$this->em->courseList();
		$data['year']=$this->em->viewYear();
		$data['records']=$this->mm->getRecords($grade,$course,$year);
		$data['main_content']='main/examination';
		$this->load->view('include_1/template', $data);
	}

	public function download($id)
    {
        if(!empty($id))
        {
            $this->load->helper('download');
             $this->db->select('file');
             $this->db->where('id',$id);
             $fileInfo=$this->db->get('examination')->row();
            $file = 'uploads/QP/'.$fileInfo->file;
            force_download($file, NULL);
        }
    }

	public function strategy()
	{	
		$data['ans']=$this->mm->GetAnswerWritting();
		$data['sub']=$this->mm->GetSubjectwiseView();
		$data['toppersview']=$this->mm->GetToppersView();
		$data['main_content']='main/strategy';
		$this->load->view('include_1/template', $data);
	}
}