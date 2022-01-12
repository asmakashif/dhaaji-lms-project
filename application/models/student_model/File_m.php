<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class File_m extends CI_Model
{
    public function getMockPapers()
    {
        $this->db->select('*');
        $this->db->from('mock_test_papers');
        $query=$this->db->get()->result();
        return $query;
    }

    public function getTestPapers($user_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_users as u');
        $this->db->join('test_upload as t','t.user_id=u.id');
        $this->db->where('t.user_id',$user_id);
        $query=$this->db->get()->result();
        return $query;
    }

    public function remove_downloaded($upload_file)
    {
        $this->db->where('upload_file',$upload_file);
        return $this->db->update('test_upload',array('active'=>1));

       // if(file_exists($upload_file)) // here is the problem
       //  {
       //    unlink($upload_file);
       //  }
    }
}