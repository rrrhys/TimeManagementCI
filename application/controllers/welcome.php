<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

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
		$this->load->library('migration');
		$this->migration->current();
		//$this->load->view('welcome_message');
		$page_data = $this->page_data_base();
		$this->output('welcome_message',$page_data);
	}
	public function test(){
		//$this->load->view("test");
		$page_data_base = $this->page_data_base;
		$this->output('test',array());
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */