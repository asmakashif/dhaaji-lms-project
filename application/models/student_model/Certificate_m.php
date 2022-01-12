<?php
class Certificate_m extends CI_Model
{

    public function getStudentInfo()
    {
        $this->db->select('c.course_id,c.course_name');
        $this->db->from('course as c');
        return $this->db->get()->result();
    }

    public function fetchCourseData($course_id)
    {
        $this->db->select('*');//columns
        $this->db->from('course as c');//table name
        $this->db->join('student_activity as sa','sa.course_id=c.course_id');//table name
        $this->db->where('c.course_id', $course_id);
        $fetchdatabyid=$this->db->get()->result();
        return $fetchdatabyid;
    }
    
    public function checkingQj($course_id)
    {
        $user_id=$this->session->userdata('id');
        $this->db->where('course_id',$course_id);
        $res=$this->db->get('chapters')->num_rows();

        $this->db->where('course_id',$course_id);
        $res1=$this->db->get('student_activity')->num_rows();
        
        if($res==$res1){
            return 1;
        }
        else{
            return 0;
        }

    }

    // public function checkingQj($course_id)
    // {
    //     $user_id=$this->session->userdata('id');

    //     $this->db->where('course_id',$course_id);
    //     $res=$this->db->get('chapters')->num_rows();
    //     // print_r($data->course_id);die();

    //     $this->db->where('chapter_id',$chapters_id);
    //     $res=$this->db->get('sections')->num_rows();

    //     $this->db->where('chapter_id',$chapters_id);
    //     $this->db->where('user_id',$user_id);
    //     $res1=$this->db->get('video_path')->num_rows();
        
    //     if($res==$res1){

    //         return $this->db->insert('student_activity',array('user_id' => $user_id,'course_id' =>$data->course_id,'class_id' =>$data->class_id,'chapter_id' =>$chapters_id, 'course_status'=>1,'completed_date'=>date("Y-m-d H:i:s")));
    //     }
    //     else
    //     {
    //         return 0;
    //     }

    // }
}

?>