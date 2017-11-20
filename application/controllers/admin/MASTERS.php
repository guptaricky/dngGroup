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
		
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$this->load->view('admin/MASTERS/expenseCategory');
		$this->load->view('default_admin/footer');
		
	}

	public function navMaster(){
		
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$this->load->view('admin/MASTERS/navMaster');
		$this->load->view('default_admin/footer');
		
	}

	public function getNavigations(){
		
		// $data['navigations'] = $this->Common_model->get_data_by_query_pdo("select * from nav_master where 1 ",array());
		// echo json_encode($data['navigations']);
		// print_r($data['navigations']);
		echo "hi";
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