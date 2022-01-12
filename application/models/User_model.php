<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function insert($user)
    {
        $this->db->insert('tbl_users', $user);
        return $this->db->insert_id(); 
    }
    public function activate($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_users', $data);
    }

    public function getUser($id)
    {
        $query = $this->db->get_where('tbl_users',array('id'=>$id));
        return $query->row_array();
    }
    
    public function login($email,$pass)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('email',$email);
        $this->db->where('password',$pass);

        $query=$this->db->get();
        
        if($query->num_rows()==1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    public function loginTime($date)
    {
        $this->db->insert('time_spent', $date);
    }

    public function logout($user_id,$data)
    {
  
        $this->db->set($data);
        $this->db->where('id', $user_id);
        $this->db->update('time_spent',$data);
        if($this->db->affected_rows() > 0)
        {
        return true;
        }
    
        else
        {
        return false;
        }
    }


    public function save_school_info()
    {
        $school_name=$this->input->post('school_name');
        $school_address=$this->input->post('school_address');
        $grade=$this->input->post('grade');
        $curriculum=$this->input->post('curriculum');
        $medium=$this->input->post('medium');
        $state=$this->input->post('state');
        $city=$this->input->post('city');
        $board=$this->input->post('board');
        $user_id=$this->session->userdata('id');
        $last_accessed_time= date("Y-m-d H:i:s");
        $created_date= date("Y-m-d H:i:s");


        $school_info_insert=array
        (
            'school_name'=>$school_name,
            'school_address'=>$school_address,
            'grade'=>$grade,
            'curriculum'=>$curriculum,
            'medium'=>$medium,
            'state'=>$state,
            'city'=>$city,
            'board'=>$board,
            'user_id' => $user_id,
            'last_accessed_time' => $last_accessed_time,
            'created_date' => $created_date
        );
        $insert_success=$this->db->insert('student_school_info',$school_info_insert);
        if($insert_success)
        {
            $this->db->where('id',$user_id);
            $this->db->update('tbl_users',array('last_accessed_time' =>$last_accessed_time));
        }
        return $insert_success;
    }

    // public function state_list()
    // {
    //     $this->db->select('id,state');
    //     return $this->db->get('state')->result();
    // }

    // public function city_list()
    // {
    //     $this->db->select('city_id,city_name');
    //     return $this->db->get('city')->result();
    // }

    public function getState()
    {
        $this->db->order_by("state_id", "ASC");
        $query = $this->db->get("state");
        return $query->result();
    }

    public function fetch_city($state_id)
    {
        $this->db->where_in('state_id', $state_id);
        $this->db->order_by('city_name', 'ASC');
        $query = $this->db->get('city');
        $output = '<option value="">Select City</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
        }
        return $output;
    }

    public function board_list()
    {
        $this->db->select('board_id,board_name');
        return $this->db->get('board')->result();
    }

    public function grade_list()
    {
        $this->db->select('id,class_name');
        return $this->db->get('class')->result();
    }

    public function getStudentInfo($user_id)
    {
        $this->db->select('id,firstname,lastname,email,contact');
        $this->db->from('tbl_users');
        $this->db->where('id',$user_id);
        return $this->db->get()->row();
    }

    public function is_active($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('tbl_users',array('status' =>0));
    }
}