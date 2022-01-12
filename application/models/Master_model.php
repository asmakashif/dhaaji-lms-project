<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model {

    public function submitBoard($data)
	{ 
		$this->db->where('board_name',$this->input->post('board'));
		$result=$this->db->get('board')->row();
		if(empty($result)){
          return $this->db->insert('board',$data);
		}else{
          return false;
		}
	}

	public function updateBoard()
	{
		$data = array('board_name' => $this->input->post('board'));
		$this->db->where('board_id',$this->input->post('b_id'));
		return $this->db->update('board',$data);

	}

	public function GetListBoard()
	{
		$this->db->order_by('board_name','asc');
		$this->db->where('active!=',1);
		return $this->db->get('board')->result();
	}

	public function deleteBoard()
	{   
		$this->db->where('board_id',$this->input->post('b_id'));
		return $this->db->delete('board');
	}
    //starts class
    public function GetListClass()
    {
    	$this->db->select('b.board_name,b.board_id,c.class_name,c.id');
    	$this->db->from('class as c');
    	$this->db->join('board as b','b.board_id=c.board_id');
    	// $this->db->where('c.active',0);
    	$this->db->order_by('c.class_name','asc');
    	return $this->db->get()->result();
  
    }

    public function submitClass()
    {
    	$board_id=$this->input->post('board_id');
    	$classname=$this->input->post('className');
    	$this->db->where('board_id',$board_id);
    	$this->db->where('class_name',$classname);
		$result=$this->db->get('class')->row();
		if(empty($result)){
          return $this->db->insert('class',array('board_id' =>$board_id, 'class_name'=>$classname));
		}else{
          return false;
		}
    }

    public function updateClass()
    {
    	$board_id=$this->input->post('board_id');
    	$classname=$this->input->post('class');
    	$cls_id=$this->input->post('c_id');
    	$this->db->where('id',$cls_id);
    	return $this->db->update('class',array('board_id' =>$board_id, 'class_name'=>$classname));
    }

    public function deleteClass()
    {
		$this->db->where('id',$this->input->post('c_id'));
		return $this->db->delete('class');
    }

    public function GetListClassById($id)
    {
    	$this->db->select('b.board_name,b.board_id');
    	$this->db->from('class as c');
    	$this->db->join('board as b','b.board_id=c.board_id');
    	$this->db->where('c.id',$id);
    	return $this->db->get()->row();
  
    }

    //add subjects
    public function submitSubject($file)
    {
    	$board_id=$this->input->post('board_id');
    	$classid=$this->input->post('c_id');
    	$subjects=$this->input->post('subjectName');
    	$this->db->where('board_id',$board_id);
    	$this->db->where('class_id',$classid);
    	$this->db->where('course_name',$subjects);
        $this->db->where('course_img',$file);
		$result=$this->db->get('course')->row();
		if(empty($result)){
          return $this->db->insert('course',array('board_id' =>$board_id, 'class_id'=>$classid,'course_name'=>$subjects,'course_img'=>$file));
		}else{
          return false;
		}
    }


    public function updateSubject($file)
    {
        $board_id=$this->input->post('board_id');
        $classid=$this->input->post('c_id');
        $subjects=$this->input->post('subjectName');
        $this->db->where('course_id',$this->input->post('s_id'));
        return $this->db->update('course',array('board_id' =>$board_id, 'class_id'=>$classid,'course_name'=>$subjects,'course_img'=>$file));
    }

    public function GetListClassByBoardId($board_id)
    {
    	$this->db->select('b.board_name,b.board_id,c.class_name,c.id');
    	$this->db->from('class as c');
    	$this->db->join('board as b','b.board_id=c.board_id');
    	$this->db->where('c.board_id',$board_id);
    	return $this->db->get()->result();
    }

    public function GetListSubjects()
    {
        $this->db->select('s.course_id,s.course_name,c.class_name,b.board_name');
        $this->db->from('course as s');
        $this->db->join('class as c','s.class_id=c.id');
        $this->db->join('board as b','s.board_id=b.board_id');
        $this->db->where('s.active',0);
        return $this->db->get()->result();
    }

    public function getListBoardClassSubject($board,$classid)
    {
        $this->db->select('s.course_id,s.course_name,c.class_name,b.board_name');
        $this->db->from('course as s');
        $this->db->join('class as c','s.class_id=c.id');
        $this->db->join('board as b','s.board_id=b.board_id');
        $this->db->where('s.active',0);
        $this->db->where('s.board_id',$board);
        $this->db->where('s.class_id',$classid);
        return $this->db->get()->result();
    }

    public function deleteSubject()
    {
        $this->db->where('course_id',$this->input->post('s_id_delete'));
        return $this->db->update('course',array('active'=>1));
    }

    public function fetachSubectsById($class_id)
    {
        $this->db->select('course_id,course_name');
        $this->db->where('class_id',$class_id);
        return $this->db->get('course')->result();
    }

    //chapter start

    public function submitChapters($file,$course_material)
    {
        $board_id=$this->input->post('board_id');
        $classid=$this->input->post('c_id');
        $subject_id=$this->input->post('subject_id');
        $chapters=$this->input->post('chapters');
        $this->db->where('board_id',$board_id);
        $this->db->where('class_id',$classid);
        $this->db->where('course_id',$subject_id);
        $this->db->where('chapters_name',$chapters);
        $this->db->where('file_name',$file);
        $this->db->where('course_material',$course_material);
        $result=$this->db->get('chapters')->row();
        if(empty($result)){
          return $this->db->insert('chapters',array('board_id' =>$board_id, 'class_id'=>$classid,'course_id'=>$subject_id,'chapters_name'=>$chapters,'file_name'=>$file,'course_material'=>$course_material));
        }else{
          return false;
        }
    }

    public function GetListChapters()
    {
        $this->db->select('s.course_name,c.class_name,b.board_name,ch.chapters_name,ch.chapters_id,ch.file_name,ch.course_material');
        $this->db->from('chapters as ch');
        $this->db->join('class as c','ch.class_id=c.id');
        $this->db->join('board as b','ch.board_id=b.board_id');
        $this->db->join('course as s','ch.course_id=s.course_id');
        $this->db->where('ch.active',0);
        return $this->db->get()->result();
    }

    public function getListBoardClassSubjectChapters($value='')
    {
        $board_id=$this->input->post('board_idselect');
        $classid=$this->input->post('class');
        $subject_id=$this->input->post('subject');
        $this->db->select('s.course_name,c.class_name,b.board_name,ch.chapters_name,ch.chapters_id,ch.file_name,ch.course_material');
        $this->db->from('chapters as ch');
        $this->db->join('class as c','ch.class_id=c.id');
        $this->db->join('board as b','ch.board_id=b.board_id');
        $this->db->join('course as s','ch.course_id=s.course_id');
         $this->db->where('ch.active',0);
        $this->db->where('ch.board_id',$board_id);
        $this->db->where('ch.class_id',$classid);
        $this->db->where('ch.course_id',$subject_id);
        return $this->db->get()->result();
    }
    public function deleteChapters()
    {
        $this->db->where('chapters_id',$this->input->post('c_id_delete'));
        return $this->db->update('chapters',array('active'=>1));
    }

    public function updateSChapters($file,$course_material)
    {
        $board_id=$this->input->post('board_id');
        $classid=$this->input->post('c_id');
        $subject_id=$this->input->post('subject_id');
        $chapters=$this->input->post('chapters');
        $this->db->where('chapters_id',$this->input->post('s_id'));
        return $this->db->update('chapters',array('board_id' =>$board_id, 'class_id'=>$classid,'course_id'=>$subject_id,'chapters_name'=>$chapters,'file_name'=>$file,'course_material'=>$course_material));
       
    }

    //fee setups
    public function feeSubmitData()
    {
        $board_id=$this->input->post('board_id');
        $classid=$this->input->post('c_id');
        $subject_id=$this->input->post('subject_id');
        $duration=$this->input->post('duration');
        // $discount=$this->input->post('discount');
        $fee_price=$this->input->post('fee_price');

        $insert_fee=array
        (
            'board_id' =>$board_id, 'class_id'=>$classid,'subject'=>$subject_id,'duration'=>$duration,'fees'=>$fee_price
        );

        $insert_success=$this->db->insert('fee_structure',$insert_fee);
        return $insert_success;
        // $result=$this->db->get('fee_structure')->row();
        // if(empty($result)){
        //   return $this->db->insert('fee_structure',array('board_id' =>$board_id, 'class_id'=>$classid,'subject'=>$subject_id,'duration'=>$duration,'fees'=>$fee_price));
        // }else{
        //   return false;
        // }
    }

    public function updateFeeSetup()
    {
        $data_info= array(      
                 'board_id' => $this->input->post('board_id'), 
                 'class_id' => $this->input->post('c_id'), 
                 'duration' =>$this->input->post('duration'), 
                 'subject' => $this->input->post('subject_id'), 
                 'fees' => $this->input->post('feeprice'),
                 // 'discount' => $this->input->post('discount'),  
             );
        $this->db->where('fee_id',$this->input->post('s_id'));
        return $this->db->update('fee_structure',$data_info);

    }

    public function deleteFeeeSetup($value='')
    {
        $this->db->where('fee_id',$this->input->post('c_id_delete'));
        return $this->db->update('fee_structure', array('active' => 1));
    }

    public function listAllFee()
    {
        $this->db->select('c.class_name,b.board_name,f.fees,f.fee_id,f.duration,f.discount,f.subject');
        $this->db->from('fee_structure as f');
        $this->db->join('class as c','f.class_id=c.id');
        $this->db->join('board as b','f.board_id=b.board_id');
        // $this->db->where('f.active',0);
        return $this->db->get()->result();
    }

    public function getListBoardClassSubjectFeeSetup($board_id,$classid,$subjet)
    {
        $this->db->select('c.class_name,b.board_name,f.fees,f.fee_id,f.duration,f.discount,f.subject');
        $this->db->from('fee_structure as f');
        $this->db->join('class as c','f.class_id=c.id');
        $this->db->join('board as b','f.board_id=b.board_id');
        $this->db->where('f.active',0);
        $this->db->where('f.board_id',$board_id);
        $this->db->where('f.class_id',$classid);
        $this->db->where('f.subject',$subjet);
        return $this->db->get()->result();
    }

    //add section

    public function fetachChapterById($course_id)
    {
        $this->db->select('chapters_id,chapters_name');
        $this->db->where('course_id',$course_id);
        return $this->db->get('chapters')->result();
    }

    public function submitSections($file)
    {
        $board_id=$this->input->post('board_id');
        $classid=$this->input->post('c_id');
        $subject_id=$this->input->post('subject_id');
        $chapter_id=$this->input->post('chapter_id');
        $sections=$this->input->post('sections');
        $this->db->where('video_path',$file);
        $this->db->where('board_id',$board_id);
        $this->db->where('class_id',$classid);
        $this->db->where('course_id',$subject_id);
        $this->db->where('chapter_id',$chapter_id);
        $this->db->where('section_name',$sections);
        $result=$this->db->get('sections')->row();
        if(empty($result)){
          return $this->db->insert('sections',array('board_id' =>$board_id, 'class_id'=>$classid,'course_id'=>$subject_id,'chapter_id'=>$chapter_id,'section_name'=>$sections,'video_path'=>$file));
        }else{
          return false;
        }
    }

    public function GetListSections()
    {
        $this->db->select('s.course_name,c.class_name,b.board_name,ch.chapters_name,se.section_name,se.section_id,se.video_path');
        $this->db->from('sections as se');
        $this->db->join('class as c','se.class_id=c.id');
        $this->db->join('board as b','se.board_id=b.board_id');
        $this->db->join('course as s','se.course_id=s.course_id');
        $this->db->join('chapters as ch','se.chapter_id=ch.chapters_id');
        $this->db->where('se.active',0);
        return $this->db->get()->result();
    }


    public function deleteSections()
    {
        $this->db->where('section_id',$this->input->post('c_id_delete'));
        return $this->db->update('sections',array('active'=>1));
    }

    public function updateCSections($file)
    {
        $board_id=$this->input->post('board_id');
        $classid=$this->input->post('c_id');
        $subject_id=$this->input->post('subject_id');
        $chapter_id=$this->input->post('chapter_id');
        $sections=$this->input->post('sections');
        $this->db->where('section_id',$this->input->post('s_id'));
        return $this->db->update('sections',array('board_id' =>$board_id, 'class_id'=>$classid,'course_id'=>$subject_id,'chapter_id'=>$chapter_id,'section_name'=>$sections,'video_path'=>$file));
       
    }

    public function getListBoardClassSubjectChaptersSections($value='')
    {
        $board_id=$this->input->post('board_idselect');
        $classid=$this->input->post('class');
        $subject_id=$this->input->post('subject');
        $chapter_id=$this->input->post('chapter');
        $this->db->select('s.course_name,c.class_name,b.board_name,ch.chapters_name,se.section_name,se.video_path,se.section_id');
        $this->db->from('sections as se');
        $this->db->join('class as c','se.class_id=c.id');
        $this->db->join('board as b','se.board_id=b.board_id');
        $this->db->join('course as s','se.course_id=s.course_id');
        $this->db->join('chapters as ch','se.chapter_id=ch.chapters_id');
        $this->db->where('se.active',0);
        $this->db->where('se.board_id',$board_id);
        $this->db->where('se.class_id',$classid);
        $this->db->where('se.course_id',$subject_id);
        $this->db->where('se.chapter_id',$chapter_id);
        return $this->db->get()->result();
    }

    //add books
    public function submitBook($image)
    {
        $book=$this->input->post('book');
        $standard=$this->input->post('standard');
        $book_price=$this->input->post('book_price');

        $this->db->where('book_img',$image);
        $this->db->where('book_name',$book);
        $this->db->where('standard',$standard);
        $this->db->where('book_price',$book_price);
        $result=$this->db->get('books')->row();
        if(empty($result)){
          return $this->db->insert('books',array('book_img' =>$image, 'book_name'=>$book,'standard'=>$standard,'book_price'=>$book_price));
        }else{
          return false;
        }
    }

    // public function updateBook($image)
    // {
    //     $book=$this->input->post('book');
    //     $standard=$this->input->post('standard');
    //     $book_price=$this->input->post('book_price');
    //     $this->db->where('book_id',$this->input->post('b_id'));
    //     return $this->db->update('books',array('book_img' =>$image, 'book_name'=>$book,'standard'=>$standard,'book_price'=>$book_price));
       
    // }

    public function updateBook()
    {
        $data = array('book_name' => $this->input->post('book'));
        $this->db->where('book_id',$this->input->post('b_id'));
        return $this->db->update('books',$data);

    }

    public function GetListBooks()
    {
        $this->db->order_by('book_name','desc');
        $this->db->where('active','0');
        return $this->db->get('books')->result();
    }

    public function deleteBook()
    {   
        $this->db->where('book_id',$this->input->post('b_id'));
        return $this->db->update('books',array('active'=>1));
    }

    //collect fees starts
    public function getFeesData()
    {
        $this->db->select('u.id,u.firstname,s.grade,s.curriculum,p.payment_date,p.exp_date');
        $this->db->from('tbl_users as u');
        $this->db->join('student_school_info as s','u.id=s.user_id');
        $this->db->join('payment_details as p','u.id=p.user_id');
        $this->db->group_by('u.id');
        return $this->db->get()->result();
    }

    //student information
    public function getStudentInfo()
    {
        $this->db->select('u.id,u.stdId,u.firstname,u.verify_email,u.status,u.active,u.approve,s.grade,s.school_name,g.guardian_name,g.phone_number,g.email,g.relation');
        $this->db->from('tbl_users as u');
        $this->db->join('student_school_info as s','u.id=s.user_id', 'left');
        $this->db->join('guardian as g','u.id=g.user_id', 'left');
        $this->db->order_by('u.id','asc');      
        return $this->db->get()->result();
    }

    //message board 
    public function submitNotice()
    {
        $message = $this->input->post('message');
        $insert_message = array('message'=>$message);
        $insert_success=$this->db->insert('notice_board',$insert_message);
        return $insert_success;
    }

    //help center
    public function submitQuestions()
    {
        // $title = $this->input->post('title');
        $title_body = $this->input->post('title_body');
        $title_content = $this->input->post('title_content');

        $insert_ques = array
            (
                // 'title'=>$title,
                'title_body'=>$title_body,
                'title_content'=>$title_content
            );
        $insert_success=$this->db->insert('help_center',$insert_ques);
        return $insert_success;
    }

    public function getOrderDetails()
    {
        $this->db->select('o.id,o.name,o.purchase_date,o.status,b.book_name');
        $this->db->from('books_order_details as o');
        $this->db->join('books as b','o.book_id=b.book_id');
        return $this->db->get()->result();
    }

    

    public function editOrderDetails($id)
    {
        $this->db->select('o.id,o.name,o.address,o.contact,o.status,o.purchase_date,b.book_name');
        $this->db->from('books_order_details as o');
        $this->db->join('books as b','o.book_id=b.book_id');
        $this->db->where('o.id', $id);
        $fetchdatabyid=$this->db->get()->result();
        return $fetchdatabyid;
    }

    public function updateOrderDetails($updateid)
    {
        $status=$this->input->post('status');

        $OrderDetailsUpdate=array
        (
            'status'=>$status
        );

        $this->db->where('id',$updateid);
        $update_success=$this->db->update('books_order_details',$OrderDetailsUpdate);
        return $update_success;
    }

    //Issue refund
    public function getRefundDetails()
    {
        $query=$this->db->query("SELECT tbl_users.id,tbl_users.firstname,tbl_users.plan_name,payment_details.plan_amount,payment_details.txn_id,payment_details.Payment_Id from tbl_users JOIN payment_details on tbl_users.id=payment_details.user_id WHERE deleteStudent=1 UNION 
        SELECT books_order_details.id,books_order_details.name,books.book_name,books_order_details.amount,books_order_details.txn_id,books_order_details.Payment_Id FROM books_order_details 
        JOIN books on books_order_details.book_id=books.book_id WHERE status='cancel'");
        return $query->result();
    }
}