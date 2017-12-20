<?php

class MY_Controller extends CI_Controller {

	
     function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'email'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->model('Common_model');
        $this->load->model('Crud_model');
		$this->load->model('ion_auth_model');
        $this->lang->load('auth');	
	
	if(!$this->ion_auth->logged_in()){
			redirect('auth/login');	
		}
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */