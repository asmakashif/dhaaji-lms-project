<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Files extends CI_Controller 
{
    
    function __construct() 
    {
        parent::__construct();
        $this->load->model('student_model/file_m');
        $this->load->model('notifications_m');
        if(!$this->session->userdata('id'))
            redirect('user_controller/login');
    }
    
    public function index()
    {
        $data = array();
        
        //get files from database
        $data['notifications']=$this->notifications_m->get_notifications();
        $data['files'] = $this->file_m->getMockPapers();
        $data['test_papers'] = $this->file_m->getTestPapers($this->session->userdata('id'));
        
        //load the view
        $data['main_content']='lms_student/assessment';
        $this->load->view('include/template', $data);
    }


    public function download($id)
    {
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            //get file info from database
            //$fileInfo = $this->cm->getRows(array('chapters_id' => $chapters_id));
            //file path
             $this->db->select('title,file_name');
             $this->db->where('id',$id);
             $fileInfo=$this->db->get('mock_test_papers')->row();
            //starts by indrajeet
            $file = 'uploads/files/'.$fileInfo->file_name;
            //download file from directory
            force_download($file, NULL);
        }
    }

    public function downloadTestPapers($id)
    {
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            //get file info from database
            //$fileInfo = $this->cm->getRows(array('chapters_id' => $chapters_id));
            //file path
             $this->db->select('subject,upload_file');
             $this->db->where('id',$id);
             $fileInfo=$this->db->get('test_upload')->row();
        
            $file = 'uploads/files/'.$fileInfo->upload_file;
            //download file from directory
            force_download($file, NULL);
            // $this->file_m->remove_downloaded($upload_file);
        }
    }
}