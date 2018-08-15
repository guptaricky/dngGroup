<?php
	if (!defined('BASEPATH'))
		exit('No direct script access allowed');
	class Common_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function insert_notification($user,$type,$ref,$msg)
		{
			$data = array(
			'notify_user' => $user,
			'notify_type' => $type,
			'notify_ref_id' => $ref,
			'notify_msg'  => $msg,
			);
			$this->Crud_model->insert_record('notifications',$data);
		}
		public function findfield($table, $fieldname1, $fieldvalue1, $returnfield)
		{
			$this->db->select($returnfield);
			$this->db->from($table);
			$this->db->where($fieldname1, $fieldvalue1);
			$query = $this->db->get();
			foreach ($query->result() as $value) {
			}
			return @$value->$returnfield;
		}
		public function toggle_sidebar()
		{
			// return $group = $this->session->userdata();
			$group = $this->session->userdata('group');
			// return 'default_admin';
			if($group == 'admin'){
			return $sidebar = 'default_admin';
			}
			else{
			return $sidebar = 'default_user';	
			}
		}
		
		public function get_data_by_query_pdo($qry,$data)
		{
			$query = $this->db->query($qry,$data);
			return $query->result_array();
		}
		
		public function imgUpload($folder,$id,$filename,$field,$table,$refid)
		{
			//$id=$_POST['stu_id'];
			// echo $id;die;
			$target_dir = './uploads/'.$folder.'/';
			$timestamp= date('YmdHis').$id;
			$filename=$_FILES["userfile"]["name"];
			$extension=end(explode(".", $filename));
			$newfilename=$timestamp .".".$extension;
			// echo basename($_FILES["userfile"]["name"]);die;
			$target_file = $target_dir . basename($newfilename);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["userfile"]["tmp_name"]);
				if($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					//echo "File is not an image.";
					$uploadOk = 0;
				}
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				//echo "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["userfile"]["size"] > 1000000) {  
				//echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "JPG"
			&& $imageFileType != "gif" ) {
				//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				//echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)) {
					$data = array($field=>$target_dir.$newfilename);
					$this->Crud_model->edit_record_by_any_id($table,$refid,$id,$data);
					// return @$newfilename;
				} else {
					//return "Sorry, there was an error uploading your file.";
					return null;
				}
			}
		}
		public function sendMessage($contact,$msg)
		{
			
		    foreach($contact as $sms) {
				
				$Curl_Session = curl_init('http://login.heightsconsultancy.com/API/WebSMS/Http/v1.0a/index.php?');
                curl_setopt ($Curl_Session, CURLOPT_POST, 1);
                curl_setopt ($Curl_Session, CURLOPT_POSTFIELDS, "username=&password=&sender=GLOBAL&to=$sms&message=$msg&reqid=1&format={json|text}&route_id=113&msgtype=unicode");
                curl_setopt ($Curl_Session, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($Curl_Session, CURLOPT_RETURNTRANSFER,1);
                $result=curl_exec ($Curl_Session);
			}            
		}
		
		public function convertNumber($number)
		{
		if (($number < 0) || ($number > 999999999))
		{
		throw new Exception("Number is out of range");
		}
		$Gn = floor($number / 100000);  /* Millions (giga) */
		$number -= $Gn * 100000;
		$kn = floor($number / 1000);     /* Thousands (kilo) */
		$number -= $kn * 1000;
		$Hn = floor($number / 100);      /* Hundreds (hecto) */
		$number -= $Hn * 100;
		$Dn = floor($number / 10);       /* Tens (deca) */
		$n = $number % 10;               /* Ones */
		$res = "";
		if ($Gn)
		{
		$res .= $this->Crud_model->convertNumber($Gn) . " Lacs";
		}
		if ($kn)
		{
		$res .= (empty($res) ? "" : " ") .
		$this->Crud_model->convertNumber($kn) . " Thousand";
		}
		if ($Hn)
		{
		$res .= (empty($res) ? "" : " ") .
		$this->Crud_model->convertNumber($Hn) . " Hundred";
		}
		$ones = array("", "One", "Two", "Three", "Four", "Five", "Six",
		"Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen",
		"Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen",
		"Nineteen");
		$tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty",
		"Seventy", "Eigthy", "Ninety");
		if ($Dn || $n)
		{
		if (!empty($res))
		{
		$res .= " and ";
		}
		if ($Dn < 2)
		{
		$res .= $ones[$Dn * 10 + $n];
		}
		else
		{
		$res .= $tens[$Dn];
		if ($n)
		{
		$res .= "-" . $ones[$n];
		}
		}
		}
		if (empty($res))
		{
		$res = "zero";
		}
		return $res;
		}
		
		public function get_site_name($id)
		{
			$site = $this->Common_model->get_data_by_query_pdo("select * from site_detail where 1 and site_id=?",array($id)); 
			return $site[0]['site_name'];
		}
	
		public function get_acc_name($id)
		{
			$acc = $this->Common_model->get_data_by_query_pdo("select * from accounts where 1 and acc_id=?",array($id)); 
			return $acc[0]['acc_name'];
		}
		
		public function get_alloted_site($emp_id)
		{
			$acc = $this->Common_model->get_data_by_query_pdo("select emp_alloted_site from employes where emp_id=?",array($emp_id));
			@$alloted_site = $acc[0]['emp_alloted_site'];
			if(@$alloted_site ==0 || $alloted_site==''){return 0;}
			else{return @$acc[0]['emp_alloted_site'];}
		}
		
		public function moneyFormatIndia($num){
        $nums = explode(".",$num);
        if(count($nums)>2){
            return "0";
        }else{
        if(count($nums)==1){
            $nums[1]="00";
        }
        $num = $nums[0];
        $explrestunits = "" ;
        if(strlen($num)>3){
            $lastthree = substr($num, strlen($num)-3, strlen($num));
            $restunits = substr($num, 0, strlen($num)-3); 
            $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; 
            $expunit = str_split($restunits, 2);
            for($i=0; $i<sizeof($expunit); $i++){

                if($i==0)
                {
                    $explrestunits .= (int)$expunit[$i].","; 
                }else{
                    $explrestunits .= $expunit[$i].",";
                }
            }
            $thecash = $explrestunits.$lastthree;
        } else {
            $thecash = $num;
        }
        return $thecash.".".$nums[1]; 
        }
    }
	
	}
?>