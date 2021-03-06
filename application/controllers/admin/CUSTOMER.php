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
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$cust_id = $_POST['cust_id'];
		$data = array(
			'cust_fname' => ucwords(strtoupper($_POST['fname'])),
			'cust_lname' => ucwords(strtoupper($_POST['lname'])),
			'cust_address' => $_POST['address'],
			'cust_city' => $_POST['city'],
			'cust_state' => $_POST['state'],
			'cust_pincode' => $_POST['code'],
			'cust_phone1' => $_POST['phone1'],
			'cust_phone2' => $_POST['phone2'],
			'cust_additional_info' => $_POST['info'],
			'cust_email' => $_POST['email'],
			'cust_aadhar' => $_POST['aadhar'],
			'cust_pan' => strtoupper($_POST['pan']),
			'cust_user' => $uid
		);
		if(!empty($cust_id)){
			$this->Crud_model-> edit_record_by_anyid('customers','cust_id',$cust_id,$data);
			$notify = $this->Common_model->insert_notification($uid,'edit',$cust_id,'Customer Details Edited');	
		}
		else{
			$id = $this->Crud_model->insert_record('customers',$data);
			$notify = $this->Common_model->insert_notification($uid,'insert',$id,'New Customer Entry');	
		}
		
	}
	public function editCustomerDetail(){
		$id = $this->input->post('id');
		$customer = $this->Common_model->get_data_by_query_pdo("select * from customers where cust_id=?",array($id));
		echo json_encode($customer);
	}
	public function addCustomerSellProperty(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		// echo $_POST['cust_id'];die;
		$data = array(
			'cust_fname' => ucwords(strtolower($_POST['fname'])),
			'cust_lname' => ucwords(strtolower($_POST['lname'])),
			'cust_address' => $_POST['address'],
			'cust_city' => $_POST['city'],
			'cust_state' => $_POST['state'],
			'cust_pincode' => $_POST['code'],
			'cust_phone1' => $_POST['phone1'],
			'cust_phone2' => $_POST['phone2'],
			'cust_additional_info' => $_POST['info'],
			'cust_email' => $_POST['email'],
			'cust_aadhar' => $_POST['aadhar'],
			'cust_pan' => strtoupper($_POST['pan']),
			'cust_user' => $uid
		);

		$data_prop_update = array(
			'property_status' => 'Sold',
		);
		
		$customer = 0;
		// echo $_POST['prop_id'];
		// die;
		if(!empty($_POST['cust_id'])){
		$this->Crud_model->edit_record_by_anyid('customers','cust_id',$_POST['cust_id'],$data);
		$notify = $this->Common_model->insert_notification($uid,'edit',$_POST['cust_id'],'Customer Details Edited & property sold');	
		$customer = $_POST['cust_id'];
		echo 'Customer Details Edited & property sold';
		}else{
		$id = $this->Crud_model->insert_record('customers',$data);
		$notify = $this->Common_model->insert_notification($uid,'insert',$id,'New Customer Entry');	
		$cust = $this->Common_model->get_data_by_query_pdo("select max(cust_id) as cust_id from customers",array(0));
		$customer = $cust[0]['cust_id'];
		echo 'New Customer Entry & property sold';
		}
		
		$data_prop = array(
			'prop_id' => $_POST['prop_id'],
			'prop_booking_date' => date('Y-m-d',strtotime($_POST['booking_date'])),
			//'prop_sold_to' => strtoupper($_POST['prop_sold_to']),
			'prop_name' => strtoupper($_POST['propertyname']),
			'prop_no' => strtoupper($_POST['propertyNo']),
			'prop_area' => $_POST['area'],
			'prop_carper_area' => $_POST['carpetarea'],
			'prop_buildup_area' => $_POST['builduparea'],
			'prop_type' => strtoupper($_POST['propertytype']),
			'prop_sold_to' => $customer,
			'prop_price' => $_POST['actualprice'],
			'prop_sell_price' => $_POST['sellprice'],
			'prop_discount' => $_POST['discount'],
			'prop_booking_amt' => $_POST['booking_amt'],
			'prop_paid_amt' => $_POST['booking_amt'],
			'prop_remaining_amt' => $_POST['remaining_amt'],
			'prop_payment_mode' => $_POST['payment_mode'],
			'prop_emi_duration' => $_POST['emi_duration'],
			'prop_emi_amount' => $_POST['emi_amount'],
			'prop_finance_by_bank' => $_POST['prop_finance_by_bank'],
			'prop_remark' => $_POST['prop_remark'],
			'prop_entrydt' => date('Y-m-d H:i:s'),
			'prop_status' => 1,
		);
		
		if(!empty($_POST['prop_detail_id'])){
		$this->Crud_model->edit_record_by_anyid('property_other_detail','prop_detail_id',$_POST['prop_detail_id'],$data_prop);
		$notify = $this->Common_model->insert_notification($uid,'edit',$_POST['prop_detail_id'],'Property Sold Edited');
		$this->Crud_model->edit_record_by_anyid('property_detail','property_id',$_POST['prop_id'],$data_prop_update);
		echo 'Property Sold Updated';
		}else{
		// $this->Crud_model->insert_record('property_detail',$data_prop_sold);
		$id = $this->Crud_model->insert_record('property_other_detail',$data_prop);
		$this->Crud_model->edit_record_by_anyid('property_detail','property_id',$_POST['prop_id'],$data_prop_update);
		echo 'New Property Sold';
		// echo $this->db->last_query();
		$notify = $this->Common_model->insert_notification($uid,'insert',$id,'Property Sold');
		// echo $this->db->last_query();
		// die;
		}
	}
	
	public function editPropertySell(){
		$id = $this->input->post('id');
		$data['property'] = $this->Common_model->get_data_by_query_pdo("select * from property_other_detail pod 
		left join property_detail pd on pd.property_id = pod.prop_id
		left join customers c on c.cust_id = pod.prop_sold_to
 		where pod.prop_id=?",array($id));
		// echo $this->db->last_query();die;
		$this->load->view('admin/CUSTOMER/edit_site_property',$data);
	}

	
	public function updateCustomerSellProperty(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$data = array(
			'cust_fname' => ucwords(strtolower($_POST['fname'])),
			'cust_lname' => ucwords(strtolower($_POST['lname'])),
			'cust_address' => $_POST['address'],
			'cust_city' => $_POST['city'],
			'cust_state' => $_POST['state'],
			'cust_pincode' => $_POST['code'],
			'cust_phone1' => $_POST['phone1'],
			'cust_phone2' => $_POST['phone2'],
			'cust_additional_info' => $_POST['info'],
			'cust_email' => $_POST['email'],
			'cust_aadhar' => $_POST['aadhar'],
			'cust_pan' => strtoupper($_POST['pan']),
		);
		// print_r($data);die;
		$this->Crud_model->edit_record_by_anyid('customers','cust_id',$_POST['cust_id'],$data);
		$notify = $this->Common_model->insert_notification($uid,'edit',$_POST['cust_id'],'Customer Details Edited by Property Sold Edit');
		
		// $cust = $this->Common_model->get_data_by_query_pdo("select max(cust_id) as cust_id from customers",array(0));
		$data_prop = array(
			'prop_id' => $_POST['prop_id'],
			'prop_booking_date' => date('Y-m-d',strtotime($_POST['booking_date'])),
			//'prop_sold_to' => strtoupper($_POST['prop_sold_to']),
			'prop_name' => strtoupper($_POST['propertyname']),
			'prop_no' => strtoupper($_POST['propertyNo']),
			'prop_area' => $_POST['area'],
			'prop_carper_area' => $_POST['carpetarea'],
			'prop_buildup_area' => $_POST['builduparea'],
			'prop_type' => strtoupper($_POST['propertytype']),
			// 'prop_sold_to' => $cust[0]['cust_id'],
			'prop_price' => $_POST['actualprice'],
			'prop_sell_price' => $_POST['sellprice'],
			'prop_discount' => $_POST['discount'],
			'prop_booking_amt' => $_POST['booking_amt'],
			'prop_paid_amt' => $_POST['booking_amt'],
			'prop_remaining_amt' => $_POST['remaining_amt'],
			'prop_payment_mode' => $_POST['payment_mode'],
			'prop_emi_duration' => $_POST['emi_duration'],
			'prop_emi_amount' => $_POST['emi_amount'],
			'prop_finance_by_bank' => $_POST['prop_finance_by_bank'],
			'prop_remark' => $_POST['prop_remark'],
		);
		
		
		// $this->Crud_model->insert_record('property_detail',$data_prop_sold);
		$this->Crud_model->edit_record_by_anyid('property_other_detail','prop_detail_id',$_POST['prop_detail_id'],$data_prop);
		$notify = $this->Common_model->insert_notification($uid,'edit',$_POST['prop_detail_id'],'Property Sold Edited');
		// echo $this->db->last_query();
		// die;
		
	}
	
	public function CustomerEmi_payment(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$this->load->view('admin/CUSTOMER/customer_emi_payment');
		$this->load->view('default_admin/footer');	
	}
	
	public function emi_payment_detail(){
        $lid = $this->uri->segment(4);
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$data['property'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger l left join site_detail s on s.site_id=l.ledger_site_id left join vendor_master v on v.vendor_id=l.ledger_vendor_id where 1 and ledger_id=?",array($lid));
		// $data['payment'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_partial_payment where partial_ledger_id=?",array($lid));
		// $data['ledger'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where 1 and ledger_id=?",array($lid));
		// $data['vendor'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_master where 1 and vendor_id=?",array($data['ledger'][0]['ledger_vendor_id']));
		$this->load->view('admin/ACCOUNTS/vendor_partial_payment',$data);
		$this->load->view('default_admin/footer');
	}
	
	public function addEmi_payment(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$data = array(
		'emi_prop_detail_id' 	=> $_POST['emi_prop_detail_id'],
		'emi_date' 			=> $_POST['emi_date'],
		'emi_amt' 			=> $_POST['emi_amt'],
		// 'emi_number'			=> $_POST['emi_number'],
		'emi_payment_type'	=> $_POST['emi_payment_type'],
		'emi_cheque_dd_no'	=> $_POST['emi_cheque_dd_no'],
		'emi_remark'		=> $_POST['emi_remark'],
		'emi_status'		=> 1,
		'emi_added_by'		=> $uid,
		'emi_entrydt'		=> date('Y-m-d H:i:s'),
		);	
		
		$property = $this->Common_model->get_data_by_query_pdo("select * from property_other_detail where 1 and prop_detail_id=?",array($_POST['emi_prop_detail_id']));
		$remaining = $property[0]['prop_remaining_amt'];
		$paid = $property[0]['prop_paid_amt'];
		
		if(!empty($_POST['emi_id'])){
		$emi = $this->Common_model->get_data_by_query_pdo("select * from customer_emi_payment where 1 and emi_id=?",array($_POST['emi_id']));
		$emi_amt = $emi[0]['emi_amt'];
		$remaining_amt = ($remaining + $emi_amt) - $_POST['emi_amt'];
		$paid_amt = ($paid - $emi_amt) + $_POST['emi_amt'];
		
		$this->Crud_model->edit_record_by_anyid('customer_emi_payment','emi_id',$_POST['emi_id'],$data);
		$data1['prop_paid_amt'] = $paid_amt;
		$data1['prop_remaining_amt'] = $remaining_amt;
		$this->Crud_model->edit_record_by_anyid('property_other_detail','prop_detail_id',$_POST['emi_prop_detail_id'],$data1);
		$notify = $this->Common_model->insert_notification($uid,'edit',$_POST['emi_id'],'Emi Payment Edited');	
		}else{
		$id = $this->Crud_model->insert_record('customer_emi_payment',$data);
		$remaining_amt = $remaining - $_POST['emi_amt'];
		$paid_amt = $paid + $_POST['emi_amt'];
		$data1['prop_paid_amt'] = $paid_amt;
		$data1['prop_remaining_amt'] = $remaining_amt;
		$this->Crud_model->edit_record_by_anyid('property_other_detail','prop_detail_id',$_POST['emi_prop_detail_id'],$data1);
		$notify = $this->Common_model->insert_notification($uid,'insert',$id,'Emi Payment done');	
		}
		echo $amt;
		
		
	}

	public function getEmi_payment_detail(){
		$lid = $this->input->get('lid');
		$payment = $this->Common_model->get_data_by_query_pdo("select * from customer_emi_payment where emi_prop_detail_id=? and emi_status=?",array($lid,1));
		echo json_encode($payment);
	}
	
	public function editEmi_payment(){
		$id = $this->input->post('id');
		$emi = $this->Common_model->get_data_by_query_pdo("select * from customer_emi_payment where emi_id=?",array($id));
		echo json_encode($emi);
	}
	
	public function deleteEmi_payments(){
		$id = $this->input->post('id');
		$data = array(
			'emi_status' => 0
		);
	}
	
	public function customer_ledger(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$data['customer_ids'] = $this->Common_model->get_data_by_query_pdo("select DISTINCT(prop_sold_to) as c_id,prop_remaining_amt from property_other_detail where 1 and prop_status=?",array(1));
		$this->load->view('admin/CUSTOMER/customer_ledger',$data);
		$this->load->view('default_admin/footer');
	}
	
	public function customers_ledger_detail(){
        $cid = $this->uri->segment(4);
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$data['customer'] = $this->Common_model->get_data_by_query_pdo("select * from customers where 1 and cust_id=?",array($cid));
		$data['propdetails'] = $this->Common_model->get_data_by_query_pdo("select * from property_other_detail where 1 and prop_sold_to=?",array($cid));
		$this->load->view('admin/CUSTOMER/customer_ledger_detail',$data);
		$this->load->view('default_admin/footer');
	}
	
}