<?php
class Student_management_m extends CI_Model
{

	//student management
    public function getStudentData()
    {
        $this->db->select('u.id,u.firstname,u.email,u.active,s.grade,s.school_name,s.school_address,s.board,s.curriculum,s.city,p.payment_date,p.exp_date');
        $this->db->from('tbl_users as u');
        $this->db->join('student_school_info as s','u.id=s.user_id', 'left');
        $this->db->join('payment_details as p','u.id=p.user_id', 'left');
        $this->db->where('approve',1);
        return $this->db->get()->result();
    }

    public function editStudentData($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('id',$id);
        $fetchdatabyid = $this->db->get()->result();
        return $fetchdatabyid;
    }

    public function is_active($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('tbl_users',array('active' =>0));
    }
     public function in_active($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('tbl_users',array('active' =>1));
    }

    public function getStudentApprovalData()
    {
        $this->db->select('u.id,u.firstname,u.plan_name,u.approve,u.status,s.grade,s.school_name,s.school_address,s.board,s.city');
        $this->db->from('tbl_users as u');
        $this->db->join('student_school_info as s','u.id=s.user_id', 'left');
        $this->db->where('deleteStudent',0);
        return $this->db->get()->result();
    }

    public function approve($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('tbl_users',array('approve' =>1));
    }

    // public function deleteStudent($id)
    // {   
    //     $this->db->where('id',$id);
    //     return $this->db->update('tbl_users',array('deleteStudent'=>1));
    // }

    public function deleteStudent($id)
    { 
        $delete = $this->db->delete('tbl_users', array('id' => $id)); 
        return $delete?true:false; 
    } 

    public function deleteStudentSchoolInfo($con)
    { 
        // Delete image data 
        $delete = $this->db->delete('student_school_info', $con); 
         
        // Return the status 
        return $delete?true:false; 
    }
}
