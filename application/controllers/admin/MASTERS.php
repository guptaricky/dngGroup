<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MASTERS extends CI_Controller {
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


	public function expenseCategory(){
		if($this->ion_auth->logged_in())
		{
			$this->load->view('default_admin/head');
			$this->load->view('default_admin/header');
			$this->load->view('default_admin/sidebar');
			$this->load->view('admin/MASTERS/expenseCategory');
			$this->load->view('default_admin/footer');
		}else{
			redirect('auth/login');	
		}
	}

	public function navMaster(){
		if($this->ion_auth->logged_in())
		{
			$data['navigations'] = $this->Common_model->get_data_by_query_pdo("select * from nav_master where 1 ",array());
			$this->load->view('default_admin/head');
			$this->load->view('default_admin/header');
			$this->load->view('default_admin/sidebar');
			$this->load->view('admin/MASTERS/navMaster',$data);
			$this->load->view('default_admin/footer');
		}else{
			redirect('auth/login');	
		}
	}

	public function getNavigations(){
		
		$data['navigations'] = $this->Common_model->get_data_by_query_pdo("select * from nav_master where 1 ",array());
		echo json_encode($data['navigations']);
		// print_r($data['navigations']);
		
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


	public function site_master(){
		if($this->ion_auth->logged_in())
		{
			$this->load->view('default_admin/head');
			$this->load->view('default_admin/header');
			$this->load->view('default_admin/sidebar');
			$this->load->view('admin/MASTERS/site_master');
			$this->load->view('default_admin/footer');
		}else{
			redirect('auth/login');	
		}
	}

	public function addsite(){
		if($this->ion_auth->logged_in())
		{
            $userid = (array_slice($this->session->userdata, 9, 1));
            // $uid = $userid['user_id'];
			$data = array(
			'site_name' => $_POST['site_name'],
			'site_manager_name' => $_POST['site_manager_name'],
			'site_manager_no' => $_POST['site_manager_no'],
			'site_address' => $_POST['site_address'],
			'site_remark' => $_POST['site_remark'],
			'site_status' => 1,
			'site_added_by' => 1,//$uid,
			'site_entrydt' => date('Y-m-d H:i:s'),
			);
			if(!empty($_POST['site_banner'])){
			$data['site_banner'] = $_POST['site_banner'];
			}			
			if(!empty($_POST['site_id'])){
			$this->Crud_model-> edit_record_by_anyid('site_detail','site_id',$_POST['site_id'],$data);
			}else{
			$this->Crud_model->insert_record('site_detail',$data);
			}
		}else{
			redirect('auth/login');	
		}
	}

	public function getsite(){
		if($this->ion_auth->logged_in())
		{
		$site = $this->Common_model->get_data_by_query_pdo("select * from site_detail where 1 and site_status=?",array(1));
		echo json_encode($site);
		}else{
			redirect('auth/login');	
		}
	}
	
	public function editsite(){
		if($this->ion_auth->logged_in())
		{
		$id = $this->input->post('id');
		$site = $this->Common_model->get_data_by_query_pdo("select * from site_detail where site_id=?",array($id));
		echo json_encode($site);
		}else{
			redirect('auth/login');	
		}
	}
	
	public function deletesite(){
		if($this->ion_auth->logged_in())
		{
		$id = $this->input->post('id');
			$data = array(
			'site_status' => 0
			);	
			$this->Crud_model-> edit_record_by_anyid('site_detail','site_id',$id,$data);
		}else{
			redirect('auth/login');	
		}
	}



}