<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DASHBOARD extends MY_Controller {
	
	public function __construct() {
        parent::__construct();
    }
	
	public function blankPage(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$this->load->view('admin/DASHBOARD/blankPage');
		$this->load->view('default_admin/footer');
	}
	
	public function dashboard(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->data['sites'] = $this->Common_model->get_data_by_query_pdo("select * from site_detail where 1",array(0));
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$this->load->view('admin/DASHBOARD/dashboard',$this->data);
		$this->load->view('default_admin/footer');
	}

	public function user_dashboard(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');$empid = (array_slice($this->session->userdata,10,1));
		$empid = $empid['emp_id'];
		$this->data['emp_site'] = $this->Common_model->get_data_by_query_pdo("select emp_alloted_site from employes where emp_id=?",array($empid));
		$this->data['expensesCat'] = $this->Common_model->get_data_by_query_pdo("select * from expense_category where cat_status=?",array(1));
		$this->data['expenses'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where ledger_type=?",array('Expense'));
		$this->load->view('admin/DASHBOARD/user-dashboard',$this->data);
		$this->load->view('default_admin/footer');
	}

	public function users_accounts(){
		$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user){
			  $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$this->load->view('admin/DASHBOARD/users_accounts', $this->data);
		$this->load->view('default_admin/footer');
	}

	
}