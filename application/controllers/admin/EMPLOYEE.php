<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class EMPLOYEE extends MY_Controller {

	public function view_employee(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$data['employee'] = $this->Common_model->get_data_by_query_pdo("select * from employes where 1 ",array());
		$this->load->view('admin/EMPLOYEE/view_employee',$data);
		$this->load->view('default_admin/footer');
	}
	
	public function add_employee(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$data['banks'] = $this->Common_model->get_data_by_query_pdo("select * from bank_master where 1 ",array());
		$this->load->view('admin/EMPLOYEE/add_employee',$data);
		$this->load->view('default_admin/footer');
	}
	public function addEmployee(){
		$userid = (array_slice($this->session->userdata, 9, 1));
		// $uid = $userid['user_id'];
		$data = array(
			'emp_fullname' => ucwords(strtolower($_POST['fname'].' '.$_POST['lname'])),
			'emp_address' => $_POST['address'],
			'emp_city' => $_POST['city'],
			'emp_state' => $_POST['state'],
			'emp_phone' => $_POST['phone'],
			'emp_additional_info' => $_POST['info'],
			'emp_email' => $_POST['email'],
			'emp_aadhar' => $_POST['aadhar'],
			'emp_pan' => strtoupper($_POST['pan']),
			'emp_bank' => strtoupper($_POST['bankname']),
			'emp_bank_address' => strtoupper($_POST['bank_address']),
			'emp_bank_acc_no' => $_POST['acc_no'],
			'emp_bank_ifsc' => strtoupper($_POST['ifsc']),
			'emp_user' => 1
		);
		
		$this->Crud_model->insert_record('employes',$data);
		
	}


}