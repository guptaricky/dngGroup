<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CUSTOMER extends MY_Controller {

	public function view_customers(){
		// echo $group = $this->session->userdata('group');die;
		// print_r($this->Common_model->toggle_sidebar());die;
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$data['customers'] = $this->Common_model->get_data_by_query_pdo("select * from customers where 1 ",array());
		$this->load->view('admin/CUSTOMER/view_customers',$data);
		$this->load->view('default_admin/footer');
	}
	
	public function add_customers(){
		
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$this->load->view('admin/CUSTOMER/add_customers');
		$this->load->view('default_admin/footer');
	}
	public function addCustomer(){
		$userid = (array_slice($this->session->userdata, 9, 1));
		// $uid = $userid['user_id'];
		$data = array(
			'cust_fullname' => ucwords(strtolower($_POST['fname'].' '.$_POST['lname'])),
			'cust_address' => $_POST['address'],
			'cust_city' => $_POST['city'],
			'cust_state' => $_POST['state'],
			'cust_phone' => $_POST['phone'],
			'cust_additional_info' => $_POST['info'],
			'cust_email' => $_POST['email'],
			'cust_aadhar' => $_POST['aadhar'],
			'cust_pan' => strtoupper($_POST['pan']),
			'cust_user' => 1
		);
		
		$this->Crud_model->insert_record('customers',$data);
		
	}


}