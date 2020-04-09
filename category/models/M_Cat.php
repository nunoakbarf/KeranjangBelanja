<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Cat extends CI_Model{

    function tampil_data(){
      return $this->db->get('category')->result_array();
    }

    function input_data($data,$table){
		$this->db->insert($table,$data);
    }
    
    function update_data($data, $cat_id){
		$this->db->where('cat_id',$cat_id);
		$this->db->update('category', $data);
    return TRUE;
    
	  }
	  public function getBarangKategori($id){
        $this->db->select('*');
        $this->db->where('category.cat_id', $id); // <-- There is never any reason to write this line!
        $this->db->from('products');
        $this->db->join('category', 'products.cat_id = category.cat_id');
        $query=$this->db->get();
        return $query->result_array();
    }
}