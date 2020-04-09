<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataProduk extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('M_Data');
		$this->load->helper('url');
		$this->simple_login->cek_admin();
	}
 
	function index(){
		$data['judul'] = "K⍜PIKU | Data Produk";
		$data['products'] = $this->M_Data->tampil_data();
		$this->load->view('dashboard/template/admin_header', $data);
		$this->load->view('dashboard/template/admin_sidebar');
		$this->load->view('dataprodukv',$data);
		$this->load->view('dashboard/template/admin_footer');
	}
 
	function tambah(){
		$this->load->view('dataprodukv');
	}
 
	function tambah_aksi(){
		$config['upload_path']          = './gambar/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('userfile')){
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('dataprodukv', $error);
			}else{
				$_data = array('upload_data' => $this->upload->data());
				$data = array(
					'prod_id'=> $this->input->post('prod_id'),
					'prod_name'=> $this->input->post('prod_name'),
					'prod_price'=> $this->input->post('prod_price'),
					'prod_desc'=> $this->input->post('prod_desc'),
					'cat_id'=> $this->input->post('cat_id'),
					'vend_id'=> $this->input->post('vend_id'),
					'stock'=> $this->input->post('stock'),
					'prod_img' => $_data['upload_data']['file_name']
					);
				$query = $this->db->insert('products',$data);
				redirect('dataproduk');
			}
	}
	function update()
		{
		$prod_id = $this->input->post('prod_id');
		$prod_name = $this->input->post('prod_name');
		$prod_price = $this->input->post('prod_price');
		$prod_desc = $this->input->post('prod_desc');
		$cat_id = $this->input->post('cat_id');
		$vend_id = $this->input->post('vend_id');
		$stock = $this->input->post('stock');

		$config['upload_path'] 		= './gambar/';
		$config['allowed_types'] 	= 'gif|jpg|jpeg|png';
		$config['max_size'] 		= 0;
		$config['max_width'] 		= 0;
		$config['max_height'] 		= 0;
		$this->load->library('upload', $config);

			if (!$this->upload->do_upload('userfile')) {
			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'prod_name' => $prod_name,
				'prod_price' => $prod_price,
				'prod_desc' => $prod_desc,
				'cat_id' => $cat_id,
				'vend_id' => $vend_id,
				'stock' => $stock
			);
			$this->M_Data->update_data($data, $prod_id);
			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('dataproduk');

			$where = array(
			'prod_id' => $prod_id
			);

			$this->M_Data->update_data($where, $data, 'products');
			redirect('dataproduk');
			} else {
			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'prod_name' => $prod_name,
				'prod_price' => $prod_price,
				'prod_desc' => $prod_desc,
				'cat_id' => $cat_id,
				'vend_id' => $vend_id,
				'stock' => $stock,
				'prod_img' => $_data['upload_data']['file_name']
			);
			$this->M_Data->update_data($data, $prod_id);
			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('dataproduk');

			$where = array(
			'prod_id' => $prod_id
			);

			$this->M_Data->update_data($where, $data, 'products');
			redirect('dataproduk');
			}
		}
	function hapus($prod_id){
		$where = array('prod_id' => $prod_id);
		$this->M_Data->hapus_data($where,'products');
		redirect('dataproduk');
	}
 
}
