<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() { 
		// Fungsi Login 
		$valid = $this->form_validation; 
		$username = $this->input->post('username'); 
		$password = $this->input->post('password'); 
		$valid->set_rules('username','Username','required'); 
		$valid->set_rules('password','Password','required'); 
		
		if($valid->run()) { 
			$this->simple_login->admin($username,$password, base_url('dashboard'), base_url('admin')); 
		} // End fungsi login 
		if($this->session->userdata('username') == '') {
            $this->load->view('account/adminv');
        } else {
            redirect(site_url('dashboard'));
        }
	} 
	public function logout(){
		$this->simple_login->logout();
	}
}
