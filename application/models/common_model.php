<?php
	if (!defined('BASEPATH'))
		exit('No direct script access allowed');
	class Common_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
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
		
		
		
	
	}
?>