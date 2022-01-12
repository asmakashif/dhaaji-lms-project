<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Chart_model extends CI_Model
{
  public function getAllcourse(){
    return $this->db->select('*')->from('course')->where('class_id',2)->get()->result();     
  }
  public function getClass(){
    $this->db->select('id,class_name');
    $this->db->from('class');
    $multipleWhere = ['board_id!=' => 4, 'active' => 0];
    $this->db->where($multipleWhere);
    $this->db->order_by('class_name','asc');
    return $this->db->get()->result();
    // return $this->db->select('*')->from('class')->order_by('class_name','asc')->get()->result();     
  }
  
  public function getTimespentbystudents($id){
    $query= $this->db->query('SELECT sum(timestampdiff(minute,login_time,logout_time)) as "minute" ,DAYOFWEEK(login_time) as "day",tbl_users.firstname from time_spent
    JOIN tbl_users on tbl_users.id = time_spent.user_id
    WHERE yearweek(login_time)=yearweek(now()) and tbl_users.role_id=2 and time_spent.user_id='.$id.'
    GROUP by dayname(login_time)');
     return $query->result();
  }
  public function getstudentPoints($sid,$cid){
    $query = $this->db->query("SELECT tbl_users.firstname,tbl_users.id,course.course_id,course.course_name,sum(student_activity.course_status) as 'point' FROM `student_activity` JOIN course on course.course_id = student_activity.course_id JOIN tbl_users on tbl_users.id=student_activity.user_id WHERE student_activity.course_status=1 and tbl_users.role_id=2 and student_activity.user_id=".$sid." and student_activity.course_id=".$cid."");
    return $query->row();
  }
  public function getstudentPointsbyclassid($sid,$cid,$courseid){
    $query = $this->db->query("SELECT tbl_users.firstname,tbl_users.id,course.course_id,course.course_name,sum(student_activity.course_status) as 'point' FROM `student_activity` JOIN course on course.course_id = student_activity.course_id JOIN tbl_users on tbl_users.id=student_activity.user_id WHERE student_activity.course_status=1 and tbl_users.role_id=2 and student_activity.user_id=".$sid." and student_activity.class_id=".$cid." and student_activity.course_id=".$courseid."");
    return $query->row();
  }
  public function getAllStudents(){
    return $this->db->select('*')->from('tbl_users')->where('role_id',2)->get()->result();
  }
  public function pointsbycrsebysid($sid,$cid){
    return $this->db->select('*')->from('student_activity')->where('user_id',$sid)->where('course_id',$cid)->get()->num_rows();
  }
  public function randomcolor(){
        $rgb=array();
        foreach(array('r','g','b') as $c){
            $rgbv=mt_rand(0,255);           
            $rgb[]=$rgbv;           
        }
        return implode(',',$rgb);
    }
}