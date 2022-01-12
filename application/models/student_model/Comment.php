<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function save_comment()
	{
		$comment_title=$this->input->post('comment_title');
		$comment_details=$this->input->post('comment_details');
		$commented_date=date("Y-m-d H:i:s");
		$firstname=$this->input->post('firstname');
		$user_id=$this->session->userdata('id');

		$comment_insert=array
		(
			'comment_title'=>$comment_title,
			'comment_details'=>$comment_details,
			'commented_date'=>$commented_date,
			'firstname'=>$firstname,
			'user_id' => $user_id,
		);
		$insert_success=$this->db->insert('comment',$comment_insert);
		return $insert_success;
	}

    public function view_comments($params = array())
    { 
        $this->db->select('comment_id,firstname,comment_title,comment_details,commented_date');
	 	$this->db->from('comment');//table name

        if(array_key_exists("where", $params))
        { 
            foreach($params['where'] as $key => $val)
            { 
                $this->db->where($key, $val); 
            } 
        }
        if(array_key_exists("search", $params))
        { 
            // Filter data by searched keywords 
            if(!empty($params['search']['keywords']))
            { 
                $this->db->like('firstname', $params['search']['keywords']);
                $this->db->or_like('comment_title', $params['search']['keywords']); 
            } 
        } 
        // Sort data by ascending or desceding order 
        if(!empty($params['search']['sortBy']))
        {
            $this->db->order_by('firstname', $params['search']['sortBy']);
        }
        else
        { 
            $this->db->order_by('comment_id', 'asc'); 
        } 
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count')
        { 
            $result = $this->db->count_all_results();
        }
        else
        { 
            if(array_key_exists("comment_id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single'))
            {
                if(!empty($params['comment_id']))
                { 
                    $this->db->where('comment_id', $params['comment_id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }
            else
            { 
                $this->db->order_by('comment_id', 'asc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params))
                { 
                    $this->db->limit($params['limit'],$params['start']); 
                }
                elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params))
                {
                    $this->db->limit($params['limit']); 
                } 
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        } 
        // Return fetched data 
        return $result; 
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
