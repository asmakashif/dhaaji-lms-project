<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examination_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function submitMockPapers($file)
	{
		$title=$this->input->post('title');

		$insert_papers=array
		(
			'title'=>$title,
			'file_name'=>$file,
		);
		$insert_success=$this->db->insert('mock_test_papers',$insert_papers);
		return $insert_success;
	}
	
	public function getQuizTitle()
	{
		$this->db->select('chapters_id,chapters_name');
		$this->db->from('chapters');
		$query=$this->db->get()->result();
		return $query;
	}

	public function view_quiz()
	{
		$this->db->select('q.quiz_id,q.question,q.choice1,q.choice2,q.choice3,q.choice4,q.answer,ch.chapters_name');
    	$this->db->from('quiz as q');
    	$this->db->join('chapters as ch','ch.chapters_id=q.chapter_id');
    	$this->db->where('q.active',0);
    	return $this->db->get()->result();
	}
	

	// public function submitMcqs()
	// {
	// 	$chapter_id=$this->input->post('chapter_id');
	// 	$question=$this->input->post('question');
	// 	$choice1=$this->input->post('choice1');
	// 	$choice2=$this->input->post('choice2');
	// 	$choice3=$this->input->post('choice3');
	// 	$choice4=$this->input->post('choice4');
	// 	$answer=$this->input->post('answer');
	// 	// $active=$this->input->post('answer');

	// 	$insert_quiz=array
	// 	(
	// 		'chapter_id'=>$chapter_id,
	// 		'question'=>$question,
	// 		'choice1'=>$choice1,
	// 		'choice2'=>$choice2,
	// 		'choice3'=>$choice3,
	// 		'choice4'=>$choice4,
	// 		'answer'=>$answer,
	// 		'weightage_marks'=>1,
	// 	);
	// 	$insert_success=$this->db->insert('quiz',$insert_quiz);
	// 	return $insert_success;
	// }


	public function submitMcqs()
    {
    	$chapter_id=$this->input->post('chapter_id');
		$question=$this->input->post('question');
		$choice1=$this->input->post('choice1');
		$choice2=$this->input->post('choice2');
		$choice3=$this->input->post('choice3');
		$choice4=$this->input->post('choice4');
		$answer=$this->input->post('answer');
		
        $insert_message = array('chapter_id'=>$chapter_id,'question'=>$question,'choice1'=>$choice1,'choice2'=>$choice2,'choice3'=>$choice3,'choice4'=>$choice4,'answer'=>$answer,'weightage_marks'=>1,);
        $insert_success=$this->db->insert('quiz',$insert_message);
        return $insert_success;
    }

	public function deleteQuiz($quiz_id)
	{   
		$this->db->where('quiz_id',$quiz_id);
		return $this->db->update('quiz',array('active'=>1));
	}
	
	public function courseList()
    {
        $this->db->select('course_id,course_name');
        return $this->db->get('course')->result();
    }
    
    public function viewYear()
    {
        $this->db->select('id,year');
        return $this->db->get('examination')->result();
    }

    public function submitQP($file)
	{
		$grade=$this->input->post('grade');
		$course=$this->input->post('course');
		$typeofpaper=$this->input->post('typeofpaper');
		$year=$this->input->post('year');
		$created_date=date("Y-m-d H:i:s");

		$insert_papers=array
		(
			'grade'=>$grade,
			'course'=>$course,
			'typeofpaper'=>$typeofpaper,
			'year'=>$year,
			'created_date'=>$created_date,
			'file'=>$file,
		);
		$insert_success=$this->db->insert('examination',$insert_papers);
		return $insert_success;
	}

	public function viewQP()
	{
		$this->db->select('*');
    	$this->db->from('examination');
    	$this->db->where('active',0);
    	return $this->db->get()->result();
	}

	public function deleteQP($id)
	{   
		$this->db->where('id',$id);
		return $this->db->update('examination',array('active'=>1));
	}
}