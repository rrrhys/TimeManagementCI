<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends MY_Controller {

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

     function __construct(){
	 	parent::__construct();
	 	$this->load->model('timeclock_model','timeclock');
	 	if(!$this->session->userdata('id')){
	 		redirect("/auth/login");
	 	}
	 }
	public function index()
	{
		if($this->session->userdata('id')){
		redirect("/app/dashboard");
		}else{
		redirect("/auth/login");
		}

		$page_data = $this->page_data_base;
		$this->output('welcome_message',$page_data);
	}
	public function dashboard(){

		$page_data = $this->page_data_base();
			$page_data['page_title'] = "Dashboard";
			$page_data['page_heading'] = "Dashboard";
			$page_data['times_entered'] = $this->timeclock->list_jobs($this->session->userdata('id'));
			$page_data['current_job'] = $this->timeclock->get_current_job($this->session->userdata('id'));
		$this->output('app/dashboard',$page_data);		
	}
	public function finish_job($job_id){
		if(!$this->input->post("submitted")){
			$page_data = $this->page_data_base();
			$page_data['page_title'] = "Finish job";
			$page_data['page_heading'] = "Finish Job";
			$page_data['job'] = $this->timeclock->get_job($job_id,$this->session->userdata('id'));
			$this->output('app/finish_job',$page_data);	
		}else{
			$job = array();
			$job['finished?'] = true;
			$job['work_comments'] = $this->input->post('work_comments');
			$job['work_description'] = $this->input->post('work_description');
			if($this->timeclock->update_job($job_id,
											$job,$this->session->userdata('id'))){
				$this->session->set_flashdata('good','Job Marked as complete.');
				redirect("/app/dashboard");
			}
			else{
				$this->session->set_flashdata('bad',implode("<br />",$this->timeclock->errors));
				redirect("/app/finish_job/$job_id");
			}
		}
	}
	public function view_job($job_id){
			$page_data = $this->page_data_base();
			$page_data['page_title'] = "View job";
			$page_data['page_heading'] = "View Job";
			$page_data['edit_disabled'] = true;
			$page_data['job'] = $this->timeclock->get_job($job_id,$this->session->userdata('id'));
			$this->output('app/view_job',$page_data);			
	}
	public function edit_job($job_id){
		if(!$this->input->post("submitted")){
			$page_data = $this->page_data_base();
			$page_data['page_title'] = "Edit job";
			$page_data['page_heading'] = "Edit Job";
			$page_data['edit_disabled'] = false;
			$page_data['job'] = $this->timeclock->get_job($job_id,$this->session->userdata('id'));
			$this->output('app/view_job',$page_data);
			}else{
			$job = array();
			$job['finished?'] = false;
			$job['work_comments'] = $this->input->post('work_comments');
			$job['work_description'] = $this->input->post('work_description');
				if($this->timeclock->update_job($job_id,$job,$this->session->userdata('id'))){
						$this->session->set_flashdata('good','Job edited successfully.');
						redirect("/app/dashboard");					
				}
				else{
						$this->session->set_flashdata('bad',implode("<br />", $this->timeclock->errors));
						redirect("app/edit_job/" . $job_id);					
				}
			}	
	}
	public function new_job(){
		if(!$this->input->post("submitted")){
			$page_data = $this->page_data_base();
			$page_data['page_title'] = "Add a new job";
			$page_data['page_heading'] = "New Job";
			$page_data['customers'] = $this->timeclock->get_customers($this->session->userdata('id'));
			$current_job = $this->timeclock->get_current_job($this->session->userdata('id'));
			if($current_job){
			$page_data['warning_flash'] = "You are currently working on another job. If you start a new job, that one will automatically be marked as finished. <a href='/app/view_job/{$current_job['id']}'> <br /><i class='icon-chevron-right'></i> Go to Active Job</a>";
			}
			$this->output('app/new_job',$page_data);		
		}else{
			if($this->timeclock->start_job($this->input->post("customer_name"),
					$this->input->post("work_type"),
					$this->input->post("job_number"),
					$this->input->post("work_description"),
					$this->input->post("work_comments"),
					$this->session->userdata('id'))){
						$this->session->set_flashdata('good','New Job added.');
						redirect("/app/dashboard");
					}
					else{
						$this->session->set_flashdata('bad',implode("<br />", $this->timeclock->errors));
						redirect("app/new_job");
					}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */