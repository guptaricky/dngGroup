<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PROPERTY extends MY_Controller {

	public function sell_property(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$data['employee'] = $this->Common_model->get_data_by_query_pdo("select * from employes where 1 ",array());
		$this->load->view('admin/PROPERTY/sell_property',$data);
		$this->load->view('default_admin/footer');
	}

	

}