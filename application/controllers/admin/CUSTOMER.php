<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CUSTOMER extends MY_Controller {

	public function view_customers(){
		// echo $group = $this->session->userdata('group');die;
		// print_r($this->Common_model->toggle_sidebar());die;
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$data['customers'] = $this->Common_model->get_data_by_query_pdo("select * from customers where cust_active = 1 ",array());
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
		// $userid = (array_slice($this->session->userdata, 9, 1));
		// $uid = $userid['user_id'];
		$cust_id = $_POST['cust_id'];
		$data = array(
			'cust_fname' => ucwords(strtoupper($_POST['fname'])),
			'cust_lname' => ucwords(strtoupper($_POST['lname'])),
			'cust_address' => $_POST['address'],
			'cust_city' => $_POST['city'],
			'cust_state' => $_POST['state'],
			'cust_pincode' => $_POST['code'],
			'cust_phone' => $_POST['phone'],
			'cust_additional_info' => $_POST['info'],
			'cust_email' => $_POST['email'],
			'cust_aadhar' => $_POST['aadhar'],
			'cust_pan' => strtoupper($_POST['pan']),
			'cust_user' => 1
		);
		if(!empty($cust_id)){
			$this->Crud_model-> edit_record_by_anyid('customers','cust_id',$cust_id,$data);
		}
		else{
			$this->Crud_model->insert_record('customers',$data);
		}
		
	}
	public function editCustomerDetail(){
		$id = $this->input->post('id');
		$customer = $this->Common_model->get_data_by_query_pdo("select * from customers where cust_id=?",array($id));
		echo json_encode($customer);
	}
	public function addCustomerSellProperty(){
		$userid = (array_slice($this->session->userdata, 9, 1));
		// $uid = $userid['user_id'];
		$data = array(
			'cust_fname' => ucwords(strtolower($_POST['fname'])),
			'cust_lname' => ucwords(strtolower($_POST['lname'])),
			'cust_address' => $_POST['address'],
			'cust_city' => $_POST['city'],
			'cust_state' => $_POST['state'],
			'cust_pincode' => $_POST['code'],
			'cust_phone' => $_POST['phone'],
			'cust_additional_info' => $_POST['info'],
			'cust_email' => $_POST['email'],
			'cust_aadhar' => $_POST['aadhar'],
			'cust_pan' => strtoupper($_POST['pan']),
			'cust_user' => 1
		);

		

		$data_prop_update = array(
			'property_status' => 'Sold',
		);
		
		
		// echo $_POST['prop_id'];
		// die;
		if(!empty($_POST['cust_id'])){
		$this->Crud_model->edit_record_by_anyid('customers','cust_id',$_POST['cust_id'],$data);
		}else{
		$this->Crud_model->insert_record('customers',$data);
		}
		$cust = $this->Common_model->get_data_by_query_pdo("select max(cust_id) as cust_id from customers",array(0));
		$data_prop = array(
			'prop_id' => $_POST['prop_id'],
			'prop_booking_date' => date('Y-m-d',strtotime($_POST['bookingDate'])),
			//'prop_sold_to' => strtoupper($_POST['prop_sold_to']),
			'prop_name' => strtoupper($_POST['propertyname']),
			'prop_no' => strtoupper($_POST['propertyNo']),
			'prop_area' => $_POST['area'],
			'prop_carper_area' => $_POST['carpetarea'],
			'prop_buildup_area' => $_POST['builduparea'],
			'prop_type' => strtoupper($_POST['propertytype']),
			'prop_sold_to' => $cust[0]['cust_id'],
			'prop_price' => $_POST['actualprice'],
			'prop_sell_price' => $_POST['sellprice'],
			'prop_discount' => $_POST['discount'],
			'prop_status' => 1,
		);
		
		
		// $this->Crud_model->insert_record('property_detail',$data_prop_sold);
		$this->Crud_model->insert_record('property_other_detail',$data_prop);
		$this->Crud_model->edit_record_by_anyid('property_detail','property_id',$_POST['prop_id'],$data_prop_update);
		// echo $this->db->last_query();
		// die;
		
		
		
	}

}