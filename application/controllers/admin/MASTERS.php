<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MASTERS extends MY_Controller {

	//*****Category code Starts****//
	public function expenseCategory(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$this->load->view('admin/MASTERS/expenseCategory');
		$this->load->view('default_admin/footer');
	}
	public function addCategory(){
		// print_r($this->session->userdata);die;
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$data = array(
			'cat_name' => $_POST['catgName'],
			'cat_desc' => $_POST['catgDesc'],
			'cat_status' => 1,
			'cat_added_by' => $uid,
			'cat_entrydt' => date('Y-m-d H:i:s'),
		);
		if(!empty($_POST['cat_id'])){
			$this->Crud_model-> edit_record_by_anyid('expense_category','cat_id',$_POST['cat_id'],$data);
			$notify = $this->Common_model->insert_notification($uid,'edit',$_POST['cat_id'],'Expense Category Edited');
		}else{
			$id = $this->Crud_model->insert_record('expense_category',$data);
			$notify = $this->Common_model->insert_notification($uid,'insert',$id,'New Expense Category Created');
		}
		
		
	}
	public function getCatg(){
		$catg = $this->Common_model->get_data_by_query_pdo("select * from expense_category where 1 and cat_status=?",array(1));
		echo json_encode($catg);
	}
	public function editCatg(){
		$id = $this->input->post('id');
		$cat = $this->Common_model->get_data_by_query_pdo("select * from expense_category where cat_id=?",array($id));
		echo json_encode($cat);
	}
	public function deleteCatg(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$id = $this->input->post('id');
		$data = array(
			'cat_status' => 0
		);	
		$this->Crud_model-> edit_record_by_anyid('expense_category','cat_id',$id,$data);
		$notify = $this->Common_model->insert_notification($uid,'deleted',$id,'Expense Category Deleted');
	}
	//*****Category code Ends****//
		
	//*****Navigation code Starts****//
	public function navMaster(){
		$data['navigations'] = $this->Common_model->get_data_by_query_pdo("select * from nav_master where 1 ",array());
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$this->load->view('admin/MASTERS/navMaster',$data);
		$this->load->view('default_admin/footer');
	}
	public function getNavigations(){
		$data['navigations'] = $this->Common_model->get_data_by_query_pdo("select * from nav_master where 1 ",array());
		echo json_encode($data['navigations']);
	}
	public function generateLink(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		
		$data = array(
			'nav_name' => $_POST['linkname'],
			'nav_icon' => $_POST['linkicon'],
			'nav_url' => $_POST['linkurl'],
			'nav_user' => $uid,
			'nav_status' => 1
		);	
		$this->Crud_model->insert_record('nav_master',$data);
	}


	public function site_master(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$data['banks'] = $this->Common_model->get_data_by_query_pdo("select * from bank_master",array());
		$this->load->view('admin/MASTERS/site_master');
		$this->load->view('default_admin/footer');
	}
	public function addsite(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$data = array(
			'site_name' => $_POST['site_name'],
			'site_manager_name' => $_POST['site_manager_name'],
			'site_manager_no' => $_POST['site_manager_no'],
			'site_address' => $_POST['site_address'],
			'site_remark' => $_POST['site_remark'],
			'site_status' => 1,
			'site_added_by' => $uid,
			'site_entrydt' => date('Y-m-d H:i:s'),
		);
		if(!empty($_FILES['site_banner'])){
			$path = './uploads';
			if (!is_dir($path))
				mkdir($path);
			$path = './uploads/site_banner';
			if (!is_dir($path))
				mkdir($path);

			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|png|bmp';
			$config['width'] = 50;
			$config['height'] = 50;
			$config['file_name'] = time().'_'.$_POST['site_name'];
			$config['file_overwrite'] = true;
			$this->load->library('upload', $config);
			$this->upload->do_upload('site_banner');
			$data1 = array('upload_data' => $this->upload->data());
			$error = array('error' => $this->upload->display_errors());
			$data['site_banner'] = $path . '/' . $data1['upload_data']['file_name'];
		}			
		if(!empty($_POST['site_id'])){
			$this->Crud_model-> edit_record_by_anyid('site_detail','site_id',$_POST['site_id'],$data);
			$notify = $this->Common_model->insert_notification($uid,'edit',$_POST['site_id'],'Site Edited');
		}else{
			$id = $this->Crud_model->insert_record('site_detail',$data);
			$notify = $this->Common_model->insert_notification($uid,'insert',$id,'New Site Category Created');
		}
	}
	public function getsite(){
		$site = $this->Common_model->get_data_by_query_pdo("select * from site_detail where 1 and site_status=?",array(1));
		echo json_encode($site);
	}
	public function editsite(){
		$id = $this->input->post('id');
		$site = $this->Common_model->get_data_by_query_pdo("select * from site_detail where site_id=?",array($id));
		echo json_encode($site);
	}
	public function deletesite(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$id = $this->input->post('id');
		$data = array(
			'site_status' => 0
		);	
		$this->Crud_model-> edit_record_by_anyid('site_detail','site_id',$id,$data);
		$notify = $this->Common_model->insert_notification($uid,'insert',$id,'Site Deleted');			
	}


	public function site_otherdetail(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$data['sites'] = $this->Common_model->get_data_by_query_pdo("select site_id,site_name from site_detail where 1 and site_status=?",array(1));
		$this->load->view('admin/MASTERS/site_otherdetail',$data);
		$this->load->view('default_admin/footer');
	}
	public function add_site_otherdetail(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$data = array(
			'detail_site_id'     => $_POST['detail_site_id'],
			'detail_sector'      => $_POST['detail_sector'],
			'detail_type'        => $_POST['detail_type'],
			'detail_no_of_units' => $_POST['detail_no_of_units'],
			'detail_area'        => $_POST['detail_area'],
			'detail_rate'        => $_POST['detail_rate'],
			'detail_price'        => $_POST['detail_price'],
			'detail_site_nos'    => $_POST['detail_site_nos'],
			'detail_isactive'    => 1,
			'detail_added_by'    => $uid,
			'detail_entrydt'     => date('Y-m-d H:i:s'),
		);
		
		if(!empty($_POST['detail_id'])){
			$this->Crud_model-> edit_record_by_anyid('site_other_detail','detail_id',$_POST['detail_id'],$data);
			$inserted_id = $_POST['detail_id'];
			$notify = $this->Common_model->insert_notification($uid,'insert',$_POST['detail_id'],'Site Other Details Edited');
		}else{
			$id = $inserted_id = $this->Crud_model->insert_record('site_other_detail',$data);	
			$notify = $this->Common_model->insert_notification($uid,'edit',$id,'Site Other Details Created');
		}
		
			$sites = explode(",",$_POST['detail_site_nos']);
			foreach($sites as $no){
				$divisions = $this->Common_model->get_data_by_query_pdo("select * from property_detail where 1 and property_detail_id=? and property_sno=?",array($inserted_id, $no));
				if(empty($divisions)){
					$data1 = array(
						'property_detail_id' => $inserted_id,
						'property_site_id' => $_POST['detail_site_id'],
						'property_sno' => $no,
						'property_isactive' => 1,
					);
					$this->Crud_model->insert_record('property_detail',$data1);	
				}
			}
	}
	public function get_site_otherdetail(){
		$site = $this->Common_model->get_data_by_query_pdo("select d.*,s.site_name from site_other_detail d left join site_detail s on s.site_id=d.detail_site_id where 1 and detail_isactive=?",array(1));
		echo json_encode($site);
	}
	public function edit_site_otherdetail(){
		$id = $this->input->post('id');
		$site = $this->Common_model->get_data_by_query_pdo("select * from site_other_detail where detail_id=?",array($id));
		echo json_encode($site);
	}
	public function delete_site_otherdetail(){
		$userid = (array_slice($this->session->userdata, 8, 1));
		$uid = $userid['user_id'];
		$id = $this->input->post('id');
		$data = array(
			'detail_isactive' => 0,
		);	
		$this->Crud_model->edit_record_by_anyid('site_other_detail','detail_id',$id,$data);
		$notify = $this->Common_model->insert_notification($uid,'deleted',$id,'Site Other Details Deleted');
	}
	
	public function site_otherdetail_user(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$empid = (array_slice($this->session->userdata,10,1));
		$empid = $empid['emp_id'];
		@$emp_alloted_site = @$this->Common_model->get_alloted_site($empid);
		// $data['sites'] = $this->Common_model->get_data_by_query_pdo("select site_id,site_name from site_detail where 1 and site_status=?",array(1));
		$data['site'] = $this->Common_model->get_data_by_query_pdo("select * from site_detail where site_id=? and site_status=?",array($emp_alloted_site,1));
		// echo $this->db->last_query();die;
		$this->load->view('admin/MASTERS/site_otherdetail_user',$data);
		$this->load->view('default_admin/footer');
	}
	public function manageSite(){
		$empid = (array_slice($this->session->userdata,10,1));
		$empid = $empid['emp_id'];
		
		$group = $this->session->userdata('group');
			
			if($group == 'admin'){
				$data['sites'] = $this->Common_model->get_data_by_query_pdo("select * from site_detail where site_status=?",array(1));
			}
			else{
			// $data['emp_site'] = $this->Common_model->get_data_by_query_pdo("select emp_alloted_site from employes where emp_id=?",array($empid));
			// @$emp_alloted_site = $data['emp_site'][0]['emp_alloted_site'];
			@$emp_alloted_site = @$this->Common_model->get_alloted_site($uid);
			
			$data['site'] = $this->Common_model->get_data_by_query_pdo("select * from site_detail where site_id=? and site_status=?",array($emp_alloted_site,1));
			}
		
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$this->load->view('admin/MASTERS/manageSite',$data);
		$this->load->view('default_admin/footer');
	}
	public function manageSite_new(){
		$empid = (array_slice($this->session->userdata,10,1));
		$empid = $empid['emp_id'];
		
		$group = $this->session->userdata('group');
			
			if($group == 'admin'){
				$data['sites'] = $this->Common_model->get_data_by_query_pdo("select * from site_detail where site_status=?",array(1));
			}
			else{
			// $data['emp_site'] = $this->Common_model->get_data_by_query_pdo("select emp_alloted_site from employes where emp_id=?",array($empid));
			// @$emp_alloted_site = $data['emp_site'][0]['emp_alloted_site'];
			@$emp_alloted_site = @$this->Common_model->get_alloted_site($uid);
			
			$data['site'] = $this->Common_model->get_data_by_query_pdo("select * from site_detail where site_id=? and site_status=?",array($emp_alloted_site,1));
			}
		
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$this->load->view('admin/MASTERS/manageSite_new',$data);
		$this->load->view('default_admin/footer');
	}

	public function getSitedata_new(){
		
		$site_id = $_POST['site_id'];
		
		$group = $this->session->userdata('group');
		if($group == 'admin'){
			$data['site'] = $this->Common_model->get_data_by_query_pdo("select * from site_detail where site_id=?",array($site_id));
		}
		else{
		$empids = (array_slice($this->session->userdata,10,1));
		$empid = $empids['emp_id'];
		// $data['emp_site'] = $this->Common_model->get_alloted_site($empid);
		$site_id = $this->Common_model->get_alloted_site($empid);
		$data['site'] = $this->Common_model->get_data_by_query_pdo("select * from site_detail where site_id=?",array($site_id));
		}
		$data['customer'] = $this->Common_model->get_data_by_query_pdo("select * from customers where cust_active=?",array(1));
		$data['propertytype'] = $this->Common_model->get_data_by_query_pdo("select distinct(detail_type) as detail_type from site_other_detail where detail_site_id=?",array($site_id));
		$data['propertytypedetail'] = $this->Common_model->get_data_by_query_pdo("select * from property_detail pd
		left join property_other_detail pod on pd.property_id = pod.prop_id
 		where pd.property_site_id=?",array($site_id));
		@$detail_type = $data['propertytype'][0]['detail_type'];
		$data['banks'] = $this->Common_model->get_data_by_query_pdo("select * from bank_master",array());
		$this->load->view('admin/PROPERTY/site_property_new',$data);
	}
	
	public function getSitedata(){
		
		$site_id = $_POST['site_id'];
		
		$group = $this->session->userdata('group');
		if($group == 'admin'){
			$data['site'] = $this->Common_model->get_data_by_query_pdo("select * from site_detail where site_id=?",array($site_id));
		}
		else{
		$empids = (array_slice($this->session->userdata,10,1));
		$empid = $empids['emp_id'];
		// $data['emp_site'] = $this->Common_model->get_alloted_site($empid);
		$site_id = $this->Common_model->get_alloted_site($empid);
		$data['site'] = $this->Common_model->get_data_by_query_pdo("select * from site_detail where site_id=?",array($site_id));
		}
		$data['customer'] = $this->Common_model->get_data_by_query_pdo("select * from customers where cust_active=?",array(1));
		$data['propertytype'] = $this->Common_model->get_data_by_query_pdo("select distinct(detail_type) as detail_type from site_other_detail where detail_site_id=?",array($site_id));
		$data['propertytypedetail'] = $this->Common_model->get_data_by_query_pdo("select * from property_detail pd
		left join property_other_detail pod on pd.property_id = pod.prop_id
 		where pd.property_site_id=?",array($site_id));
		@$detail_type = $data['propertytype'][0]['detail_type'];
		$data['banks'] = $this->Common_model->get_data_by_query_pdo("select * from bank_master",array());
		$this->load->view('admin/PROPERTY/site_property',$data);
	}
	
	
	public function company_bank_accounts(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$data['banks'] = $this->Common_model->get_data_by_query_pdo("select * from bank_master where 1",array());
		$this->load->view('admin/MASTERS/company_bank_accounts',$data);
		$this->load->view('default_admin/footer');
	}
	public function add_company_bank_accounts(){
		$userid = (array_slice($this->session->userdata, 9, 1));
		$uid = $userid['user_id'];
		$data = array(
			'bank_name' => $_POST['bank_name'],
			'bank_branch_name' => $_POST['bank_branch_name'],
			'bank_acc_name' => $_POST['acc_name'],
			'bank_acc_no' => $_POST['bank_acc_no'],
			'bank_ifsc_code' => $_POST['bank_ifsc_code'],
			'bank_status' => 1,
			'bank_added_by' => $uid,
			'bank_entrydt' => date('Y-m-d H:i:s'),
		);		
		if(!empty($_POST['bank_id'])){
			$this->Crud_model-> edit_record_by_anyid('company_bank_accounts','bank_id',$_POST['bank_id'],$data);
			$notify = $this->Common_model->insert_notification($uid,'edit',$_POST['bank_id'],'Bank Account Edited');
		}else{
			$id = $this->Crud_model->insert_record('company_bank_accounts',$data);
			$notify = $this->Common_model->insert_notification($uid,'insert',$id,'Bank Account Created');
		}
	}
	public function get_company_bank_accounts(){
		$bank = $this->Common_model->get_data_by_query_pdo("select * from company_bank_accounts ba left join bank_master bm on ba.bank_name = bm.bank_id where 1 and bank_status=?",array(1));
		echo json_encode($bank);
	}
	public function edit_company_bank_accounts(){
		$id = $this->input->post('id');
		$bank = $this->Common_model->get_data_by_query_pdo("select * from company_bank_accounts where bank_id=?",array($id));
		echo json_encode($bank);
	}
	public function delete_company_bank_accounts(){
		$userid = (array_slice($this->session->userdata, 9, 1));
		$uid = $userid['user_id'];
		$id = $this->input->post('id');
		$data = array(
			'bank_status' => 0
		);	
		$this->Crud_model-> edit_record_by_anyid('company_bank_accounts','bank_id',$id,$data);
		$notify = $this->Common_model->insert_notification($uid,'deleted',$id,'Bank Account Deleted');
	}


}