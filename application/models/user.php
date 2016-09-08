<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Los_Angeles');		
		// $this->output->enable_profiler();	
		// $this->load->model('Users');		
	}

	public function first_user(){
		return $this->db->query("SELECT count(?) AS count FROM users", array('id'))->row_array();
	}
	public function register_user($post, $level_id){
		$query = "INSERT INTO users (first_name, last_name, email, password, level, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";

		$date = date('Y-m-d H:i:s');	

		$values = array($post['first_name'], $post['last_name'],$post['email'], md5($post['password']), $level_id, $date, $date);

		return $this->db->query($query, $values);
	}
	public function get_user_by_email($email){
		return $this->db->query("SELECT * FROM users where email=?", $email)->row_array();
	}
	public function get_user_by_id($id){
		return $this->db->query("SELECT * FROM users where id=?", $id)->row_array();
	}
	public function get_user_by_email_password($email,$pass){
		$password = md5($pass);
		$query = "SELECT * FROM user_dashboard.users WHERE email=? AND password=?;";
		$values = array($email,$password);
		return $this->db->query($query, $values)->row_array();
	}
	public function get_all_users(){
		return $this->db->query("SELECT id, first_name, last_name, email, date_format(created_at, '%b %D, %Y') AS created_at, level FROM user_dashboard.users")->result_array();
	}
	public function remove_user($id){
		return $this->db->query("DELETE FROM users WHERE id=?", $id);
	}
	public function update_profile($post,$id){
		$query = "UPDATE users SET email=?, first_name=?, last_name=?, updated_at=? WHERE id=?";
		$values = array($post['email'], $post['first_name'], $post['last_name'], date('Y-m-d H:i:s'), $id);
		return $this->db->query($query, $values);
	}
	public function update_password($post,$id){
		$query = "UPDATE users SET password=?, updated_at=? WHERE id=?";
		$values = array(md5($post['password']), date('Y-m-d H:i:s'), $id);
		return $this->db->query($query, $values);
	}
	public function update_description($post,$id){
		$query = "UPDATE users SET description=?, updated_at=? WHERE id=?";
		$values = array($post['description'], date('Y-m-d H:i:s'), $id);
		return $this->db->query($query, $values);
	}
	public function admin_update_profile($post){
		$query = "UPDATE users SET email=?, first_name=?, last_name=?, level=?, updated_at=? WHERE id=?";
		$values = array($post['email'], $post['first_name'], $post['last_name'], $post['level'], date('Y-m-d H:i:s'), $post['id']);
		return $this->db->query($query, $values);
	}
	public function add_message($post){
		// var_dump($post);
		// die();
		$query = 'INSERT INTO messages (message, user_id, for_id, created_at) VALUES(?,?,?,?)';
		$values = array($post['message'],$post['user_by'],$post['for_user'],date('Y-m-d H:i:s'));
		$this->db->query($query, $values);
	}
	public function get_user_messages_comments($id){
		$query = "SELECT users.first_name, concat_ws(' ', users.first_name, users.last_name) AS user_name, date_format(users.created_at, '%M %D %Y') as registered_date, users.id as user_id, users.email, users.description FROM users LEFT JOIN messages ON messages.user_id = users.id LEFT JOIN users as for_user ON for_user.id = messages.for_id LEFT JOIN comments on comments.message_id = messages.id WHERE users.id=?";
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}
}

//end of main controller