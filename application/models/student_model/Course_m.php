<?php
class Course_m extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function fetchDatainfolastId($course_id)
	{  
		$this->db->where('course_id',$course_id);
		return $this->db->get('course')->row();
	}

	public function getCourseData($course_id)
	{
		$where=array('course_id'=>$course_id);
		$this->db->where($where);

		$data=$this->db->get('course')->result();
		return $data;
	}

	public function getCourse()
	{
		$this->db->select('*');
		$this->db->from('course');
		$this->db->where('class_id',2);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_extra_courses()
	{
		$this->db->select('*');
		$this->db->from('course');
		$multipleWhere = ['class_id' => 3, 'active' => 0];
		$this->db->where($multipleWhere);
		$query = $this->db->get();
		return $query->result_array();
	} 

	public function getChapter($course_id)
	{
		$this->db->select('*');
		$this->db->from('chapters');//table name
	    $this->db->join('course','course.course_id=chapters.course_id');
		$this->db->where('course.course_id',$course_id);
		$chapter=$this->db->get()->result();
		// var_dump($this->db->last_query());
  //       exit();
	    return $chapter;
	}

	public function editChapterData($chapters_id)
	{
		$where=array('chapters_id'=>$chapters_id);
		$this->db->where($where);
		$data=$this->db->get('chapters')->result();
		return $data;
	}

	public function getSection($chapters_id)
	{
		$this->db->select('*');
		$this->db->from('sections as s');//table name
		$this->db->join('chapters as ch','s.chapter_id=ch.chapters_id');
		// $this->db->join('course as co','co.course_id=s.course_id');
		$this->db->where('ch.chapters_id',$chapters_id);
		// $this->db->group_by('co.course_id');
		$chapter=$this->db->get()->result();
	    return $chapter;
	}



	public function getMyCourses($user_id)
	{
		$this->db->select('*');
		$this->db->from('video_path as v');//table name
	    $this->db->join('chapters as c','v.chapter_id=c.chapters_id');
	    // $this->db->join('sections as s','v.section_id=s.section_id');
	    $this->db->join('tbl_users as u','v.user_id=u.id');
	    $this->db->group_by('v.chapter_id');
		$this->db->where('v.user_id',$user_id);
		$query=$this->db->get()->result();
		return $query;
	}

	function getRows($params = array())
	{
        $this->db->select('*');
        $this->db->from('chapters');
        $this->db->join('course','course.course_id=chapters.course_id');
        $this->db->join('sections','sections.chapter_id=chapters.chapters_id');
        $this->db->group_by('course.course_id');

        if(array_key_exists('chapters_id',$params) && !empty($params['chapters_id'])){
            $this->db->where('chapters.chapters_id',$params['chapters_id']);

            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }

    function getFiles($chapters_id)
	{
        $this->db->select('*');
        $this->db->from('chapters');
        $this->db->join('sections','sections.chapter_id=chapters.chapters_id');
        $this->db->group_by('sections.chapter_id');
		$this->db->where('chapters.chapters_id',$chapters_id);
        // return $this->db->get()->result();
        $query=$this->db->get()->result_array();
        return $query;
    }

	public function continue_course($std_id)
    {
    	$this->db->select('s.section_id,s.video_time,s.video_path,s.section_name,v.chapter_id,v.video_id,v.timePlayed');
    	$this->db->from('video_path as v');
    	$this->db->join('sections as s','v.section_id=s.section_id');
    	$this->db->where('v.user_id',$std_id);
    	$this->db->where('v.active', 0);
    	$this->db->order_by('v.video_id','DESC');
    	return $this->db->get()->result();
    }

    public function checkCourseSubscription()
	{
        $this->db->select('*');
        $this->db->from('extracoursecheckout as ex');
        $this->db->join('tbl_users as u','u.id=ex.user_id');
        $user_id=$this->session->userdata('id');
		$this->db->where('u.id',$user_id);
        // return $this->db->get()->result();
        $query=$this->db->get()->result_array();
        return $query;
    }


    public function checkSubscription()
	{
        $this->db->select('*');
        $this->db->from('payment_details as p');
        $this->db->join('tbl_users as u','u.id=p.user_id');
        $user_id=$this->session->userdata('id');
		$this->db->where('u.id',$user_id);
        // return $this->db->get()->result();
        $query=$this->db->get()->result_array();
        return $query;
    }
}
?>