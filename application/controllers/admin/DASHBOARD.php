<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DASHBOARD extends CI_Controller {
public function __construct()
{
parent :: __construct();
// $this->load->model('Crud_model');
$this->load->model('Common_model');
$this->load->model('ion_auth_model');
$this->load->helper(array('url','language'));
$this->lang->load('auth');
$this->load->library('email');

}


	public function dashboard(){
		
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$this->load->view('admin/DASHBOARD/dashboard');
		$this->load->view('default_admin/footer');
		
	}

	public function blankPage(){
		
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$this->load->view('admin/DASHBOARD/blankPage');
		$this->load->view('default_admin/footer');
		
	}

	public function expenseCategory(){
		
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$this->load->view('admin/DASHBOARD/expenseCategory');
		$this->load->view('default_admin/footer');
		
	}


}