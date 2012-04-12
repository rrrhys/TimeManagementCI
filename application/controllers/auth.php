<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->load->view('welcome_message');
	}
	public function test(){
		//$this->load->view("test");
		$page_data = $this->page_data_base();
		$this->output('test',$page_data);
		$this->session->set_flashdata('good','test');
		redirect("/auth/login");
	}

	public function login(){
		if($this->input->post('email_address')){
			if($this->auth->login($this->input->post('email_address'),	$this->input->post('password'))){
				$this->session->set_flashdata('good','Logged in successfully!');
				redirect("/app/dashboard");
			}
			else{
				$this->session->set_flashdata('bad',implode("<br />",$this->auth->errors));
				redirect("/auth/login");
			}
		}
		else {
			$page_data = $this->page_data_base();
			$page_data['page_title'] = "User Login";
			$page_data['page_heading'] = "Login";
			$this->output("login",$page_data);
		}
	}
	public function logout(){
		if($this->input->post('confirmation')){
			$this->auth->logout();
			$this->session->set_flashdata('good',"Logged out successfully.");
			redirect("/auth/login");
		}
		else{
			$page_data = $this->page_data_base();
			$page_data['page_title'] = "Logout";
			$page_data['page_heading'] = "Logout";
			$this->output("logout",$page_data);
		}
	}
	public function register(){

		if($this->input->post('email_address')){
			if(	$this->auth->register($this->input->post('email_address'), 
				$this->input->post('password'),
				$this->input->post('password_confirmation'))){
				$this->session->set_flashdata('good','Your account was completed! Login to continue.');
				redirect("/auth/login/");
			}
			else{
				$this->session->set_flashdata('bad', implode("<br />", $this->auth->errors));
				redirect("/auth/register");
			}
		}
		else
		{
			$page_data = $this->page_data_base();
			$page_data['page_title'] = "Register";
			$page_data['page_heading'] = "Create Account";
			$this->output("register",$page_data);
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */