<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model 
{
    
    public function grade_list()
    {
        $this->db->select('id,class_name');
        $multipleWhere = ['board_id!=' => 5, 'active' => 0];
        $this->db->where($multipleWhere);
        return $this->db->get('class')->result();
    }
    
    public function GetListVideos()
    {
        $query = $this->db->query("SELECT * FROM toppers_videos WHERE active=0 ORDER BY file_name DESC LIMIT 1");
        $result = $query->result_array();
        return $result;
    }  

    public function GetToppersCopy()
    {
        $query = $this->db->query("SELECT * FROM answer_script ORDER BY file_name DESC LIMIT 1");
        $result = $query->result_array();
        return $result;
    }

    public function GetToppersPicture()
    {
        $query = $this->db->query("SELECT * FROM toppers_picture ORDER BY id DESC LIMIT 1");
        $result = $query->result_array();
        return $result;
    }
    
    public function GetGalleryImages()
    {
        $query = $this->db->query("SELECT * FROM gallery");
        $result = $query->result_array();
        return $result;
    }
    
    public function uploadTestPapers($image)
    {
        $user_id=$this->session->userdata('id');
        $firstname=$this->input->post('firstname'); 
        $grade=$this->input->post('grade'); 
        $subject=$this->input->post('subject');
    
        $upload_test=array
        (
            'user_id' => $user_id,
            'firstname'=>$firstname,
            'class'=>$grade,
            'subject'=>$subject,
            'download_file'=>$image,
        );

        $insert_success=$this->db->insert('test_upload',$upload_test);
        return $insert_success;
    }
    
    public function viewBooklist()
    {
        $this->db->select('*');
        $this->db->from('books');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function viewFees()
    {
        $this->db->select('*');
        $this->db->from('fee_structure');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetchDatainfolastId($book_id)
    {  
        $this->db->where('book_id',$book_id);
        return $this->db->get('books')->row();
    }

    public function saveEmail()
    {
        $email=$this->input->post('email');
        $book_id=$this->input->post('book_id');

        $email=array
        (
            'email'=>$email,
            'book_id'=>$book_id,
        );

        $insert_success=$this->db->insert('books_order_details',$email);
        return $insert_success;
    }

    public function saveBillingAddress()
    {  
        $name=$this->input->post('name');
        $contact=$this->input->post('contact');
        $email=$this->input->post('email');
        $city=$this->input->post('city');
        $state=$this->input->post('state'); 
        $zip=$this->input->post('zip');
        $address=$this->input->post('address');
        $book_id=$this->input->post('book_id');
        $amount=$this->input->post('amount');

        $billing_details=array
        (
            'name'=>$name,
            'contact'=>$contact,
            'email'=>$email,
            'city'=>$city,
            'state'=>$state,
            'zip'=>$zip,
            'address'=>$address,
            'book_id'=>$book_id,
            'amount'=>$amount,
        );

        $insert_success=$this->db->insert('books_order_details',$billing_details);
        return $insert_success;
    }

    public function getBillingData($stdid)
    {  
        $this->db->select('*');
        $this->db->from('books_order_details as bod');
        $this->db->join('books as b','bod.book_id=b.book_id');
        $this->db->where('id',$stdid);
        $query=$this->db->get()->row();
        return $query;
    }

    public function getBillingAddress()
    {
        $this->db->select('*');
        $this->db->from('books_order_details as bod');
        $this->db->join('books as b','bod.book_id=b.book_id');
        $this->db->order_by('id','DESC');
        $this->db->limit('1');
        $query=$this->db->get()->result();
        return $query;
    }

    public function getStudentInfo($user_id)
    {
        $this->db->select('name,email,contact');
        $this->db->from('books_order_details');
        $this->db->where('id',$user_id);
        return $this->db->get()->row();
    }

    public function GetNotice()
    {
        $query = $this->db->query("SELECT * FROM notice_board ORDER BY id DESC LIMIT 5");
        $result = $query->result_array();
        return $result;
    } 
    
    public function GetToppersView()
    {
        $query = $this->db->query("SELECT * FROM toppersview ORDER BY id DESC LIMIT 1");
        $result = $query->result_array();
        return $result;
    }

    public function GetSubjectwiseView()
    {
        $query = $this->db->query("SELECT * FROM subjectwiseview ORDER BY id DESC LIMIT 1");
        $result = $query->result_array();
        return $result;
    }

    public function GetAnswerWritting()
    {
        $query = $this->db->query("SELECT * FROM answerwritting ORDER BY id DESC LIMIT 1");
        $result = $query->result_array();
        return $result;
    } 
    
    public function getRecords($grade,$course,$year)
    {
        $this->db->select('ex.id,ex.grade,ex.course,ex.typeofpaper,ex.year,ex.file');
        $this->db->from('examination as ex');
        $this->db->where('ex.grade',$grade);
        $this->db->where('ex.course',$course);
        $this->db->where('ex.year',$year);
        $query=$this->db->get();
        return $query->result();
    }
}
