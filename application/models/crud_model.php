<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Crud_model extends CI_Model 
	{
		function __construct()
        {
            parent::__construct();
        }
       
		public function insert_record($tbl,$data)
		{
            if($this->db->insert($tbl,$data))
			{
				return TRUE;
			} else {
				return FALSE;
			}	
        }
        
		public function append_record_by_anyid($tbl,$id,$data,$field,$base)
		{
			$qry = " update $tbl set $field = CONCAT( $field,'$data#@#') where $base = $id ";
			$this->db->query($qry);
        }
		
		public function edit_record_by_anyid($tbl,$id,$data,$where)
		{
            $this->db->where($where,$id);
            if($this->db->update($tbl,$data))
			{ 
				return true;
            } else {
				return false;	
            }
        }
		public function edit_record_by_multiplecondition($tbl,$id_name,$id,$condi,$no,$data)
		{
            $this->db->where($id_name,$id);
			 $this->db->where($condi,$no);
            if($this->db->update($tbl,$data))
			{ 
				return true;
            } else {
				return false;	
            }
        }
		public function delete_record_any_id($tbl,$id,$idname)
		{
		$this->db->delete($tbl,array($idname=>$id));
        }	
		
		
		
	//---------------------------------------------End Class brasses-----------------------------------------------	
    }
?>