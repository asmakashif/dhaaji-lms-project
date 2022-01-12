<?php
class Quiz_m extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function takequiz($chapters_id)
	{
		$this->db->select('*');
		$this->db->from('quiz');//table name
	 	$this->db->join('chapters','quiz.chapter_id=chapters.chapters_id');
	 	// $this->db->join('course','quiz.course_id=course.course_id');
		$this->db->where('chapters.chapters_id',$chapters_id);
		$this->db->where('quiz.active',0);
		$this->db->order_by('quiz.quiz_id','RANDOM');
		$this->db->limit(10);
		$quiz=$this->db->get()->result();
	    return $quiz;
	}
	public function getUserDetails(){
		$query = $this->db->get_where('tbl_users',array(
			"id"=>$this->session->userdata("id") , 
			"role_id" => $this->session->userdata("role_id")
			));
		$row = $query->row();	
		return $row;	
	}
	public function coursedetails($cid){
		$this->db->select('*');
		$this->db->from('chapters');
	 	$this->db->join('course','chapters.course_id=course.course_id');
		$this->db->where('chapters.chapters_id',$cid);
		$course=$this->db->get()->row();
	    return $course;
	}
	public function correctanswer($cid){	
  		$query=$this->db->query("SELECT * FROM quiz_result 
        JOIN quiz on quiz.quiz_id=quiz_result.question_id
        WHERE quiz_result.q_answer=quiz.answer
        and quiz_result.user_id=".$this->session->userdata("id")." and quiz_result.chapter_id=".$cid."");
        return $query->result();
	}
	public function wronganswer($cid){
		$query=$this->db->query("SELECT * FROM quiz_result 
        JOIN quiz on quiz.quiz_id=quiz_result.question_id
        WHERE quiz_result.q_answer!=quiz.answer
        and quiz_result.user_id=".$this->session->userdata("id")." and quiz_result.chapter_id=".$cid."");
        return $query->num_rows();
	}
	public function no_of_attempt($chapters_id)
	{
		  $query = $this->db->get_where('no_of_attempt',array('user_id'=>$this->session->userdata("id") , "chapter_id" => $chapters_id));
    	  $row = $query->row();
    	  if(isset($row)){
    	  	return $row->noofattempt;
    	  }else{
    	  	return "0";
    	  }
	}

	public function getQuizData($user_id)
	{
		$this->db->select('*');
		$this->db->from('quiz_result as qr');//table name
	    $this->db->join('chapters as ch','ch.chapters_id=qr.chapter_id');
	   // $this->db->join('course as c','c.course_id=qr.course_id');
	    $this->db->join('tbl_users as u','qr.user_id=u.id');
	   	$this->db->group_by('qr.chapter_id');
		$this->db->where('qr.user_id',$user_id);
		$query=$this->db->get()->result();
		return $query;
	}
	
	public function checkingQj($chapters_id,$user_id)
	{
		$user_id=$this->session->userdata('id');

		$this->db->where('chapter_id',$chapters_id);
		$data=$this->db->get('sections')->row();
		// print_r($data->course_id);die();

        $this->db->where('chapter_id',$chapters_id);
		$res=$this->db->get('sections')->num_rows();

		$this->db->where('chapter_id',$chapters_id);
		$this->db->where('user_id',$user_id);
		$res1=$this->db->get('video_path')->num_rows();
		
		if($res==$res1){

			return $this->db->insert('student_activity',array('user_id' => $user_id,'course_id' =>$data->course_id,'class_id' =>$data->class_id,'chapter_id' =>$chapters_id, 'course_status'=>1,'completed_date'=>date("Y-m-d H:i:s")));
		}
		else
		{
			return 0;
		}

	}
}
