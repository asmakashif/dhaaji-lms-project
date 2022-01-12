<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResponseModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

    public function fetchSingleComment()
    {
        $query = $this->db->query("SELECT * FROM comment ORDER BY comment_id DESC LIMIT 1");
        $result = $query->result_array();
        return $result;
    }

    public function fetchComment()
    {
        $this->db->select('*');
        $this->db->from('comment');
        $query=$this->db->get()->result();
        return $query;
    }

    public function fetchDatainfolastId($comment_id)
    {  
        $this->db->where('comment_id',$comment_id);
        return $this->db->get('comment')->row();
    }

    public function saveCommentReply()
    {
        $user_id=$this->session->userdata('id');
        $comment_id=$this->input->post('comment_id');
        $comment_title=$this->input->post('comment_title');
        $answer=$this->input->post('answer');
        $comment_reply_date=date("Y-m-d H:i:s");
        $username=$this->input->post('username');

        $insert_comment_reply=array
        (
            'comment_id'=>$comment_id,
            'comment_title'=>$comment_title,
            'answer'=>$answer,
            'user_id' => $user_id,
            'comment_reply_date'=>$comment_reply_date,
            'username'=>$username
        );
        $insert_success=$this->db->insert('comment_reply',$insert_comment_reply);
        return $insert_success;
    }

    public function fetchReply($comment_id)
    {
        $this->db->select('*');
        $this->db->from('comment_reply as cr');//table name
        $this->db->join('comment as c','c.comment_id=cr.comment_id');
        $this->db->where('c.comment_id',$comment_id);
        $comment=$this->db->get()->result();
        // var_dump($this->db->last_query());
        // exit();
        return $comment;
    }
}
