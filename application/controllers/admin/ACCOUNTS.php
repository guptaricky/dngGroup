<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ACCOUNTS extends CI_Controller {
	public function __construct()
	{
		parent :: __construct();
		$this->load->model('Crud_model');
		$this->load->model('Common_model');
		$this->load->model('ion_auth_model');
		$this->load->helper(array('url','language'));
		$this->lang->load('auth');
		$this->load->library('email');
	}


	public function vendor(){
		if($this->ion_auth->logged_in())
		{
			$this->load->view('default_admin/head');
			$this->load->view('default_admin/header');
			$this->load->view('default_admin/sidebar');
			$this->load->view('admin/ACCOUNTS/vendors');
			$this->load->view('default_admin/footer');
		}else{
			redirect('auth/login');	
		}
	}

	public function addVendor(){
		if($this->ion_auth->logged_in())
		{
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
			'vendor_status' => 1
			);	
			if(!empty($_POST['vendor_id'])){
			$this->Crud_model-> edit_record_by_anyid('vendor_master','vendor_id',$_POST['vendor_id'],$data);
			}else{
			$this->Crud_model->insert_record('vendor_master',$data);
			}
		}else{
			redirect('auth/login');	
		}
	}

	public function getVendor(){
		if($this->ion_auth->logged_in())
		{
		$vendor = $this->Common_model->get_data_by_query_pdo("select * from vendor_master where 1 and vendor_status=?",array(1));
		echo json_encode($vendor);
		}else{
			redirect('auth/login');	
		}
	}
	
	public function editVendor(){
		if($this->ion_auth->logged_in())
		{
		$id = $this->input->post('id');
		$vendor = $this->Common_model->get_data_by_query_pdo("select * from vendor_master where vendor_id=?",array($id));
		echo json_encode($vendor);
		}else{
			redirect('auth/login');	
		}
	}
	
	public function deleteVendor(){
		if($this->ion_auth->logged_in())
		{
		$id = $this->input->post('id');
			$data = array(
			'vendor_status' => 0
			);	
			$this->Crud_model-> edit_record_by_anyid('vendor_master','vendor_id',$id,$data);
		}else{
			redirect('auth/login');	
		}
	}

	public function generateLink(){
		if($this->ion_auth->logged_in())
		{
			$data = array(
			'nav_name' => $_POST['linkname'],
			'nav_icon' => $_POST['linkicon'],
			'nav_url' => $_POST['linkurl'],
			//'nav_user' => $_POST['linkuser'],
			'nav_status' => 1
			);	
			$this->Crud_model->insert_record('nav_master',$data);
		}else{
			redirect('auth/login');	
		}
	}



}