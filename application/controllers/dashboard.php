<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();	
		$this->load->model('User');	
	}

	public function index()
	{
		$this->load->view('logged_in_header');
		$users_list = array('users' => $this->User->get_all_users());
		$this->load->view('user_dashboard', $users_list);
	}
	public function admin(){
		if($this->session->userdata('level') == 9){			
			$this->load->view('logged_in_header');
			$users_list = array('users' => $this->User->get_all_users());
			$this->load->view('admin_dashboard', $users_list);
		}else{
			$this->session->set_flashdata('errors', '<p class="error">You must be an admin to view that page!</p>');
			redirect(base_url());
		}
	}	

}

//end of main controller