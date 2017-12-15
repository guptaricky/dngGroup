<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DASHBOARD extends MY_Controller {
	
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

	public function users_accounts(){
		$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user){
			  $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$this->load->view('admin/DASHBOARD/users_accounts', $this->data);
		$this->load->view('default_admin/footer');
	}

	
}