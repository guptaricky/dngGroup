<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MASTERS extends MY_Controller {


	public function expenseCategory(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$this->load->view('admin/MASTERS/expenseCategory');
		$this->load->view('default_admin/footer');
	}

	public function navMaster(){
		$data['navigations'] = $this->Common_model->get_data_by_query_pdo("select * from nav_master where 1 ",array());
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$this->load->view('admin/MASTERS/navMaster',$data);
		$this->load->view('default_admin/footer');
	}

	public function getNavigations(){
		$data['navigations'] = $this->Common_model->get_data_by_query_pdo("select * from nav_master where 1 ",array());
		echo json_encode($data['navigations']);
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


	public function site_master(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$this->load->view('admin/MASTERS/site_master');
		$this->load->view('default_admin/footer');
	}

	public function addsite(){
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
		}else{
			$this->Crud_model->insert_record('site_detail',$data);
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
	
	public function manageSite($id){
		$data['site'] = $this->Common_model->get_data_by_query_pdo("select * from site_detail where site_id=?",array($id));
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view('default_admin/sidebar');
		$this->load->view('admin/MASTERS/manageSite',$data);
		$this->load->view('default_admin/footer');
	}
	
	public function deletesite(){
		$id = $this->input->post('id');
		$data = array(
			'site_status' => 0
		);	
		$this->Crud_model-> edit_record_by_anyid('site_detail','site_id',$id,$data);
	}



	public function site_otherdetail(){
			$this->load->view('default_admin/head');
			$this->load->view('default_admin/header');
			$this->load->view('default_admin/sidebar');
			$this->load->view('admin/MASTERS/site_otherdetail');
			$this->load->view('default_admin/footer');
	}

	public function add_site_otherdetail(){
		$userid = (array_slice($this->session->userdata, 9, 1));
		// $uid = $userid['user_id'];
		$data = array(
			'detail_site_id'     => $_POST['detail_site_id'],
			'detail_sector'      => $_POST['detail_sector'],
			'detail_type'        => $_POST['detail_type'],
			'detail_no_of_units' => $_POST['detail_no_of_units'],
			'detail_area'        => $_POST['detail_area'],
			'detail_rate'        => $_POST['detail_rate'],
			'detail_site_nos'    => $_POST['detail_site_nos'],
			'detail_status'      => $_POST['detail_status'],
			'detail_isactive'    => 1,
			'detail_added_by'    => 1,//$uid,
			'detail_entrydt'     => date('Y-m-d H:i:s'),
		);
		
		if(!empty($_POST['detail_id'])){
			$this->Crud_model-> edit_record_by_anyid('site_other_detail','detail_id',$_POST['detail_id'],$data);
		}else{
			$inserted_id = $this->Crud_model->insert_record('site_other_detail',$data);			
			foreach($_POST['detail_site_nos'] as $no){
				$data1 = array(
					'property_detail_id' => $inserted_id,
					'property_sno' => $no,
					'property_isactive' => 1,
				);
			}
		}
	}

	public function get_site_otherdetail(){
		$site = $this->Common_model->get_data_by_query_pdo("select * from site_other_detail where 1 and detail_isactive=?",array(1));
		echo json_encode($site);
	}
	
	public function edit_site_otherdetail(){
		$id = $this->input->post('id');
		$site = $this->Common_model->get_data_by_query_pdo("select * from site_other_detail where detail_id=?",array($id));
		echo json_encode($site);
	}
	
	public function delete_site_otherdetail(){
		$id = $this->input->post('id');
		$data = array(
			'detail_isactive' => 0,
		);	
		$this->Crud_model-> edit_record_by_anyid('site_other_detail','detail_id',$id,$data);
	}


	public function sundays(){
		$start_date = date('01-01-2013');
		$end_date = date('31-12-2017');
		$day = 86400; // Day in seconds  
        $format = 'd-M-Y'; // Output format (see PHP date funciton)  
        $sTime = strtotime($start_date); // Start as time  
        $eTime = strtotime($end_date); // End as time  
        $numDays = round(($eTime - $sTime) / $day) + 1;  
        // $date = array();  

        for ($d = 0; $d < $numDays; $d++) {  
            $date = date($format, ($sTime + ($d * $day)));  
			$day_name = date('D', strtotime($date));
			if($day_name=='Sat' || $day_name=='Sun'){
			echo $date;
			echo "<br>";
			}
        }  
	}



}