<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller
{
   function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Master_model');
		$this->load->model('Chart_model','chartmodel',true);
		$this->load->library('upload');
	}

	public function index()
	{
		$data = array('board_name' => $this->input->post('board'));
		$result=$this->Master_model->submitBoard($data);
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Submi Successfully.');
             redirect('admin_controller/admin_dashboard/setup_board');
		}else{
			$this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/setup_board');
		}
	}

	public function update()
	{
		$result=$this->Master_model->updateBoard();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Update Successfully.');
             redirect('admin_controller/admin_dashboard/setup_board');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/setup_board');
		}
	}

	public function deleteBoard()
	{
		$result=$this->Master_model->deleteBoard();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Delete Successfully.');
             redirect('admin_controller/admin_dashboard/setup_board');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/setup_board');
		}
	}

	//class setups
	public function classAdd()
	{
		$result=$this->Master_model->submitClass();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Submit Successfully.');
             redirect('admin_controller/admin_dashboard/setup_class');
		}else{
			$this->session->set_flashdata('flashError', 'Duplicate Enter Class Name !!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/setup_class');
		}
	}

	public function deleteClass()
	{
		$result=$this->Master_model->deleteClass();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Delete Successfully.');
             redirect('admin_controller/admin_dashboard/setup_class');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/setup_class');
		}
	}

	public function classByIdGetDetails()
	{
	    $cl_id=$this->input->post('c_id');
	    $result=$this->Master_model->GetListClassById($cl_id);
	    echo json_encode($result);
	}

	public function updateClass()
	{
		$result=$this->Master_model->updateClass();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Update Successfully.');
             redirect('admin_controller/admin_dashboard/setup_class');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong !!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/setup_class');
		}
	}

	public function getListBoardIdBy()
	{
		$board_id=$this->input->post('boardid');
		$this->db->select('class_name,id');
		$this->db->where('board_id',$board_id);
		$this->db->where('active',0);
		$result=$this->db->get('class')->result();
		echo json_encode($result);
	}

	public function featchLisBoardByClass()
	{
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$board_id=$this->input->post('board_idselect');
		$data['board']=$this->Master_model->GetListBoard();
		$data['class']=$this->Master_model->GetListClassByBoardId($board_id);
		$data['main_content']='lms_admin/course_setup/class/setup_class';
		$this->load->view('include1/template', $data);
	}

	//add subjects starts

	public function subjectAdd()
	{	
		$config['upload_path'] = './uploads/img/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //Allowing types
        $config['encrypt_name'] = False; //encrypt file name 
 
        $this->upload->initialize($config);
        if(!empty($_FILES['course_img']['name']))
        {
 
            if ($this->upload->do_upload('course_img'))
            {
                $data   = $this->upload->data();
                $file  = $data['file_name']; //get file name
                $result=$this->Master_model->submitSubject($file);
				if($result)
				{
					$this->session->set_flashdata('flashSuccess', 'Submit Successfully.');
		            redirect('admin_controller/admin_dashboard/setup_course');
				}
				else
				{
					$this->session->set_flashdata('flashError', 'Duplicate Enter subject Name !!!. Please try again!!!');
		            redirect('admin_controller/admin_dashboard/setup_course');
				} 
			}
			else
			{
                echo "Upload failed. Image file must be gif|jpg|png|jpeg|bmp|pdf";
            }
        } 
		else{
            echo "Failed, Image file is empty.";
        }   
	}


	public function deleteSubject()
	{
		$result=$this->Master_model->deleteSubject();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Delete Successfully.');
             redirect('admin_controller/admin_dashboard/setup_course');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/setup_course');
		}
	}

	public function subjectByIdGetDetails()
	{
		$this->db->select('c.class_name,c.id,b.board_name,b.board_id');
        $this->db->from('course as s');
        $this->db->join('class as c','s.class_id=c.id');
        $this->db->join('board as b','s.board_id=b.board_id');
        $this->db->where('s.course_id',$this->input->post('s_id'));
        $result=$this->db->get()->row();
        echo json_encode($result);

	}

	public function getClassBoardSubject()
	{
		$this->db->select('s.course_name,s.course_id,c.class_name,c.id,b.board_name,b.board_id,ch.chapters_name,ch.chapters_id');
        $this->db->from('chapters as ch');
        $this->db->join('class as c','ch.class_id=c.id');
        $this->db->join('board as b','ch.board_id=b.board_id');
        $this->db->join('course as s','ch.course_id=s.course_id');
        $this->db->where('ch.chapters_id',$this->input->post('s_id'));
        $result=$this->db->get()->row();
        echo json_encode($result);
	}

	public function updateSubject()
	{	
		$config['upload_path'] = './uploads/img/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //Allowing types
        $config['encrypt_name'] = False; //encrypt file name 
 
        $this->upload->initialize($config);
        if(!empty($_FILES['course_img']['name']))
        {
 
            if ($this->upload->do_upload('course_img'))
            {
                $data   = $this->upload->data();
                $file  = $data['file_name']; //get file name
			}
			else
			{
                echo "Upload failed. Image file must be gif|jpg|png|jpeg|bmp|pdf";
            }
        } 
		$result=$this->Master_model->updateSubject($file);
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Update Successfully.');
             redirect('admin_controller/admin_dashboard/setup_course');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong !!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/setup_course');
		}   
	}

	public function getListBoardClassSubject($value='')
	{
		$allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
		$board_id=$this->input->post('board_idselect');
    	$classid=$this->input->post('class');
		$data['board']=$this->Master_model->GetListBoard();
		$data['subjects']=$this->Master_model->getListBoardClassSubject($board_id,$classid);
		$data['main_content']='lms_admin/course_setup/courses/setup_course';
		$this->load->view('include1/template', $data);
	}

	//chapters starts
	public function getListClassByIdSubject()
	{
        $classid=$this->input->post('classid');
    	$result=$this->Master_model->fetachSubectsById($classid);
    	echo json_encode($result);
	}

	public function chaptersAdd()
	{	
		$config['upload_path'] = './uploads/files/'; //path folder
        $config['allowed_types'] = 'doc|docx|pdf'; //Allowing types
        $config['encrypt_name'] = False; //encrypt file name 
 
        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name']))
        {
 
            if ($this->upload->do_upload('filefoto'))
            {
                $data   = $this->upload->data();
                $file  = $data['file_name']; //get file name
			}
			else
			{
                echo "Upload failed. Image file must be gif|jpg|png|jpeg|bmp|pdf";
            }
        } 
        if(!empty($_FILES['course_material']['name']))
        {
        	if ($this->upload->do_upload('course_material'))
            {
 
                $data   = $this->upload->data();
                $course_material  = $data['file_name']; //get file name
			}
			else
			{
                echo "Upload failed. Image file must be gif|jpg|png|jpeg|bmp|pdf";
            }        
        }
        $result=$this->Master_model->submitChapters($file,$course_material);
		if($result)
		{
	 		$this->session->set_flashdata('flashSuccess', 'Submit Successfully.');
     		redirect('admin_controller/admin_dashboard/setup_chapters');
		}
		else
		{
			$this->session->set_flashdata('flashError', 'Duplicate Enter !!!. Please try again!!!');
     		redirect('admin_controller/admin_dashboard/setup_chapters');
		}   
	}

	public function deleteChapters()
	{
		$result=$this->Master_model->deleteChapters();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Delete Successfully.');
             redirect('admin_controller/admin_dashboard/setup_chapters');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/setup_chapters');
		}
	}

	public function updateSChapters()
	{
		$config['upload_path'] = './uploads/files/'; //path folder
        $config['allowed_types'] = 'doc|docx|pdf'; //Allowing types
        $config['encrypt_name'] = False; //encrypt file name 
 
        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name']))
        {
 
            if ($this->upload->do_upload('filefoto'))
            {
                $data   = $this->upload->data();
                $file  = $data['file_name']; //get file name
			}
			else
			{
                echo "Upload failed. Image file must be gif|jpg|png|jpeg|bmp|pdf";
            }
        } 
        if(!empty($_FILES['course_material']['name']))
        {
        	if ($this->upload->do_upload('course_material'))
            {
 
                $data   = $this->upload->data();
                $course_material  = $data['file_name']; //get file name
			}
			else
			{
                echo "Upload failed. Image file must be gif|jpg|png|jpeg|bmp|pdf";
            }        
        }
        $result=$this->Master_model->updateSChapters($file,$course_material);
		if($result)
		{
	 		$this->session->set_flashdata('flashSuccess', 'Submit Successfully.');
     		redirect('admin_controller/admin_dashboard/setup_chapters');
		}
		else
		{
			$this->session->set_flashdata('flashError', 'Duplicate Enter !!!. Please try again!!!');
     		redirect('admin_controller/admin_dashboard/setup_chapters');
		} 
	}

	public function getListBoardClassSubjectChapters()
	{
		$allstud = $this->chartmodel->getAllStudents();
		$data['studs']=$allstud;
		$courses=$this->chartmodel->getAllcourse();
		$data['crse']=$courses;
		$data['board']=$this->Master_model->GetListBoard();
		$data['chpaters']=$this->Master_model->getListBoardClassSubjectChapters();
		$data['main_content']='lms_admin/course_setup/setup_chapters';
		$this->load->view('include1/template', $data);
	}

	//section starts
    
    public function getClassBoardSubjectChapter()
	{
		$this->db->select('s.course_name,s.course_id,c.class_name,c.id,b.board_name,b.board_id,ch.chapters_name,ch.chapters_id,se.section_id,se.section_name,se.video_path');
		$this->db->from('sections as se');
        $this->db->join('chapters as ch','ch.chapters_id =se.chapter_id');
        $this->db->join('class as c','se.class_id=c.id');
        $this->db->join('board as b','se.board_id=b.board_id');
        $this->db->join('course as s','se.course_id=s.course_id');
        $this->db->where('se.section_id',$this->input->post('s_id'));
        $result=$this->db->get()->row();
        echo json_encode($result);
	}
	
	public function getListSubjectByIdChapter()
	{
        $courseid=$this->input->post('courseid');
    	$result=$this->Master_model->fetachChapterById($courseid);
    	echo json_encode($result);
	}

	public function sectionsAdd()
	{	
		$config['upload_path'] = './uploads/videos/'; //path folder
        $config['allowed_types'] = 'mp4|webm'; //Allowing types
        $config['encrypt_name'] = False; //encrypt file name 
 
        $this->upload->initialize($config);
        if(!empty($_FILES['video_path']['name'])){
 
            if ($this->upload->do_upload('video_path')){
 
                $data   = $this->upload->data();
                $file  = $data['file_name']; //get file name
                $result=$this->Master_model->submitSections($file);
				if($result)
				{
			 		$this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
             		redirect('admin_controller/admin_dashboard/setup_sections');
				}
				else
				{
					$this->session->set_flashdata('flashError', 'Duplicate Enter !!!. Please try again!!!');
             		redirect('admin_controller/admin_dashboard/setup_sections');
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

	public function updateCSections()
	{	
		$config['upload_path'] = './uploads/videos/'; //path folder
        $config['allowed_types'] = 'mp4|webm'; //Allowing types
        $config['encrypt_name'] = False; //encrypt file name 
 
        $this->upload->initialize($config);
        if(!empty($_FILES['file']['name'])){
 
            if ($this->upload->do_upload('file')){
 
                $data   = $this->upload->data();
                $file  = $data['file_name']; //get file name
                $result=$this->Master_model->updateCSections($file);
				if($result)
				{
			 		$this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
             		redirect('admin_controller/admin_dashboard/setup_sections');
				}
				else
				{
					$this->session->set_flashdata('flashError', 'Duplicate Enter !!!. Please try again!!!');
             		redirect('admin_controller/admin_dashboard/setup_sections');
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

	public function deleteSections()
	{
		$result=$this->Master_model->deleteSections();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Deleted Successfully.');
             redirect('admin_controller/admin_dashboard/setup_sections');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/setup_sections');
		}
	}

	public function getListBoardClassSubjectChaptersSections()
	{
		$allstud = $this->chartmodel->getAllStudents();
		$data['studs']=$allstud;
		$courses=$this->chartmodel->getAllcourse();
		$data['crse']=$courses;
		$data['board']=$this->Master_model->GetListBoard();
		$data['sections']=$this->Master_model->getListBoardClassSubjectChaptersSections();
		$data['main_content']='lms_admin/course_setup/setup_sections';
		$this->load->view('include1/template', $data);
	}

	//add fee setups
	public function submitFeeSetup()
	{
		$result=$this->Master_model->feeSubmitData();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Submit Successfully.');
             redirect('admin_controller/admin_dashboard/set_up_fees');
		}else{
			$this->session->set_flashdata('flashError', 'Duplicate Enter !!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/set_up_fees');
		}
	}
    public function updateFeeSetup()
    {
    	$result=$this->Master_model->updateFeeSetup();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Update Successfully.');
             redirect('admin_controller/admin_dashboard/set_up_fees');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong !!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/set_up_fees');
		}
    }
    public function deleteFeeSetup()
    {
    	$result=$this->Master_model->deleteFeeeSetup();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Delete Successfully.');
             redirect('admin_controller/admin_dashboard/set_up_fees');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/set_up_fees');
		}
    }
	public function getClassFeeEdit()
	{
		$this->db->select('c.class_name,c.id,b.board_name,b.board_id,f.fees,f.fee_id,f.duration,f.subject');
        $this->db->from('fee_structure as f');
        $this->db->join('class as c','f.class_id=c.id');
        $this->db->join('board as b','f.board_id=b.board_id');
        $this->db->where('f.fee_id',$this->input->post('s_id'));
        $result=$this->db->get()->row();
        echo json_encode($result);
	}

	public function getListBoardClassSubjectFeeSetup()
	{
	    $allstud = $this->chartmodel->getAllStudents();
		$data['studs']=$allstud;
		$courses=$this->chartmodel->getAllcourse();
		$data['crse']=$courses;
		$board_id=$this->input->post('board_idselect');
    	$classid=$this->input->post('class');
    	$subjet=$this->input->post('subject');
		$data['board']=$this->Master_model->GetListBoard();
		$data['result']=$this->Master_model->getListBoardClassSubjectFeeSetup($board_id,$classid,$subjet);
		$data['main_content']='lms_admin/fees/set_up_fees';
		$this->load->view('include1/template', $data);
	}

	//add book start
	public function bookAdd()
	{	
		$config['upload_path'] = './uploads/img/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //Allowing types
        $config['encrypt_name'] = False; //encrypt file name 
 
        $this->upload->initialize($config);
        if(!empty($_FILES['book_img']['name'])){
 
            if ($this->upload->do_upload('book_img')){
 
                $data   = $this->upload->data();
                $image  = $data['file_name']; //get file name
                $result=$this->Master_model->submitBook($image);
				if($result)
				{
			 		$this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
             		redirect('admin_controller/admin_dashboard/books');
				}
				else
				{
					$this->session->set_flashdata('flashError', 'Duplicate Enter !!!. Please try again!!!');
             		redirect('admin_controller/admin_dashboard/books');
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

	public function updateBook()
	{
		$result=$this->Master_model->updateBook();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Update Successfully.');
             redirect('admin_controller/admin_dashboard/books');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/books');
		}
	}

	// public function updateBook()
	// {	
	// 	$config['upload_path'] = './uploads/img/'; //path folder
 //        $config['allowed_types'] = 'jpg|png|jpeg'; //Allowing types
 //        $config['encrypt_name'] = False; //encrypt file name 
 
 //        $this->upload->initialize($config);
 //        if(!empty($_FILES['book_img']['name'])){
 
 //            if ($this->upload->do_upload('book_img')){
 
 //                $data   = $this->upload->data();
 //                $image  = $data['file_name']; //get file name
 //                $result=$this->Master_model->updateBook($image);
	// 			if($result)
	// 			{
	// 		 		$this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
 //             		redirect('admin_controller/admin_dashboard/books');
	// 			}
	// 			else
	// 			{
	// 				$this->session->set_flashdata('flashError', 'Duplicate Enter !!!. Please try again!!!');
 //             		redirect('admin_controller/admin_dashboard/books');
	// 			}
 //            }
 //            else
 //            {
 //                echo "Upload failed. Image file must be gif|jpg|png|jpeg|bmp|pdf";
 //            }
                      
 //        }
 //        else
 //        {
 //            echo "Failed, Image file is empty.";
 //        }  
	// }

	public function deleteBook()
	{
		$result=$this->Master_model->deleteBook();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Delete Successfully.');
             redirect('admin_controller/admin_dashboard/books');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/books');
		}
	}

	//message board
	public function submitNotice()
	{
		$result=$this->Master_model->submitNotice();

		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
             redirect('admin_controller/admin_dashboard/message_board');
		}else{
			$this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/message_board');
		}
	}

	//help center
	public function submitQuestions()
	{
		$result=$this->Master_model->submitQuestions();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
             redirect('admin_controller/admin_dashboard/help_center');
		}else{
			$this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/help_center');
		}
	}
	
}