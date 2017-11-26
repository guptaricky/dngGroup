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
		if($this->ion_auth->logged_in())
		{
			$this->load->view('default_admin/head');
			$this->load->view('default_admin/header');
			$this->load->view('default_admin/sidebar');
			$this->load->view('admin/DASHBOARD/dashboard');
			$this->load->view('default_admin/footer');
		}
		else{
			redirect('auth/login');	
		}	
	}

	public function blankPage(){
		if($this->ion_auth->logged_in())
		{
			$this->load->view('default_admin/head');
			$this->load->view('default_admin/header');
			$this->load->view('default_admin/sidebar');
			$this->load->view('admin/DASHBOARD/blankPage');
			$this->load->view('default_admin/footer');
		}
		else{
			redirect('auth/login');	
		}
	}

	public function users_accounts(){
	
		$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$this->load->view('admin/DASHBOARD/users_accounts', $this->data);
		$this->load->view('default_admin/footer');
		
	}

	
}