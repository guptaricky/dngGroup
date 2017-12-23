<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ACCOUNTS extends MY_Controller {

	public function vendor(){
			$this->load->view('default_admin/head');
			$this->load->view('default_admin/header');
			$this->load->view('default_admin/sidebar');
			$this->load->view('admin/ACCOUNTS/vendors');
			$this->load->view('default_admin/footer');
	}

	public function addVendor(){
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
		'vendor_added_by' => 1,
		'vendor_entrydt' => date('Y-m-d H:i:s'),
		);	
		if(!empty($_POST['vendor_id'])){
		$this->Crud_model-> edit_record_by_anyid('vendor_master','vendor_id',$_POST['vendor_id'],$data);
		}else{
		$this->Crud_model->insert_record('vendor_master',$data);
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
		$id = $this->input->post('id');
		$data = array(
			'vendor_status' => 0
		);	
		$this->Crud_model-> edit_record_by_anyid('vendor_master','vendor_id',$id,$data);
	}

	public function vendor_ledger(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$data['sites'] = $this->Common_model->get_data_by_query_pdo("select site_id,site_name from site_detail where 1 and site_status=?",array(1));
		$data['vendors'] = $this->Common_model->get_data_by_query_pdo("select vendor_id,vendor_name from vendor_master where 1 and vendor_status=?",array(1));
		$this->load->view('admin/ACCOUNTS/vendor_ledger',$data);
		$this->load->view('default_admin/footer');
	}
	
	public function addVendor_ledger(){
		$data = array(
		'ledger_site_id'  		=> $_POST['ledger_site_id'],
		'ledger_vendor_id' 		=> $_POST['ledger_vendor_id'],
		'ledger_voucher_no'  	=> $_POST['ledger_voucher_no'],
		'ledger_voucher_image' 	=> $_POST['ledger_voucher_image'],
		'ledger_goods_name' 	=> $_POST['ledger_goods_name'],
		'ledger_unit' 			=> $_POST['ledger_unit'],
		'ledger_qty'   			=> $_POST['ledger_qty'],
		'ledger_rate' 			=> $_POST['ledger_rate'],
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
		'ledger_added_by'       => 1,
		'ledger_entrydt'        => date('Y-m-d H:i:s'),
		);
		
		$data1 = array(
		'partial_date' 			=> $_POST['ledger_payment_date'],
		'partial_amt' 			=> $_POST['ledger_paid_amt'],
		'partial_payment_type'	=> $_POST['ledger_payment_type'],
		'partial_cheque_dd_no'	=> $_POST['ledger_cheque_dd_no'],
		'partial_remark'		=> $_POST['ledger_remark'],
		'partial_status'		=> 1,
		'partial_added_by'		=> 1,
		'partial_entrydt'		=> date('Y-m-d H:i:s'),
		);	
		
		if(!empty($_POST['ledger_id'])){
		$this->Crud_model-> edit_record_by_anyid('vendor_ledger','ledger_id',$_POST['ledger_id'],$data);
		// $data1['partial_ledger_id']		=> $_POST['ledger_id'];
		// $this->Crud_model->edit_record_by_anyid('vendor_partial_payment','partial_ledger_id',$data1);
		}else{
		$insert_id = $this->Crud_model->insert_record('vendor_ledger',$data);
		$data1['partial_ledger_id']		= $insert_id;
		$this->Crud_model->insert_record('vendor_partial_payment',$data1);
		}
		
		
		
	}

	public function getVendor_ledger(){
		$vendor = $this->Common_model->get_data_by_query_pdo("select l.ledger_id, l.ledger_voucher_no, l.ledger_goods_name, l.ledger_payable_amt, l.ledger_balance_amt, s.site_name, v.vendor_name from vendor_ledger l left join site_detail s on s.site_id=l.ledger_site_id left join vendor_master v on v.vendor_id=l.ledger_vendor_id where 1 and ledger_status=?",array(1));
		echo json_encode($vendor);
	}
	
	public function editVendor_ledger(){
		$id = $this->input->post('id');
		$vendor = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where ledger_id=?",array($id));
		echo json_encode($vendor);
	}
	
	public function deleteVendor_ledger(){
		$id = $this->input->post('id');
		$data = array(
			'ledger_status' => 0
		);	
		$this->Crud_model-> edit_record_by_anyid('vendor_ledger','ledger_id',$id,$data);
	}

	public function vendor_partial_payment(){
        $lid = $this->uri->segment(4);
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$data['ledger'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where 1 and ledger_id=?",array($lid));
		$data['vendor'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_master where 1 and vendor_id=?",array($data['ledger'][0]['ledger_vendor_id']));
		$this->load->view('admin/ACCOUNTS/vendor_partial_payment',$data);
		$this->load->view('default_admin/footer');
	}
	
	public function addVendor_partial_payment(){
		$data = array(
		'partial_ledger_id' 	=> $_POST['partial_ledger_id'],
		'partial_date' 			=> $_POST['partial_date'],
		'partial_amt' 			=> $_POST['partial_amt'],
		'partial_payment_type'	=> $_POST['partial_payment_type'],
		'partial_cheque_dd_no'	=> $_POST['partial_cheque_dd_no'],
		'partial_remark'		=> $_POST['partial_remark'],
		'partial_status'		=> 1,
		'partial_added_by'		=> 1,
		'partial_entrydt'		=> date('Y-m-d H:i:s'),
		);	
		
		if(!empty($_POST['ledger_id'])){
		// $this->Crud_model-> edit_record_by_anyid('vendor_partial_payment','partial_ledger_id',$_POST['partial_ledger_id'],$data);
		// $data1['partial_ledger_id']		=> $_POST['ledger_id'];
		// $this->Crud_model->edit_record_by_anyid('vendor_partial_payment','partial_ledger_id',$data1);
		}else{
		$this->Crud_model->insert_record('vendor_partial_payment',$data);
		$data1['partial_ledger_id']	= $insert_id;
		$this->Crud_model-> edit_record_by_anyid('vendor_ledger','ledger_id',$_POST['partial_ledger_id'],$data1);
		}
		
		
		
	}

	public function getVendor_partial_payment(){
		$vendor = $this->Common_model->get_data_by_query_pdo("select l.ledger_id, l.ledger_voucher_no, l.ledger_goods_name, l.ledger_payable_amt, l.ledger_balance_amt, s.site_name, v.vendor_name from vendor_ledger l left join site_detail s on s.site_id=l.ledger_site_id left join vendor_master v on v.vendor_id=l.ledger_vendor_id where 1 and ledger_status=?",array(1));
		echo json_encode($vendor);
	}
	
	public function editVendor_partial_payment(){
		$id = $this->input->post('id');
		$vendor = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where ledger_id=?",array($id));
		echo json_encode($vendor);
	}
	
	public function deleteVendor_partial_payment(){
		$id = $this->input->post('id');
		$data = array(
			'ledger_status' => 0
		);	
		$this->Crud_model-> edit_record_by_anyid('vendor_ledger','ledger_id',$id,$data);
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



}