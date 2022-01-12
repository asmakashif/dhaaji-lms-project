<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toppers_corner extends CI_Controller
{
   function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin_model/toppers_corner_m','tcm');
		$this->load->library('upload');
	}

	public function index()
    {
        $file_name=$this->input->post('file_name');
        $video_link=$this->input->post('video_link');
        $this->db->where('file_name',$file_name);
        $this->db->where('video_link',$video_link);
        $result=$this->db->get('toppers_videos')->row();
        if(empty($result))
        {
            $result=$this->db->insert('toppers_videos',array('user_id' =>1,'file_name' =>$file_name, 'video_link'=>$video_link));
            if($result)
            {
                 $this->session->set_flashdata('flashSuccess', 'Submit Successfully.');
                 redirect('admin_controller/admin_dashboard/upload_videos');
            }else{
                $this->session->set_flashdata('flashError', 'Duplicate Enter Class Name !!!. Please try again!!!');
                 redirect('admin_controller/admin_dashboard/upload_videos');
            }
        }
        else
        {   
            $this->db->where('user_id',1);
            $res=$this->db->delete('toppers_videos');
            if($res)
            {
                $result=$this->db->insert('toppers_videos',array('user_id' =>1,'file_name' =>$file_name, 'video_link'=>$video_link));
                if($result)
                {
                     $this->session->set_flashdata('flashSuccess', 'Submit Successfully.');
                     redirect('admin_controller/examination/strategy');
                }else{
                    $this->session->set_flashdata('flashError', 'Duplicate Enter Class Name !!!. Please try again!!!');
                     redirect('admin_controller/examination/strategy');
                }
            }
        }
    }

	public function update()
	{
		$result=$this->tcm->updateVideo();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Updated Successfully.');
             redirect('admin_controller/admin_dashboard/upload_videos');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/upload_videos');
		}
	}


	public function deleteVideo()
	{
		$result=$this->tcm->deleteVideo();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Deleted Successfully.');
             redirect('admin_controller/admin_dashboard/upload_videos');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/upload_videos');
		}
	}

	public function submitPicture()
	{
	  $this->load->library('upload');
	  $image = array();
	  $ImageCount = count($_FILES['toppers_img']['name']);
        for($i = 0; $i < $ImageCount; $i++)
        {
            $_FILES['file']['name']       = $_FILES['toppers_img']['name'][$i];
            $_FILES['file']['type']       = $_FILES['toppers_img']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['toppers_img']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['toppers_img']['error'][$i];
            $_FILES['file']['size']       = $_FILES['toppers_img']['size'][$i];

            // File upload configuration
            $uploadPath = './uploads/img/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $imageData = $this->upload->data();
                 $uploadImgData[$i]['toppers_img'] = $imageData['file_name'];

            }
        }
        if(!empty($uploadImgData))
        {
            // Insert files data into the database
            $result=$this->tcm->submitPicture($uploadImgData);
            if($result)
            {
            	$this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
             	redirect('admin_controller/admin_dashboard/toppers_picture');
			}
			else
			{
				$this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
             	redirect('admin_controller/admin_dashboard/toppers_picture');
			}             
        }
  	}

	//answer copy
	public function answerScriptAdd()
	{
        $config['upload_path'] = './uploads/files/'; //path folder
        $config['allowed_types'] = 'doc|docx|pdf'; //Allowing types
        $config['encrypt_name'] = False; //encrypt file name 
 
        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
 
            if ($this->upload->do_upload('filefoto')){
 
                $data   = $this->upload->data();
                $image  = $data['file_name']; //get file name
                $student_name  = $this->input->post('student_name');
                $result=$this->tcm->answerScriptAdd($student_name,$image);
                if($result)
                {
                    $this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
                    redirect('admin_controller/admin_dashboard/answer_copy');
                }
                else
                {
                    $this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
                    redirect('admin_controller/admin_dashboard/answer_copy');
                }  
 
            }else{
                echo "Upload failed. Image file must be gif|jpg|png|jpeg|bmp|pdf";
            }
                      
        }else{
            echo "Failed, Image file is empty.";
        }         
    }

	public function getlist()
	{
		$this->db->select('*');
        $this->db->from('answer_script');
        $this->db->where('id',$this->input->post('s_id'));
        $result=$this->db->get()->row();
        echo json_encode($result);
	}

	public function deleteAnswerScript()
	{
		$result=$this->tcm->deleteAnswerScript();
		if($result){
			 $this->session->set_flashdata('flashSuccess', 'Deleted Successfully.');
             redirect('admin_controller/admin_dashboard/answer_copy');
		}else{
			$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
             redirect('admin_controller/admin_dashboard/answer_copy');
		}
	}
	
    public function submitGalleryImages()
	{
	  $this->load->library('upload');
	  $image = array();
	  $ImageCount = count($_FILES['gallery_img']['name']);
        for($i = 0; $i < $ImageCount; $i++)
        {
            $_FILES['file']['name']       = $_FILES['gallery_img']['name'][$i];
            $_FILES['file']['type']       = $_FILES['gallery_img']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['gallery_img']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['gallery_img']['error'][$i];
            $_FILES['file']['size']       = $_FILES['gallery_img']['size'][$i];

            // File upload configuration
            // $uploadPath = './assets/gallery/';
            $uploadPath = './uploads/personal/myself';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $imageData = $this->upload->data();
                 $uploadImgData[$i]['gallery_img'] = $imageData['file_name'];

            }
        }
        if(!empty($uploadImgData))
        {
            // Insert files data into the database
            $result=$this->tcm->submitGalleryImages($uploadImgData);
            if($result)
            {
            	$this->session->set_flashdata('flashSuccess', 'Submited Successfully.');
             	redirect('admin_controller/admin_dashboard/GalleryImages');
			}
			else
			{
				$this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
             	redirect('admin_controller/admin_dashboard/GalleryImages');
			}             
        }
  	}
}