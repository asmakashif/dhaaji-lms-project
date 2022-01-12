<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Search_model extends CI_Model
{
    function __construct() 
    { 
    // Set table name 
        $this->table = 'courses'; 
    } 

    public function getRows($params = array())
    { 
        $this->db->select('*'); 
        $this->db->from($this->table);
        // $this->db->where('grade',0); 

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
                $this->db->like('name', $params['search']['keywords']);
                $this->db->or_like('description', $params['search']['keywords']); 
            } 
        } 
        // Sort data by ascending or desceding order 
        if(!empty($params['search']['sortBy']))
        {
            $this->db->order_by('name', $params['search']['sortBy']);
        }
        else
        { 
            $this->db->order_by('id', 'asc'); 
        } 
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count')
        { 
            $result = $this->db->count_all_results();
        }
        else
        { 
            if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single'))
            {
                if(!empty($params['id']))
                { 
                    $this->db->where('id', $params['id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }
            else
            { 
                $this->db->order_by('id', 'asc'); 
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

    public function add_course()
    {
        $title=$this->input->post('title');
        $description=$this->input->post('description');
        $img=$this->input->post('img');
        $video=$this->input->post('video');

        $save_course=array(
            'title'=>$title,
            'description'=>$description,
            'img'=>$img,
            'video'=>$video
        );

        $insert_success=$this->db->insert('search_course',$save_course);
        return $insert_success;
    }
}