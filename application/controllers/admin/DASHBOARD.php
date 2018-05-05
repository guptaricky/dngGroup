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
		$this->data['sites'] = $this->Common_model->get_data_by_query_pdo("select * from site_detail where site_status=?",array(1));
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$this->load->view('admin/DASHBOARD/dashboard',$this->data);
		$this->load->view('default_admin/footer');
	}

	public function user_dashboard(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$site = 0 ;
		$cury = date('Y') ;
		$curm = date('m') ;
		$site = 0 ;
		$site_by_admin = $this->uri->segment(4);
		if($site_by_admin >0 && $site_by_admin !=''){ $site = $site_by_admin; }
		else{
		$empid = (array_slice($this->session->userdata,10,1));
		$empid = $empid['emp_id'];
		$this->data['emp_site'] = $this->Common_model->get_data_by_query_pdo("select emp_alloted_site from employes where emp_id=?",array($empid));
		$site = @$this->data['emp_site'][0]['emp_alloted_site'];
		}
		$this->data['site'] = $site;
		$this->data['expensesCat'] = $this->Common_model->get_data_by_query_pdo("select * from expense_category where cat_status=?",array(1));
		$this->data['vendorlist'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_master where vendor_status=?",array(1));
		$this->data['expensesongraph'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where ledger_site_id = ? and ledger_type=? and ledger_status=? and date_format(ledger_payment_date,'%Y-%m') = '$cury-$curm' group by ledger_vendor_id",array($site,'Expense',1));
		$this->data['expenses'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where ledger_site_id = ? and ledger_type=? and ledger_status=? and date_format(ledger_payment_date,'%Y-%m') = '$cury-$curm' order by ledger_payment_date desc ",array($site,'Expense',1));
		$this->data['expensesthismonth'] = $this->Common_model->get_data_by_query_pdo("select sum(ledger_paid_amt) as totalexpensethismonth from vendor_ledger where ledger_site_id = ? and ledger_type=? and ledger_status=? and date_format(ledger_payment_date,'%Y-%m') = '$cury-$curm' ",array($site,'Expense',1));
		$this->data['vendor'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where ledger_site_id = ? and ledger_type=? and ledger_status=? order by ledger_payment_date desc",array($site,'Vendor',1));
		$this->data['receives'] = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where ledger_site_id = ? and ledger_type=? and ledger_status=? order by ledger_payment_date desc",array($site,'Income',1));
		// echo $this->db->last_query();die;
		$this->load->view('admin/DASHBOARD/user-dashboard',$this->data);
		$this->load->view('default_admin/footer');
	}
	public function emp_activity(){
		$this->load->view('default_admin/head');
		$this->load->view('default_admin/header');
		$this->load->view($this->Common_model->toggle_sidebar().'/sidebar');
		$this->data['logs'] = $this->Common_model->get_data_by_query_pdo("select * from notifications n left join users u on u.id = n.notify_user order by notify_id desc limit 500",array(0));
		$this->load->view('admin/DASHBOARD/emp_activity',$this->data);
		$this->load->view('default_admin/footer');
	}

	public function filter_expense(){
		
		$condition = '';
		$site = $_POST['site_id'];
		$date = date('Y-m-d', strtotime($_POST['date']));
		$desc = $_POST['desc'];
		$category = $_POST['category'];
		$amount = $_POST['amount'];
		
		if($_POST['date']!=''){
			$condition .= "and ledger_payment_date = '$date'";
		}
		
		if($desc!=''){
			$condition .= "and ledger_ramark like '%$desc%'";
		}
		
		if($category!=''){
			$condition .= "and ledger_vendor_id = $category";
		}
		
		if($amount!=''){
			$condition .= "and ledger_paid_amt = $amount";
		}
		
		$expenses = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where ledger_site_id = ? and ledger_type=? and ledger_status=?  $condition",array($site,'Expense',1));
		// echo $this->db->last_query();die;
		 $sno=0;foreach($expenses as $exp){ $sno++;?>
				<tr>
					<td><?php echo $sno;?>.</td>
					<td><?php echo date('d M, Y', strtotime($exp['ledger_payment_date']))?></td>
					<td><?php echo $this->Common_model->findfield('site_detail','site_id',$exp['ledger_site_id'],'site_short_name');?></td>
					<td><?php echo $exp['ledger_remark'];?></td>
					<td><?php echo $this->Common_model->findfield('expense_category','cat_id',$exp['ledger_vendor_id'],'cat_name');?></td>
					<td style="text-align:right"><?php echo $exp['ledger_paid_amt'];?></td>
				</tr>
		 <?php }
	}
	
	public function filter_vendor(){
		
		$condition = '';
		$site = $_POST['site_id'];
		$vendor_id = $_POST['vendor_id'];
		$date = date('Y-m-d', strtotime($_POST['date']));
		$voch_no = $_POST['voch_no'];
		$item = $_POST['item'];
		
		if($_POST['date']!=''){
			$condition .= "and ledger_payment_date = '$date'";
		}
		
		if($voch_no!=''){
			$condition .= "and ledger_voucher_no like '%$voch_no%'";
		}
		
		if($vendor_id!=''){
			$condition .= "and ledger_vendor_id = $vendor_id";
		}
		
		if($item!=''){
			$condition .= "and ledger_goods_name like '%$item%'";
		}
		
		$vendor = $this->Common_model->get_data_by_query_pdo("select * from vendor_ledger where ledger_site_id = ? and ledger_type=? and ledger_status=?  $condition",array($site,'Vendor',1));
		// echo $this->db->last_query();die;
		 $sno=0;foreach($vendor as $ven){ $sno++;?>
				<tr>
					<td><?php echo $sno;?>.</td>
					<td><?php echo $this->Common_model->findfield('vendor_master','vendor_id',$ven['ledger_vendor_id'],'vendor_name');?></td>
					<td><?php echo $this->Common_model->findfield('site_detail','site_id',$ven['ledger_site_id'],'site_short_name');?></td>
					<td><?php echo $ven['ledger_voucher_no']; ?></td>
					<td><?php echo date('d M, Y', strtotime($ven['ledger_payment_date']))?></td>
					<td><?php echo $ven['ledger_goods_name'];?></td>
					
					<td style="text-align:right"><?php echo $ven['ledger_payable_amt'];?></td>
					<td style="text-align:right"><?php echo $ven['ledger_balance_amt'];?></td>
				</tr>
		 <?php }
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