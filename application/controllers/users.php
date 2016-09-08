<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->model('User');		
	}

	public function index()
	{
		$this->load->view('public_header');
		$this->load->view('home');
	}
	public function new_user(){
		if($this->session->userdata('level') == 9){				
			$this->load->view('logged_in_header');
			$this->load->view('users_new');
		}else{
			$this->session->set_flashdata('errors', '<p class="error">You must be an admin to view that page!</p>');
			redirect(base_url());
		}
	}	
	public function edit(){		
		$user_info = $this->User->get_user_by_id($this->session->userdata('user_id'));
		$data = array('user' => $user_info);

		$this->load->view('logged_in_header');
		$this->load->view('edit_profile', $data);
	}
	public function edit_user($l){
		$user = array('user' => $this->User->get_user_by_id($l));
		$this->load->view('logged_in_header');
		$this->load->view('edit_user',$user);
	}
	public function show($id){
		$this->load->view('logged_in_header');

		$data = array('user_info' => $this->User->get_user_messages_comments($id));

		$this->load->view('show_user', $data);

	}	
	public function remove($id){
		$this->User->remove_user($id);
		redirect(base_url().'dashboard/admin');
	}
	public function save_profile(){
		$this->User->update_profile($this->input->post(), $this->session->userdata('user_id'));
		$this->session->set_flashdata('success', '<p class="success">Your information was successfully updated!</p>');
		redirect(base_url().'users/edit');		
	}
	public function save_password(){
		$this->User->update_password($this->input->post(), $this->session->userdata('user_id'));
		$this->session->set_flashdata('success', '<p class="success">Your information was successfully updated!</p>');
		redirect(base_url().'users/edit');
	}
	public function save_description(){
		$this->User->update_description($this->input->post(), $this->session->userdata('user_id'));
		$this->session->set_flashdata('success', '<p class="success">Your information was successfully updated!</p>');
		redirect(base_url().'users/edit');
	}
	public function admin_save_profile(){
		$this->User->admin_update_profile($this->input->post());
		$this->session->set_flashdata('success', '<p class="success">Your information was successfully updated!</p>');
		$id = $this->input->post('id');
		$url = base_url().'users/edit'.$id;
		// var_dump($url);
		// die();
		redirect($url);		
	}
	public function add_message(){
		$this->User->add_message($this->input->post());
		redirect(base_url().'users/show/'.$this->input->post('for_user'));
	}
	

}

//end of main controller