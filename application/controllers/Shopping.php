<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Load Library and model.
		$this->load->library('cart');
		$this->load->model('student_model/course_m');
		$this->load->model('notifications_m');
		$this->load->model('user_model');
		if(!$this->session->userdata('id'))
            redirect('user_controller/login');
	}

	public function index()
	{
		//Get all data from database
		//send all product data to "shopping_view", which fetch from database.
		$data['notifications']=$this->notifications_m->get_notifications();
		$data['expired']=$this->course_m->checkSubscription($this->session->userdata('id'));
		$data['main_content']='lms_student/courses/index';
		$this->load->view('include/template', $data);
	}

	public function curriculum_courses()
	{
		$data['notifications']=$this->notifications_m->get_notifications();
		$data['student']=$this->user_model->getStudentInfo($this->session->userdata('id'));
		// print_r($data['student']); die();
		$data['expired']=$this->course_m->checkSubscription($this->session->userdata('id'));
		$data['course'] = $this->course_m->getCourse();
		$data['main_content']='lms_student/courses/curriculum_course';
		$this->load->view('include/template', $data);
	}

	public function extra_courses()
	{
		//Get all data from database
		$data['notifications']=$this->notifications_m->get_notifications();
		$data['course'] = $this->course_m->get_extra_courses();
		$data['expired']=$this->course_m->checkCourseSubscription($this->session->userdata('id'));
		// print_r($data['expired']) ; die();
		// echo $id; die();
		// $data['std_id']=$id;
		$data['main_content']='lms_student/courses/extra_course';
		$this->load->view('include/template', $data);
	}

	public function add()
	{
		// $name=$this->input->post('name');
		// $price=$this->input->post('price');
		// $qty=$this->input->post('qty');
		// Set array for send data.
		$this->load->library('cart');
		$insert_data = array
		(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => 4
		);
		$result=$this->cart->insert($insert_data);
		if($result)
		{
			$this->session->set_flashdata('flashSuccess', 'Added Successfully.');
			redirect('student_controller/student_dashboard/index');
		}else
		{
			$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
			redirect('student_controller/student_dashboard/index');
		}
		//$data['main_content']='lms_student/my_cart';
		//$this->load->view('include/template', $data);
	}

	public function remove($rowid) 
	{
		// Check rowid value.
		if ($rowid==="all")
		{
			// Destroy data which store in session.
			$this->cart->destroy();
		}
		else
		{
			// Destroy selected rowid in session.
			$data = array
			(
				'rowid' => $rowid,
				'qty' => 0
			);
			// Update cart data, after cancel.
			$result=$this->cart->update($data);

			if($result)
			{
				$this->session->set_flashdata('flashSuccess', 'Removed Successfully.');
				redirect('student_controller/student_dashboard/index');
			}else
			{
				$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
				redirect('student_controller/student_dashboard/index');
			}
		}

		// This will show cancel data in cart.
		// redirect('shopping');
		$data['main_content']='lms_student/my_cart';
		$this->load->view('include/template', $data);
	}

	public function update_cart()
	{
		// Recieve post values,calcute them and update
		$cart_info = $_POST['cart'] ;
		foreach( $cart_info as $id => $cart)
		{
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];

			$data = array
			(
				'rowid' => $rowid,
				'price' => $price,
				'amount' => $amount,
				'qty' => $qty
			);
			$result=$this->cart->update($data);
			if($result)
			{
				$this->session->set_flashdata('flashSuccess', 'Updated Successfully.');
				redirect('student_controller/student_dashboard/index');
			}else
			{
				$this->session->set_flashdata('flashError', 'Something went wrong!!!. Please try again!!!');
				redirect('student_controller/student_dashboard/index');
			}
		}
		$data['main_content']='lms_student/my_cart';
		$this->load->view('include/template', $data);
	}

	public function billing_view()
	{
		// Load "billing_view".
		$this->load->view('billing_view');
	}

	public function save_order()
	{
		// This will store all values which inserted from user.
		$customer = array
		(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'phone' => $this->input->post('phone')
		);
		// And store user information in database.
		$cust_id = $this->billing_model->insert_customer($customer);

		$order = array
		(
			'date' => date('Y-m-d'),
			'customerid' => $cust_id
		);

		$ord_id = $this->billing_model->insert_order($order);

		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array
				(
					'orderid' => $ord_id,
					'productid' => $item['id'],
					'quantity' => $item['qty'],
					'price' => $item['price']
				);

				// Insert product imformation with order detail, store in cart also store in database.

				$cust_id = $this->billing_model->insert_order_detail($order_detail);
			endforeach;
		endif;

		// After storing all imformation in database load "billing_success".
		$this->load->view('billing_success');
	}
}