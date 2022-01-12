<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function fetchStudentData($userId)
    {
        $this->db->where('id', $userId);
        $query = $this->db->get('tbl_users');
        if($query->num_rows() > 0)
        {
            return  $query->row_array();
        }
        else
        {
            return false;
        }
    }

    public function fetcheducationData($user_id)
    {
        $this->db->select('s.school_name,s.school_address,s.board,s.curriculum,,s.medium,s.grade,s.state,s.city,s.pointofcontact');
        $this->db->from('student_school_info as s');
        // $this->db->join('class as c','c.id=s.grade');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return  $query->row_array();
        }
        else
        {
            return false;
        }
    }
}