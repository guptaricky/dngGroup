<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ACCOUNTS extends MY_Controller {

	
	
	public function receive_ledger(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$empid = (array_slice($this->session->userdata,10,1));
		$empid = $empid['emp_id'];
		$data['emp_site'] = $this->Common_model->get_data_by_query_pdo("select emp_alloted_site from employes where emp_id=?",array($empid));
		$data['sites'] = $this->Common_model->get_data_by_query_pdo("select site_id,site_name from site_detail where 1 and site_status=?",array(1));
		$data['expense'] = $this->Common_model->get_data_by_query_pdo("select cat_id,cat_name from expense_category where 1 and cat_status=?",array(1));
		$data['bank_accounts'] = $this->Common_model->get_data_by_query_pdo("select * from company_bank_accounts ba left join bank_master bm on ba.bank_name = bm.bank_id where 1 and bank_status=?",array(1));
		$this->load->view('admin/ACCOUNTS/receive_ledger',$data); 
		$this->load->view('default_admin/footer');
	}
	
	public function addReceive_ledger(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$data = array(
		'ledger_site_id'  		=> $_POST['ledger_site_id'],
		'ledger_type' 			=> "Income",
		'ledger_receive_from'  		=> $_POST['ledger_receive_from'],
		'ledger_amount'  		=> $_POST['ledger_amount'],
		'ledger_discount'  		=> $_POST['ledger_discount'],
		'ledger_payable_amt'    => $_POST['ledger_payable_amt'],
		'ledger_paid_amt' 		=> $_POST['ledger_paid_amt'],
		'ledger_balance_amt'    => $_POST['ledger_balance_amt'],
		'ledger_payment_date'   => $_POST['ledger_payment_date'],
		'ledger_payment_type'   => $_POST['ledger_payment_type'],
		'ledger_cheque_dd_no'   => $_POST['ledger_cheque_dd_no'],
		'ledger_remark'         => $_POST['ledger_remark'],
		'ledger_status'         => 1,
		'ledger_added_by'       => $uid,
		'ledger_entrydt'        => date('Y-m-d H:i:s'),
		);
		
		$data1 = array(
		'partial_date' 			=> $_POST['ledger_payment_date'],
		'partial_type' 			=> "Income",
		'partial_site_id' 			=> $_POST['ledger_site_id'],
		'partial_amt' 			=> $_POST['ledger_paid_amt'],
		'partial_payment_type'	=> $_POST['ledger_payment_type'],
		'partial_cheque_dd_no'	=> $_POST['ledger_cheque_dd_no'],
		'partial_remark'		=> $_POST['ledger_remark'],
		'partial_status'		=> 1,
		'partial_added_by'		=> $uid,
		'partial_entrydt'		=> date('Y-m-d H:i:s'),
		);	
		
		if(!empty($_POST['ledger_id'])){
		$this->Crud_model-> edit_record_by_anyid('vendor_ledger','ledger_id',$_POST['ledger_id'],$data);
		$notify = $this->Common_model->insert_notification($uid,'edit',$id,'Receive Payment Edited');
		// $data1['partial_ledger_id']		=> $_POST['ledger_id'];
		// $this->Crud_model->edit_record_by_anyid('vendor_partial_payment','partial_ledger_id',$data1);
		}else{
		$insert_id = $this->Crud_model->insert_record('vendor_ledger',$data);
		$notify = $this->Common_model->insert_notification($uid,'insert',$insert_id,'New Receive Payment');
		$data1['partial_ledger_id']		= $insert_id;
		$this->Crud_model->insert_record('vendor_partial_payment',$data1);
		}
	}

	public function getReceive_ledger(){
		$group = $this->session->userdata('group');
		$empid = (array_slice($this->session->userdata,10,1));
		$empid = $empid['emp_id'];

		$data['emp_site'] =  $this->Common_model->get_alloted_site($empid);
		if($data['emp_site']>0){
		$site = $data['emp_site'];}
		if($group == 'admin'){
			$vendor = $this->Common_model->get_data_by_query_pdo("select l.ledger_id,l.ledger_type, l.ledger_receive_from, l.ledger_payable_amt, l.ledger_payment_date, l.ledger_remark, s.site_name from vendor_ledger l left join site_detail s on s.site_id=l.ledger_site_id where 1 and ledger_type=? and ledger_status=?",array("Income",1));
		}
		else{
			$vendor = $this->Common_model->get_data_by_query_pdo("select l.ledger_id,l.ledger_type, l.ledger_receive_from, l.ledger_payable_amt, l.ledger_payment_date, l.ledger_remark, s.site_name from vendor_ledger l left join site_detail s on s.site_id=l.ledger_site_id where ledger_site_id = ? and ledger_type=? and ledger_status=?",array($site,"Income",1));
		}
		echo json_encode($vendor);
	}
	
	
	public function editReceive_ledger(){
		$id = $this->input->post('id');
		$vendor = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where ledger_id=?",array($id));
		echo json_encode($vendor);
	}
	
	public function deleteReceive_ledger(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$id = $this->input->post('id');
		$data = array(
			'ledger_status' => 0
		);
		$data1 = array(
			'partial_status' => 0
		);
		$data3['partial_id'] = $this->Common_model->get_data_by_query_pdo("select partial_id from vendor_partial_payment where partial_ledger_id = $id",array());
			
			$partial_id = @$data3['partial_id'][0]['partial_id'];
			
		$this->Crud_model-> edit_record_by_anyid('vendor_ledger','ledger_id',$id,$data);
		$this->Crud_model-> edit_record_by_anyid('vendor_partial_payment','partial_id',$partial_id,$data1);
		$notify = $this->Common_model->insert_notification($uid,'deleted',$id,'Receive Payment Deleted');
	}

	
	public function expense_ledger(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$empid = (array_slice($this->session->userdata,10,1));
		$empid = $empid['emp_id'];
		$data['emp_site'] = $this->Common_model->get_data_by_query_pdo("select emp_alloted_site from employes where emp_id=?",array($empid));
		$data['sites'] = $this->Common_model->get_data_by_query_pdo("select site_id,site_name from site_detail where 1 and site_status=?",array(1));
		$data['expense'] = $this->Common_model->get_data_by_query_pdo("select cat_id,cat_name from expense_category where 1 and cat_status=?",array(1));
		$data['bank_accounts'] = $this->Common_model->get_data_by_query_pdo("select * from company_bank_accounts ba left join bank_master bm on ba.bank_name = bm.bank_id where 1 and bank_status=?",array(1));
		$this->load->view('admin/ACCOUNTS/expense_ledger',$data);
		$this->load->view('default_admin/footer');
	}
	
	public function addExpense_ledger(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$data = array(
		'ledger_site_id'  		=> $_POST['ledger_site_id'],
		'ledger_vendor_id' 		=> $_POST['ledger_expense_id'],
		'ledger_type' 			=> "Expense",
		'ledger_voucher_no'  	=> $_POST['ledger_voucher_no'],
		'ledger_amount'  		=> $_POST['ledger_amount'],
		'ledger_discount'  		=> $_POST['ledger_discount'],
		'ledger_payable_amt'    => $_POST['ledger_payable_amt'],
		'ledger_paid_amt' 		=> $_POST['ledger_paid_amt'],
		'ledger_balance_amt'    => $_POST['ledger_balance_amt'],
		'ledger_payment_date'   => $_POST['ledger_payment_date'],
		'ledger_payment_type'   => $_POST['ledger_payment_type'],
		'ledger_cheque_dd_no'   => $_POST['ledger_cheque_dd_no'],
		'ledger_remark'         => $_POST['ledger_remark'],
		'ledger_status'         => 1,
		'ledger_added_by'       => $uid,
		'ledger_entrydt'        => date('Y-m-d H:i:s'),
		);
		if(!empty($_FILES['ledger_voucher_image'])){
			$path = './uploads';
			if (!is_dir($path))
				mkdir($path);
			$path = './uploads/ledger_voucher_image';
			if (!is_dir($path))
				mkdir($path);

			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|png|bmp';
			$config['width'] = 50;
			$config['height'] = 50;
			$config['file_name'] = time().'_'.$_POST['ledger_voucher_no'];
			$config['file_overwrite'] = true;
			$this->load->library('upload', $config);
			$this->upload->do_upload('ledger_voucher_image');
			$data1 = array('upload_data' => $this->upload->data());
			$error = array('error' => $this->upload->display_errors());
			$data['ledger_voucher_image'] = $path . '/' . $data1['upload_data']['file_name'];
		}
		
		$data1 = array(
		'partial_date' 			=> $_POST['ledger_payment_date'],
		'partial_type' 			=> "Expense",
		'partial_site_id' 			=> $_POST['ledger_site_id'],
		'partial_amt' 			=> $_POST['ledger_paid_amt'],
		'partial_payment_type'	=> $_POST['ledger_payment_type'],
		'partial_cheque_dd_no'	=> $_POST['ledger_cheque_dd_no'],
		'partial_remark'		=> $_POST['ledger_remark'],
		'partial_status'		=> 1,
		'partial_added_by'		=> $uid,
		'partial_entrydt'		=> date('Y-m-d H:i:s'),
		);	
		
		if(!empty($_POST['ledger_id'])){
		$this->Crud_model-> edit_record_by_anyid('vendor_ledger','ledger_id',$_POST['ledger_id'],$data);
		$notify = $this->Common_model->insert_notification($uid,'edit',$_POST['ledger_id'],'Expense Edited');
		// $data1['partial_ledger_id']		=> $_POST['ledger_id'];
		// $this->Crud_model->edit_record_by_anyid('vendor_partial_payment','partial_ledger_id',$data1);
		}else{
		$insert_id = $this->Crud_model->insert_record('vendor_ledger',$data);
		$notify = $this->Common_model->insert_notification($uid,'insert',$insert_id,'New Expense');
		$data1['partial_ledger_id']		= $insert_id;
		$this->Crud_model->insert_record('vendor_partial_payment',$data1);
		}
	}

	public function getExpense_ledger(){
		$group = $this->session->userdata('group');
		$empid = (array_slice($this->session->userdata,10,1));
		$empid = $empid['emp_id'];

		$data['emp_site'] =  $this->Common_model->get_alloted_site($empid);
		if($data['emp_site']>0){
		$site = $data['emp_site'];}
		if($group == 'admin'){
			$vendor = $this->Common_model->get_data_by_query_pdo("select l.ledger_id,l.ledger_type, l.ledger_voucher_no, l.ledger_goods_name, l.ledger_payable_amt, l.ledger_payment_date, l.ledger_balance_amt, s.site_name, e.cat_name from vendor_ledger l left join site_detail s on s.site_id=l.ledger_site_id left join expense_category e on e.cat_id=l.ledger_vendor_id where 1 and ledger_type=? and ledger_status=?",array("Expense",1));
		}
		else{
			$vendor = $this->Common_model->get_data_by_query_pdo("select l.ledger_id,l.ledger_type, l.ledger_voucher_no, l.ledger_goods_name, l.ledger_payable_amt, l.ledger_payment_date, l.ledger_balance_amt, s.site_name, e.cat_name from vendor_ledger l left join site_detail s on s.site_id=l.ledger_site_id left join expense_category e on e.cat_id=l.ledger_vendor_id where ledger_site_id = ? and ledger_type=? and ledger_status=?",array($site,"Expense",1));
		}
		echo json_encode($vendor);
	}
	
	
	public function editExpense_ledger(){
		$id = $this->input->post('id');
		$vendor = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where ledger_id=?",array($id));
		echo json_encode($vendor);
	}
	
	public function deleteExpense_ledger(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$id = $this->input->post('id');
		$data = array(
			'ledger_status' => 0
		);
		$data1 = array(
			'partial_status' => 0
		);
		$data3['partial_id'] = $this->Common_model->get_data_by_query_pdo("select partial_id from vendor_partial_payment where partial_ledger_id = $id",array());
			
			$partial_id = @$data3['partial_id'][0]['partial_id'];
			
		$this->Crud_model-> edit_record_by_anyid('vendor_partial_payment','partial_id',$partial_id,$data1);		
		$this->Crud_model-> edit_record_by_anyid('vendor_ledger','ledger_id',$id,$data);
		$notify = $this->Common_model->insert_notification($uid,'deleted',$id,'Expense Deleted');
	}

	public function vendor(){
			$this->load->view('default_admin/head');
			$this->load->view('default_admin/header');
			$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
			$this->load->view('admin/ACCOUNTS/vendors');
			$this->load->view('default_admin/footer');
	}

	public function addVendor(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$data = array(
		'vendor_name' => $_POST['vendor_name'],
		'vendor_firm_name' => $_POST['vendor_firm_name'],
		'vendor_contact_no' => $_POST['vendor_contact_no'],
		'vendor_email_id' => $_POST['vendor_email_id'],
		'vendor_tin_no' => $_POST['vendor_tin_no'],
		'vendor_gstn_no' => $_POST['vendor_gstn_no'],
		'vendor_address' => $_POST['vendor_address'],
		'vendor_benificiary_name' => $_POST['vendor_benificiary_name'],
		'vendor_bank_name' => $_POST['vendor_bank_name'],
		'vendor_branch_name' => $_POST['vendor_branch_name'],
		'vendor_acc_no' => $_POST['vendor_acc_no'],
		'vendor_ifsc_code' => $_POST['vendor_ifsc_code'],
		'vendor_status' => 1,
		'vendor_added_by' => $uid,
		'vendor_entrydt' => date('Y-m-d H:i:s'),
		);	
		if(!empty($_POST['vendor_id'])){
		$this->Crud_model-> edit_record_by_anyid('vendor_master','vendor_id',$_POST['vendor_id'],$data);
		$notify = $this->Common_model->insert_notification($uid,'edited',$_POST['vendor_id'],'Vendor Edited');
		}else{
		$id = $this->Crud_model->insert_record('vendor_master',$data);
		$notify = $this->Common_model->insert_notification($uid,'insert',$id,'New Vendor Created');
		}
	}

	public function getVendor(){
		$vendor = $this->Common_model->get_data_by_query_pdo("select * from vendor_master where 1 and vendor_status=?",array(1));
		echo json_encode($vendor);
	}
	
	public function editVendor(){
		$id = $this->input->post('id');
		$vendor = $this->Common_model->get_data_by_query_pdo("select * from vendor_master where vendor_id=?",array($id));
		echo json_encode($vendor);
	}
	
	public function deleteVendor(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$id = $this->input->post('id');
		$data = array(
			'vendor_status' => 0
		);	
		$this->Crud_model-> edit_record_by_anyid('vendor_master','vendor_id',$id,$data);
		$notify = $this->Common_model->insert_notification($uid,'deleted',$id,'Vendor Deleted');
	}

	public function vendor_ledger(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$empid = (array_slice($this->session->userdata,10,1));
		$empid = $empid['emp_id'];
		$data['emp_site'] =  $this->Common_model->get_alloted_site($empid);
		// $data['emp_site'] = $this->Common_model->get_data_by_query_pdo("select emp_alloted_site from employes where emp_id=?",array($empid));
		// print_r($data['emp_site']);die;
		$data['sites'] = $this->Common_model->get_data_by_query_pdo("select site_id,site_name from site_detail where 1 and site_status=?",array(1));
		$data['vendors'] = $this->Common_model->get_data_by_query_pdo("select vendor_id,vendor_name from vendor_master where 1 and vendor_status=?",array(1));
		$this->load->view('admin/ACCOUNTS/vendor_ledger',$data);
		$this->load->view('default_admin/footer');
	}
	
	public function addVendor_ledger(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$data = array(
		'ledger_site_id'  		=> $_POST['ledger_site_id'],
		'ledger_vendor_id' 		=> $_POST['ledger_vendor_id'],
		'ledger_type' 			=> "Vendor",
		'ledger_voucher_no'  	=> $_POST['ledger_voucher_no'],
		'ledger_goods_name' 	=> $_POST['ledger_goods_name'],
		'ledger_unit' 			=> $_POST['ledger_unit'],
		'ledger_qty'   			=> $_POST['ledger_qty'],
		'ledger_rate' 			=> $_POST['ledger_rate'],
		'ledger_amount'  		=> $_POST['ledger_amount'],
		'ledger_extra_amount'  	=> $_POST['extra_amount'],
		'ledger_discount'  		=> $_POST['ledger_discount'],
		'ledger_payable_amt'    => $_POST['ledger_payable_amt'],
		'ledger_paid_amt' 		=> $_POST['ledger_paid_amt'],
		'ledger_balance_amt'    => $_POST['ledger_balance_amt'],
		'ledger_payment_date'   => $_POST['ledger_payment_date'],
		'ledger_payment_type'   => $_POST['ledger_payment_type'],
		'ledger_cheque_dd_no'   => $_POST['ledger_cheque_dd_no'],
		'ledger_remark'         => $_POST['ledger_remark'],
		'ledger_status'         => 1,
		'ledger_added_by'       => $uid,
		'ledger_entrydt'        => date('Y-m-d H:i:s'),
		);
		if(!empty($_FILES['ledger_voucher_image'])){
			$path = './uploads';
			if (!is_dir($path))
				mkdir($path);
			$path = './uploads/ledger_voucher_image';
			if (!is_dir($path))
				mkdir($path);

			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|png|bmp';
			$config['width'] = 50;
			$config['height'] = 50;
			$config['file_name'] = time().'_'.$_POST['ledger_voucher_no'];
			$config['file_overwrite'] = true;
			$this->load->library('upload', $config);
			$this->upload->do_upload('ledger_voucher_image');
			$data1 = array('upload_data' => $this->upload->data());
			$error = array('error' => $this->upload->display_errors());
			$data['ledger_voucher_image'] = $path . '/' . $data1['upload_data']['file_name'];
		}
		
		$data1 = array(
		'partial_date' 			=> $_POST['ledger_payment_date'],
		'partial_type' 			=> "Vendor",
		'partial_site_id' 			=> $_POST['ledger_site_id'],
		'partial_amt' 			=> $_POST['ledger_paid_amt'],
		'partial_payment_type'	=> $_POST['ledger_payment_type'],
		'partial_cheque_dd_no'	=> $_POST['ledger_cheque_dd_no'],
		'partial_remark'		=> $_POST['ledger_remark'],
		'partial_status'		=> 1,
		'partial_added_by'		=> $uid,
		'partial_entrydt'		=> date('Y-m-d H:i:s'),
		);	
		
		if(!empty($_POST['ledger_id'])){
		$this->Crud_model-> edit_record_by_anyid('vendor_ledger','ledger_id',$_POST['ledger_id'],$data);
		$notify = $this->Common_model->insert_notification($uid,'edited',$_POST['ledger_id'],'Vendor Payment Edited');
		// $data1['partial_ledger_id']		=> $_POST['ledger_id'];
		// $this->Crud_model->edit_record_by_anyid('vendor_partial_payment','partial_ledger_id',$data1);
		}else{
		$insert_id = $this->Crud_model->insert_record('vendor_ledger',$data);
		$data1['partial_ledger_id']		= $insert_id;
		$this->Crud_model->insert_record('vendor_partial_payment',$data1);
		$notify = $this->Common_model->insert_notification($uid,'insert',$insert_id,'New Vendor Payment Done');
		}
		
		
		
	}

	public function getVendor_ledger(){
		$query="";
		$empid = (array_slice($this->session->userdata,10,1));
		$empid = $empid['emp_id'];
		$data['emp_site'] =  $this->Common_model->get_alloted_site($empid);
		$site = $data['emp_site'];
		if($data['emp_site']!=0){
			
			$vendor = $this->Common_model->get_data_by_query_pdo("select l.ledger_id, l.ledger_voucher_no, l.ledger_goods_name, l.ledger_payable_amt, l.ledger_payment_date, l.ledger_balance_amt, s.site_name, e.cat_name from vendor_ledger l left join site_detail s on s.site_id=l.ledger_site_id left join expense_category e on e.cat_id=l.ledger_vendor_id left join vendor_master v on v.vendor_id=l.ledger_vendor_id where ledger_site_id = ? and ledger_type=? and ledger_status=?",array($site,'Vendor',1));	
		}
		else{
			$vendor = $this->Common_model->get_data_by_query_pdo("select l.ledger_id, l.ledger_voucher_no, l.ledger_goods_name, l.ledger_payable_amt, l.ledger_payment_date, l.ledger_balance_amt, s.site_name, e.cat_name, v.vendor_name from vendor_ledger l left join site_detail s on s.site_id=l.ledger_site_id left join expense_category e on e.cat_id=l.ledger_vendor_id left join vendor_master v on v.vendor_id=l.ledger_vendor_id where ledger_type=? and ledger_status=?",array('Vendor',1));
		}
		// $group = $this->session->userdata('group');
		
		// if($data['emp_site']>0){
		// $site = $data['emp_site'][0]['emp_alloted_site'];}
		// if($group == 'admin'){
		
		// $vendor = $this->Common_model->get_data_by_query_pdo("select l.ledger_id, l.ledger_voucher_no, l.ledger_goods_name, l.ledger_payable_amt, l.ledger_balance_amt, s.site_name, v.vendor_name from vendor_ledger l left join site_detail s on s.site_id=l.ledger_site_id left join vendor_master v on v.vendor_id=l.ledger_vendor_id where 1 $query and ledger_status=?",array(1));
		
		
		
		// }
		// else{
			
		// }
		// echo $this->db->last_query();die;
		echo json_encode($vendor);
	}
	
	public function editVendor_ledger(){
		$id = $this->input->post('id');
		$vendor = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where ledger_id=?",array($id));
		echo json_encode($vendor);
	}
	
	public function deleteVendor_ledger(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$id = $this->input->post('id');
		$data = array(
			'ledger_status' => 0
		);	
		$data1 = array(
			'partial_status' => 0
		);
		$data3['partial_id'] = $this->Common_model->get_data_by_query_pdo("select partial_id from vendor_partial_payment where partial_ledger_id = $id",array());
			
			$partial_id = @$data3['partial_id'][0]['partial_id'];
			
		$this->Crud_model-> edit_record_by_anyid('vendor_partial_payment','partial_id',$partial_id,$data1);		
		$this->Crud_model-> edit_record_by_anyid('vendor_ledger','ledger_id',$id,$data);
		$notify = $this->Common_model->insert_notification($uid,'deleted',$id,'Vendor Payment Deleted');
	}

	public function vendor_partial_payment(){
        $lid = $this->uri->segment(4);
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$data['ledger'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger l left join site_detail s on s.site_id=l.ledger_site_id left join vendor_master v on v.vendor_id=l.ledger_vendor_id where 1 and ledger_id=?",array($lid));
		// $data['payment'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_partial_payment where partial_ledger_id=?",array($lid));
		// $data['ledger'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where 1 and ledger_id=?",array($lid));
		// $data['vendor'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_master where 1 and vendor_id=?",array($data['ledger'][0]['ledger_vendor_id']));
		$this->load->view('admin/ACCOUNTS/vendor_partial_payment',$data);
		$this->load->view('default_admin/footer');
	}
	
	public function addVendor_partial_payment(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$data = array(
		'partial_ledger_id' 	=> $_POST['partial_ledger_id'],
		'partial_site_id' 			=> $_POST['partial_site_id'],
		'partial_date' 			=> $_POST['partial_date'],
		'partial_amt' 			=> $_POST['partial_amt'],
		'partial_type'			=> $_POST['partial_type'],
		'partial_payment_type'	=> $_POST['partial_payment_type'],
		'partial_cheque_dd_no'	=> $_POST['partial_cheque_dd_no'],
		'partial_remark'		=> $_POST['partial_remark'],
		'partial_status'		=> 1,
		'partial_added_by'		=> $uid,
		'partial_entrydt'		=> date('Y-m-d H:i:s'),
		);	
		
		if(!empty($_POST['partial_id'])){
		// $this->Crud_model-> edit_record_by_anyid('vendor_partial_payment','partial_ledger_id',$_POST['partial_ledger_id'],$data);
		// $data1['partial_ledger_id']		=> $_POST['ledger_id'];
		// $this->Crud_model->edit_record_by_anyid('vendor_partial_payment','partial_ledger_id',$data1);
		}else{
		$id = $this->Crud_model->insert_record('vendor_partial_payment',$data);
		$ledger = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where 1 and ledger_id=?",array($_POST['partial_ledger_id']));
		$amt = $ledger[0]['ledger_balance_amt'] - $_POST['partial_amt'];
		$data1['ledger_balance_amt']	= $amt;
		$this->Crud_model-> edit_record_by_anyid('vendor_ledger','ledger_id',$_POST['partial_ledger_id'],$data1);
		$notify = $this->Common_model->insert_notification($uid,'insert',$id,'New Part Payment Done');
		}
		echo $amt;
		
		
	}

	public function getVendor_partial_payment(){
		$lid = $this->input->get('lid');
		$payment = $this->Common_model->get_data_by_query_pdo("select * from vendor_partial_payment where partial_ledger_id=? and partial_status=?",array($lid,1));
		echo json_encode($payment);
	}
	
	public function editVendor_partial_payment(){
		$id = $this->input->post('id');
		$vendor = $this->Common_model->get_data_by_query_pdo("select * from vendor_partial_payment where partial_id=?",array($id));
		echo json_encode($vendor);
	}
	
	public function deleteVendor_partial_payment(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$id = $this->input->post('id');
		$data = array(
			'partial_status' => 0
		);	
		$payment = $this->Common_model->get_data_by_query_pdo("select * from vendor_partial_payment where partial_id=?",array($id));
		$ledger = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where 1 and ledger_id=?",array($payment[0]['partial_ledger_id']));
		$amt = $ledger[0]['ledger_balance_amt'] + $payment[0]['partial_amt'];
		$data1['ledger_balance_amt']	= $amt;
		$this->Crud_model-> edit_record_by_anyid('vendor_ledger','ledger_id',$ledger[0]['ledger_id'],$data1);
		$this->Crud_model-> edit_record_by_anyid('vendor_partial_payment','partial_id',$id,$data);
		$notify = $this->Common_model->insert_notification($uid,'deleted',$id,'Part Payment Deleted');
		echo $amt;
	}

	public function generateLink(){
		$data = array(
			'nav_name' => $_POST['linkname'],
			'nav_icon' => $_POST['linkicon'],
			'nav_url' => $_POST['linkurl'],
			//'nav_user' => $_POST['linkuser'],
			'nav_status' => 1
		);	
		$this->Crud_model->insert_record('nav_master',$data);
	}
		
	public function fund_transfer(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$data['sites'] = $this->Common_model->get_data_by_query_pdo("select site_id,site_name from site_detail where 1 and site_status=?",array(1));
		$data['account'] = $this->Common_model->get_data_by_query_pdo("select acc_id,acc_name from accounts where 1 and acc_status=?",array(1));
		$this->load->view('admin/ACCOUNTS/fund_transfer',$data);
		$this->load->view('default_admin/footer');
	}
	
	public function add_fund_transfer(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$transfer_amt = $_POST['transfer_amt'];
		$data = array(
		'transfer_from'			=> $_POST['transfer_from'],
		'transfer_to' 			=> $_POST['transfer_to'],
		'transfer_perpose' 		=> $_POST['transfer_perpose'],
		'transfer_date' 		=> $_POST['transfer_date'],
		'transfer_amt'			=> $transfer_amt,
		'transfer_payment_type' => $_POST['transfer_payment_type'],
		'transfer_cheque_dd_no'	=> $_POST['transfer_cheque_dd_no'],
		'transfer_type'    		=> 2,
		'transfer_remark'    	=> $_POST['transfer_remark'],
		'transfer_status'   	=> 1,
		'transfer_added_by'   	=> $uid,
		'transfer_entrydt'   	=> date('Y-m-d H:i:s'),
		);
		if(!empty($_FILES['transfer_receipt'])){
			$path = './uploads';
			if (!is_dir($path))
				mkdir($path);
			$path = './uploads/transfer_receipt';
			if (!is_dir($path))
				mkdir($path);

			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|png|bmp';
			$config['width'] = 50;
			$config['height'] = 50;
			$config['file_name'] = time().'_'.$_FILES['transfer_receipt']['name'];
			$config['file_overwrite'] = true;
			$this->load->library('upload', $config);
			$this->upload->do_upload('transfer_receipt');
			$datai = array('upload_data' => $this->upload->data());
			$error = array('error' => $this->upload->display_errors());
			$data['transfer_receipt'] = $path . '/' . $datai['upload_data']['file_name'];
		}
		$accounts = $this->Common_model->get_data_by_query_pdo("select * from accounts where 1 and acc_id=?",array($_POST['transfer_from']));
		$acc_balance = $accounts[0]['acc_balance'];
		if(!empty($_POST['transfer_id'])){
		$transfer = $this->Common_model->get_data_by_query_pdo("select * from company_account_fund_transfer where 1 and transfer_id=?",array($_POST['transfer_id']));
		$data1['acc_balance'] = ($acc_balance + $transfer[0]['transfer_amt']) - $transfer_amt;
		$this->Crud_model-> edit_record_by_anyid('company_account_fund_transfer','transfer_id',$_POST['transfer_id'],$data);
		$notify = $this->Common_model->insert_notification($uid,'edited',$_POST['transfer_id'],'Fund Transfer Edited');
		$this->Crud_model-> edit_record_by_anyid('accounts','acc_id',$_POST['transfer_to'],$data1);
		}else{
		$data1['acc_balance'] = $acc_balance - $transfer_amt;
		$id = $this->Crud_model->insert_record('company_account_fund_transfer',$data);
		$notify = $this->Common_model->insert_notification($uid,'insert',$id,'New Fund has been Transfered');
		$this->Crud_model-> edit_record_by_anyid('accounts','acc_id',$_POST['transfer_to'],$data1);
		}
	}

	public function get_fund_transfer(){
		$list=[];
		$transfer = $this->Common_model->get_data_by_query_pdo("select * from company_account_fund_transfer where 1 and transfer_status=? and transfer_type=?",array(1,2));
		foreach($transfer as $t){
		$data['transfer_id'] = $t['transfer_id'];
		$data['transfer_from'] = !empty($t['transfer_from'])?$this->Common_model->get_acc_name($t['transfer_from']):'';
		$data['transfer_to'] = $this->Common_model->get_site_name($t['transfer_to']);
		$data['transfer_perpose'] = $t['transfer_perpose'];
		$data['transfer_date'] = $t['transfer_date'];
		$data['transfer_amt'] = $t['transfer_amt'];
		$data['transfer_remark'] = $t['transfer_remark'];
		$list[]=$data;
		}
		echo json_encode(array('list'=>$list));
		exit();
	}
	
	public function edit_fund_transfer(){
		$id = $this->input->post('id');
		$transfer = $this->Common_model->get_data_by_query_pdo("select * from company_account_fund_transfer where transfer_id=?",array($id));
		echo json_encode($transfer);
	}
	
	public function delete_fund_transfer(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$id = $this->input->post('id');
		$data = array(
			'transfer_status' => 0
		);	
		$this->Crud_model-> edit_record_by_anyid('company_account_fund_transfer','transfer_id',$id,$data);
		$notify = $this->Common_model->insert_notification($uid,'deleted',$id,'Fund Transfer Deleted');			
	}	
	
	public function account_balance(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$data['sites'] = $this->Common_model->get_data_by_query_pdo("select site_id,site_name from site_detail where 1 and site_status=?",array(1));
		$data['account'] = $this->Common_model->get_data_by_query_pdo("select acc_id,acc_name from accounts where 1 and acc_status=?",array(1));
		$this->load->view('admin/ACCOUNTS/add_balance',$data);
		$this->load->view('default_admin/footer');
	}
	
	public function add_balance_to_account(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];		
		$transfer_amt = $_POST['transfer_amt'];
		$data = array(
		'transfer_from'			=> '0',
		'transfer_to' 			=> $_POST['transfer_to'],
		'transfer_perpose' 		=> $_POST['transfer_perpose'],
		'transfer_date' 		=> $_POST['transfer_date'],
		'transfer_amt'			=> $transfer_amt,
		'transfer_payment_type' => $_POST['transfer_payment_type'],
		'transfer_cheque_dd_no'	=> $_POST['transfer_cheque_dd_no'],
		'transfer_type'    		=> 1,
		'transfer_remark'    	=> $_POST['transfer_remark'],
		'transfer_status'   	=> 1,
		'transfer_added_by'   	=> $uid,
		'transfer_entrydt'   	=> date('Y-m-d H:i:s'),
		);
		if(!empty($_FILES['transfer_receipt'])){
			$path = './uploads';
			if (!is_dir($path))
				mkdir($path);
			$path = './uploads/transfer_receipt';
			if (!is_dir($path))
				mkdir($path);

			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|png|bmp';
			$config['width'] = 50;
			$config['height'] = 50;
			$config['file_name'] = time().'_'.$_FILES['transfer_receipt']['name'];
			$config['file_overwrite'] = true;
			$this->load->library('upload', $config);
			$this->upload->do_upload('transfer_receipt');
			$datai = array('upload_data' => $this->upload->data());
			$error = array('error' => $this->upload->display_errors());
			$data['transfer_receipt'] = $path . '/' . $datai['upload_data']['file_name'];
		}
		$accounts = $this->Common_model->get_data_by_query_pdo("select * from accounts where 1 and acc_id=?",array($_POST['transfer_to']));
		$acc_balance = $accounts[0]['acc_balance'];
		if(!empty($_POST['transfer_id'])){
		// $transfer = $this->Common_model->get_data_by_query_pdo("select * from company_account_fund_transfer where 1 and transfer_id=?",array($_POST['transfer_id']));
		// $data1['acc_balance'] = ($acc_balance + $transfer[0]['transfer_amt']) - $transfer_amt;
		// $this->Crud_model-> edit_record_by_anyid('company_account_fund_transfer','transfer_id',$_POST['transfer_id'],$data);
		// $this->Crud_model-> edit_record_by_anyid('accounts','acc_id',$_POST['transfer_to'],$data1);
		}else{
		$data1['acc_balance'] = $acc_balance + $transfer_amt;
		$id = $this->Crud_model->insert_record('company_account_fund_transfer',$data);
		$notify = $this->Common_model->insert_notification($uid,'insert',$id,'Balance Edited');	
		$this->Crud_model-> edit_record_by_anyid('accounts','acc_id',$_POST['transfer_to'],$data1);
		}
	}

	public function get_balance_to_account(){
		$list=[];
		$transfer = $this->Common_model->get_data_by_query_pdo("select * from company_account_fund_transfer where 1 and transfer_status=? and transfer_type=?",array(1,1));
		foreach($transfer as $t){
		$data['transfer_id'] = $t['transfer_id'];
		$data['transfer_to'] = !empty($t['transfer_to'])?$this->Common_model->get_acc_name($t['transfer_to']):'';
		$data['transfer_perpose'] = $t['transfer_perpose'];
		$data['transfer_date'] = $t['transfer_date'];
		$data['transfer_amt'] = $t['transfer_amt'];
		$data['transfer_remark'] = $t['transfer_remark'];
		$list[]=$data;
		}
		echo json_encode(array('list'=>$list));
		exit();
	}
	
	public function edit_balance_to_account(){
		$id = $this->input->post('id');
		$transfer = $this->Common_model->get_data_by_query_pdo("select * from company_account_fund_transfer where transfer_id=?",array($id));
		echo json_encode($transfer);
	}
	
	public function delete_balance_to_account(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];			
		$id = $this->input->post('id');
		$data = array(
			'transfer_status' => 0
		);	
		$this->Crud_model-> edit_record_by_anyid('company_account_fund_transfer','transfer_id',$id,$data);
		$notify = $this->Common_model->insert_notification($uid,'deleted',$id,'Balance Deleted');
	}
	
	////STARTS ACCOUNT DETAILS///
	public function add_account(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$this->load->view('admin/ACCOUNTS/add_accounts');
		$this->load->view('default_admin/footer');
	}
	
	public function insert_account(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$data = array(
		'acc_name'			=> $_POST['acc_name'],
		'acc_short_name' 			=> $_POST['acc_short_name']
		);
		
		
		if(!empty($_POST['acc_id'])){
		$this->Crud_model-> edit_record_by_anyid('accounts','acc_id',$_POST['acc_id'],$data);
		$notify = $this->Common_model->insert_notification($uid,'edit',$_POST['acc_id'],'Account Edited');
		}else{
		$id = $this->Crud_model->insert_record('accounts',$data);
		$notify = $this->Common_model->insert_notification($uid,'insert',$id,'Account Created');
		}
	}

	public function get_account(){
		$accounts = $this->Common_model->get_data_by_query_pdo("select * from accounts where 1 and acc_status=?",array(1));
		
		echo json_encode($accounts);
		exit();
	}
	
	public function edit_account(){
		$id = $this->input->post('id');
		$accounts = $this->Common_model->get_data_by_query_pdo("select * from accounts where acc_id=?",array($id));
		echo json_encode($accounts);
	}
	
	public function delete_account(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$id = $this->input->post('id');
		$data = array(
			'acc_status' => 0
		);	
		$this->Crud_model-> edit_record_by_anyid('accounts','acc_id',$id,$data);
		$notify = $this->Common_model->insert_notification($uid,'deleted',$id,'Account Deleted');
	}
	////END ACCOUNT DETAILS///
	
		
	public function account_transections(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$data['sites'] = $this->Common_model->get_data_by_query_pdo("select site_id,site_name from site_detail where 1 and site_status=?",array(1));
		$data['account'] = $this->Common_model->get_data_by_query_pdo("select acc_id,acc_name from accounts where 1 and acc_status=?",array(1));
		$this->load->view('admin/ACCOUNTS/fund_transfer',$data);
		$this->load->view('default_admin/footer');
	}
	
	public function add_account_balance(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$transfer_amt = $_POST['transfer_amt'];
		$data = array(
		'transfer_to' 			=> $_POST['transfer_to'],
		'transfer_date' 		=> $_POST['transfer_date'],
		'transfer_amt'			=> $transfer_amt,
		'transfer_type'    		=> 1,
		'transfer_remark'    	=> $_POST['transfer_remark'],
		'transfer_status'   	=> 1,
		'transfer_added_by'   	=> $uid,
		'transfer_entrydt'   	=> date('Y-m-d H:i:s'),
		);
		$accounts = $this->Common_model->get_data_by_query_pdo("select * from accounts where 1 and acc_id=?",array($_POST['transfer_from']));
		$acc_balance = $accounts[0]['acc_balance'];
		if(!empty($_POST['transfer_id'])){
		$transfer = $this->Common_model->get_data_by_query_pdo("select * from company_account_fund_transfer where 1 and transfer_id=?",array($_POST['transfer_id']));
		$data1['acc_balance'] = ($acc_balance + $transfer[0]['transfer_amt']) - $transfer_amt;
		$this->Crud_model-> edit_record_by_anyid('company_account_fund_transfer','transfer_id',$_POST['transfer_id'],$data);
		$this->Crud_model-> edit_record_by_anyid('accounts','acc_id',$_POST['transfer_to'],$data1);
		$notify = $this->Common_model->insert_notification($uid,'edit',$_POST['transfer_id'],'Account Balance Edited');
		}else{
		$data1['acc_balance'] = $acc_balance - $transfer_amt;
		$id = $this->Crud_model->insert_record('company_account_fund_transfer',$data);
		$this->Crud_model-> edit_record_by_anyid('accounts','acc_id',$_POST['transfer_to'],$data1);
		$notify = $this->Common_model->insert_notification($uid,'insert',$id,'New Account Balance');
		}
	}

	public function get_account_transection(){
		$list=[];
		$transfer = $this->Common_model->get_data_by_query_pdo("select * from company_account_fund_transfer where 1 and transfer_status=?",array(1));
		foreach($transfer as $t){
		$data['transfer_id'] = $t['transfer_id'];
		$data['transfer_from'] = !empty($t['transfer_from'])?$this->Common_model->get_acc_name($t['transfer_from']):'';
		$data['transfer_to'] = $this->Common_model->get_site_name($t['transfer_to']);
		$data['transfer_perpose'] = $t['transfer_perpose'];
		$data['transfer_date'] = $t['transfer_date'];
		$data['transfer_amt'] = $t['transfer_amt'];
		$data['transfer_remark'] = $t['transfer_remark'];
		$list[]=$data;
		}
		echo json_encode(array('list'=>$list));
		exit();
	}
	
	public function edit_account_transection(){
		$id = $this->input->post('id');
		$transfer = $this->Common_model->get_data_by_query_pdo("select * from company_account_fund_transfer where transfer_id=?",array($id));
		echo json_encode($transfer);
	}
	
	public function delete_account_transection(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$id = $this->input->post('id');
		$data = array(
			'transfer_status' => 0
		);	
		$this->Crud_model-> edit_record_by_anyid('company_account_fund_transfer','transfer_id',$id,$data);
		$notify = $this->Common_model->insert_notification($uid,'deleted',$id,'Account Transaction Deleted');
	}
	
	public function get_balance(){		
		$userid = (array_slice($this->session->userdata, 10, 1));
		$uid = $userid['emp_id'];
		$balance = 0;
		$transfer_amt = 0;
		$expense_amt = 0;
		$employee = @$this->Common_model->get_alloted_site($uid);
		if($employee!=0){
		$transfer = $this->Common_model->get_data_by_query_pdo("select * from company_account_fund_transfer where transfer_to=?",array($employee));
		foreach($transfer as $t){
			$transfer_amt = $transfer_amt + $t['transfer_amt'];
		}
		$expense = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where ledger_site_id=? and ledger_status = ?",array($employee,1));
		// print_r($expense);die;
		// echo $transfer_amt;die;
		
		foreach($expense as $e){
			// $expense_amt = $expense_amt + $expense[0]['ledger_payable_amt'];
		$partial_paid = $this->Common_model->get_data_by_query_pdo("select * from vendor_partial_payment where partial_ledger_id=? and partial_status = ?",array($e['ledger_id'],1));
			foreach($partial_paid as $paid){
			$expense_amt = $expense_amt + $paid['partial_amt'];
		}
		}
		// echo $expense_amt;die;
		$balance = $transfer_amt - $expense_amt;
		}
		echo $balance;
	}

	public function getReports(){		
		
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$userid = (array_slice($this->session->userdata, 10, 1));
		$uid = $userid['emp_id'];
		$alloted_site = @$this->Common_model->get_alloted_site($uid);
		if($alloted_site!=0){
		$data['transactions'] = $this->Common_model->get_data_by_query_pdo("select * from company_account_fund_transfer where transfer_to=?",array($alloted_site));
		// echo $this->db->last_query();die;
		$this->load->view('admin/ACCOUNTS/getReports',$data);
		$this->load->view('default_admin/footer');
		
		}	
		
	}
		
	public function reports(){		
		
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$userid = (array_slice($this->session->userdata, 10, 1));
		$uid = $userid['emp_id'];
		$alloted_site = @$this->Common_model->get_alloted_site($uid);
		$group = $this->session->userdata('group');
		$data['sites'] = $this->Common_model->get_data_by_query_pdo("select site_id,site_name from site_detail where 1 and site_status=?",array(1));
		if($group == 'admin'){
			$data['transactions'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_partial_payment
			where partial_status=?",array(1));
		}
		else{
			$data['transactions'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_partial_payment
			where partial_status=? and partial_site_id=?",array(1,$alloted_site));
		}
		$this->load->view('admin/ACCOUNTS/reports',$data);
		$this->load->view('default_admin/footer');
		
	}
		
	public function ledgerSiteWise(){		
		$site_id = $this->input->post('site_id');
		$fromdate = date("Y-m-d", strtotime($this->input->post('fromdate')));
		$todate = date("Y-m-d", strtotime($this->input->post('todate')));
		if($fromdate == "1970-01-01")$fromdate='';
		if($todate == "1970-01-01")$todate='';
		
		$querry = '';
		if($fromdate !='' and $todate != '' )
		{
			$querry .= " and date_format(partial_date,'%Y-%m-%d') between '$fromdate' and '$todate'";	
		}
		// echo $site_id;
		if($site_id!=''){
		$data['transactions'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_partial_payment
			where partial_status=? and partial_site_id=? $querry",array(1,$site_id));
		}
		else{
			$data['transactions'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_partial_payment
			where partial_status=? $querry",array(1));
		}
		// echo $this->db->last_query();
		// die;
		$sno=0;
		$creditTotal = 0;
		$debitTotal = 0;
		foreach ($data['transactions'] as $ctm):$sno++;?>
		<tr align="left" title="<?php echo $ctm['partial_remark'];?>">
		<td><?php echo $sno;?>.</td>
		<td><?php echo sprintf("%04d",$ctm['partial_id']);?></td>
		<td><?php echo $this->Common_model->findfield('site_detail', 'site_id', $ctm['partial_site_id'], 'site_name');?></td>
		<td><?php echo $ctm['partial_type'];?></td>
		<td><?php echo $ctm['partial_payment_type'];?></td>
		<td><?php echo $ctm['partial_date'];?></td>
		<td align="right"><?php if($ctm['partial_type']=='Income'){echo $ctm['partial_amt'];$creditTotal += $ctm['partial_amt'];}?></td>
		<td align="right"><?php if($ctm['partial_type']=='Expense' || $ctm['partial_type']=='Vendor' ){echo $ctm['partial_amt'];$debitTotal += $ctm['partial_amt'];}?></td>
		</tr>
		<?php endforeach;?>
		<tr align="left">
		<td colspan="5"></td>
		<td align="right"><b>Total : </b></td>
		<td align="right"><b><?php echo number_format($creditTotal,2);?></b></td>
		<td align="right"><b><?php echo number_format($debitTotal,2);?></b></td>
		</tr>
		<?php	
	}
	
	//only for updation of site id in partial table (one time use)
	public function do_site_id_in_partial(){		
		
		$data['transactions'] = $this->Common_model->get_data_by_query_pdo("select partial_ledger_id from vendor_partial_payment where 1",array());
			// echo $this->db->last_query();die;
		foreach($data['transactions'] as $tran){
			$ledger_id = $tran['partial_ledger_id'];
			$data['siteids'] = $this->Common_model->get_data_by_query_pdo("select ledger_site_id from vendor_ledger where ledger_id = $ledger_id",array());
			
			@$data1['partial_site_id'] = @$data['siteids'][0]['ledger_site_id'];
			echo $ledger_id.'--'.$data1['partial_site_id'];
			echo "</br>";
			// $this->Crud_model-> edit_record_by_anyid('vendor_partial_payment','partial_ledger_id',$ledger_id,$data1);
		}
		
		
	}
	//UPDATE status in partial table as in vendor_ledger (one time use)
	public function update_status_in_partial(){		
		
		$data['transactions'] = $this->Common_model->get_data_by_query_pdo("select ledger_id from vendor_ledger where ledger_status = 1",array());
			// echo $this->db->last_query();die;
		foreach($data['transactions'] as $tran){
			$ledger_id = $tran['ledger_id'];
			$data['partial_id'] = $this->Common_model->get_data_by_query_pdo("select partial_id from vendor_partial_payment where partial_ledger_id = $ledger_id",array());
			
			$partial_id = @$data['partial_id'][0]['partial_id'];
			$data1['partial_status'] = 1;
			// echo $ledger_id.'--'.$data1['partial_site_id'];
			// echo "</br>";
			$this->Crud_model-> edit_record_by_anyid('vendor_partial_payment','partial_id',$partial_id,$data1);
		}
	}

	
}