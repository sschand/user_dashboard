<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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
	public function signin(){
		$this->load->view('public_header');
		$this->load->view('signin');
	}
	public function login(){
		// email has to be in email format, required, and has to exist in db
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email|callback_username_check");
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]|callback_pass_check");

		if($this->form_validation->run() == FALSE){
			$this->load->view('public_header');
			$this->load->view('signin');
		}else{
			$logged_user = $this->User->get_user_by_email_password($this->input->post('email'),$this->input->post('password'));
			
			$this->session->set_userdata('level', $logged_user['level']);
			$this->session->set_userdata('is_logged_in', true);
			$this->session->set_userdata('user_id', $logged_user['id']);

			// Log user in
			if($logged_user['level'] == 9){
				redirect(base_url().'dashboard/admin');
			}else{
				redirect(base_url().'dashboard');
			}
		}
	}	
	//Check to see if user exists in db
	public function username_check($email)
	{
		$email_exist = $this->User->get_user_by_email($email);
		
		if (empty($email_exist))
		{
			$this->form_validation->set_message('username_check', 'This email has not been registered yet, please check your email');
			return FALSE;
		}
		else
		{						
			return TRUE;
		}
	}
	//Check to see if email and password are correctly entered
	public function pass_check($password){
		$user_exist = $this->User->get_user_by_email_password($this->input->post('email'),$password);

		if (empty($user_exist))
		{
			$this->form_validation->set_message('pass_check', 'The email/password combination is incorrect');
			return FALSE;
		}
		else
		{						
			return TRUE;
		}
	}
	public function logoff(){
		// destroy session and set logged in variable to false, then redirect to main page
		$this->session->sess_destroy();
		$this->session->set_userdata('is_logged_in', false);
		redirect(base_url());
	}
	public function register(){
		$this->load->view('public_header');
		$this->load->view('register');
	}
	public function register_validate(){
		$this->form_validation->set_rules("password", "Password", "required|matches[c_password]|min_length[8]");
		$this->form_validation->set_rules("c_password", "Confirm Password", "required");
		// $this->form_validation->set_rules("email", "Email Address", "trim|required|valid_email");
		// USER THIS INSTEAD OF ABOVE EMAIL VALIDATION 
		$this->form_validation->set_rules("email", "Email Address", "trim|required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");

		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");

		if($this->form_validation->run() == FALSE){
			if($this->input->post('register_type') =='admin'){
				$this->load->view('logged_in_header');
				$this->load->view('users_new');
			}else{
				$this->load->view('public_header');
				$this->load->view('register');
			}
		}else{
			$count = $this->User->first_user();

			//If first user, make user an admin (level 9) else make user normal (level 2)
			$level = ($count['count'] === '0') ? 9 : 1;

			if($this->session->userdata('is_logged_in')){ //
				if($this->session->userdata('level') == 9 && $this->input->post('register_type') == 'admin'){
					$this->User->register_user($this->input->post(), $level);
					$this->session->set_flashdata('success', '<p class="success">You successfully registered another user!</p>');
					redirect(base_url().'dashboard/admin');

				}else{
					$this->session->set_flashdata('errors', '<p class="error">You cannot register while you\'re still logged in!</p>');
					redirect(base_url());
				}
				
			}else{
				$this->User->register_user($this->input->post(), $level);

				$user_email = $this->input->post('email');

				$user = $this->User->get_user_by_email($user_email);
				
				$this->session->set_userdata('user_id', $user['id']);
				$this->session->set_userdata('level', $user['level']);
				if($user['level'] == 9){
					redirect(base_url().'dashboard/admin');
				}else{
					redirect(base_url().'dashboard'); // fix the contents of page to show for specific user
				}	
			}		
		}	
	}

}

//end of main controller