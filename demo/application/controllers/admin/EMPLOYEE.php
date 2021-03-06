<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class EMPLOYEE extends MY_Controller {

	public function view_employee(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$data['employee'] = $this->Common_model->get_data_by_query_pdo("select * from employes where cust_active = 1 ",array());
		$this->load->view('admin/EMPLOYEE/view_employee',$data);
		$this->load->view('default_admin/footer');
	}
	
	public function add_employee(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$data['banks'] = $this->Common_model->get_data_by_query_pdo("select * from bank_master where 1 ",array());
		$this->load->view('admin/EMPLOYEE/add_employee',$data);
		$this->load->view('default_admin/footer');
	}
	public function addEmployee(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$emp_id = $_POST['emp_id'];
		$data = array(
			'emp_fname' => ucwords(strtolower($_POST['fname'])),
			'emp_lname' => ucwords(strtolower($_POST['lname'])),
			'emp_address' => $_POST['address'],
			'emp_city' => $_POST['city'],
			'emp_state' => $_POST['state'],
			'emp_phone' => $_POST['phone'],
			'emp_desig' => $_POST['designation'],
			'emp_salary' => $_POST['salary'],
			'emp_security' => $_POST['security'],
			'emp_advance' => $_POST['advance'],
			'emp_additional_info' => $_POST['info'],
			'emp_alloted_site' => $_POST['site'],
			'emp_email' => $_POST['email'],
			'emp_aadhar' => $_POST['aadhar'],
			'emp_pan' => strtoupper($_POST['pan']),
			// 'emp_bank' => strtoupper($_POST['bankname']),
			// 'emp_bank_address' => strtoupper($_POST['bank_address']),
			// 'emp_bank_acc_no' => $_POST['acc_no'],
			// 'emp_bank_ifsc' => strtoupper($_POST['ifsc']),
			'emp_user' => $uid
		);
		if(!empty($emp_id)){
			$this->Crud_model-> edit_record_by_anyid('employes','emp_id',$emp_id,$data);
			$notify = $this->Common_model->insert_notification($uid,'edit',$emp_id,'Employee Details Edited');
		}
		else{
			$id = $this->Crud_model->insert_record('employes',$data);
			$notify = $this->Common_model->insert_notification($uid,'insert',$id,'New Employee Registered');
		}
	}
	public function editEmployeeDetail(){
		$id = $this->input->post('id');
		$customer = $this->Common_model->get_data_by_query_pdo("select * from employes where emp_id=?",array($id));
		// print_r($customer);die;
		echo json_encode($customer);
	}


}