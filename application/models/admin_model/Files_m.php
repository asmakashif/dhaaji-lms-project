<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Files_m extends CI_Model
{

    public function edit_test_sheet($editid)
    {
        $this->db->select('*');//columns
        $this->db->from('test_upload');//table name
        $this->db->where('test_upload.id', $editid);
        $fetchdatabyid=$this->db->get()->result();
        return $fetchdatabyid;
    }

    public function upload_test_sheet($updateid,$image)
    {
        $firstname=$this->input->post('firstname'); 
        $class=$this->input->post('class'); 
        $subject=$this->input->post('subject');

        $upload_test=array
        (
            'firstname'=>$firstname,
            'class'=>$class,
            'subject'=>$subject,
            'uploaded'=>1,
            'upload_file'=>$image,
        );

        $this->db->where('id',$updateid);
        $update_success=$this->db->update('test_upload',$upload_test);
        return $update_success;
    }

    public function getRecords($class)
    {
        $this->db->select('tu.id,tu.user_id,tu.class,tu.firstname,tu.subject,tu.download_file,tu.upload_file');
        $this->db->from('test_upload as tu');
        $multipleWhere = ['tu.class'=>$class, 'uploaded' => 0];
        $this->db->where($multipleWhere);
        // $this->db->where('tu.class',$class);
        $query=$this->db->get();
        return $query->result();
    }
}