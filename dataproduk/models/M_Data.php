<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Data extends CI_Model{
	
	function tampil_data(){
		$this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('products');
        $query=$this->db->get();
        return $query->result_array();
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}
	function update_data($data, $prod_id){
		$this->db->where('prod_id',$prod_id);
		$this->db->update('products', $data);
		return TRUE;
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}