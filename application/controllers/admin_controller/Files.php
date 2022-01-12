<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Files extends CI_Controller 
{
    
    function __construct() 
    {
        parent::__construct();
        $this->load->model('admin_model/files_m');
        $this->load->model('user_model');
        $this->load->model('admin_model/examination_m','em');
        $this->load->model('Chart_model','chartmodel',true);
        $this->load->library('upload');
    }
    
    public function index()
    {
        $data = array();
        $allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
        //get files from database
        $class=$this->input->post('grade');
        $data['grade']=$this->user_model->grade_list();
        $data['records']=$this->files_m->getRecords($class);
        //load the view
        $data['main_content']='lms_admin/evaluation/review_answer';
        $this->load->view('include1/template', $data);
    }
    
    public function download($id)
    {
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
             $this->db->select('download_file');
             $this->db->where('id',$id);
             $fileInfo=$this->db->get('test_upload')->row();
            $file = 'uploads/files/'.$fileInfo->download_file;
            //download file from directory
            force_download($file, NULL);
        }
    }

    public function edit_test_sheet($editid)
    {
        $allstud = $this->chartmodel->getAllStudents();
        $data['studs']=$allstud;
        $courses=$this->chartmodel->getAllcourse();
        $data['crse']=$courses;
        $data['fetchdatabyid']=$this->files_m->edit_test_sheet($editid);
        $data['main_content']='lms_admin/evaluation/upload_reviewed_paper';
        $this->load->view('include1/template', $data);
    }

    public function upload_test_sheet($updateid)
    {   
        $config['upload_path'] = './uploads/files/'; //path folder
        $config['allowed_types'] = 'doc|docx|pdf'; //Allowing types
        $config['encrypt_name'] = False; //encrypt file name 
 
        $this->upload->initialize($config);
        if(!empty($_FILES['upload_file']['name']))
        {
            if ($this->upload->do_upload('upload_file'))
            {
                $data   = $this->upload->data();
                $image  = $data['file_name']; //get file name
                $result=$this->files_m->upload_test_sheet($updateid,$image);
                if($result)
                {
                    $this->session->set_flashdata('flashSuccess', 'Submitted Successfully.');
                    redirect('admin_controller/files/index');
                }
                else
                {
                    $this->session->set_flashdata('flashError', 'Duplicate Enter Board !!!. Please try again!!!');
                    redirect('admin_controller/files/index');
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

        $this->load->model('Notifications_m', 'nm');
        $nd=[
                'NotificationContent'=>$this->session->firstname.' Reviewed Answer papers uploaded',
                'NotificationRedirect'=>'/dhaji(09-01-20)/student_controller/files/index' //path to be passed inside site_url()
            ];
            $this->nm->addNotification($nd);

        
    }
}