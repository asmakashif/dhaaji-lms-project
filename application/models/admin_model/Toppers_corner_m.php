<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Toppers_corner_m extends CI_Model 
{
    public function updateVideo($value='')
    {
        $video_link=$this->input->post('video_link');
        $file_name=$this->input->post('file_name');
        $this->db->where('id',$this->input->post('s_id'));
        return $this->db->update('toppers_videos',array('video_link' =>$video_link,'file_name'=>$file_name));
    }

	public function GetListVideos()
	{
		$this->db->order_by('file_name','asc');
		$this->db->where('active','0');
		return $this->db->get('toppers_videos')->result();
	}

	public function deleteVideo()
	{   
		$this->db->where('id',$this->input->post('b_id'));
		return $this->db->update('toppers_videos',array('active'=>1));
	}

    public function submitPicture($image = array())
    {
        return $this->db->insert_batch('toppers_picture',$image);
    }

    //answer copy
    public function answerScriptAdd($student_name,$image)
    {
        $data = array(
            'student_name' => $student_name,
            'file_name' => $image, 
            );
        $result=$this->db->insert('answer_script',$data);
        return $result;
    }

    public function GetListAnswerCopy()
    {
        $this->db->order_by('student_name','asc');
        $this->db->where('active','0');
        return $this->db->get('answer_script')->result();
    }

    public function deleteAnswerScript()
    {   
        $this->db->where('id',$this->input->post('c_id'));
        return $this->db->update('answer_script',array('active'=>1));
    }
    
    public function submitGalleryImages($image = array())
    {
        return $this->db->insert_batch('myself',$image);
    }
}