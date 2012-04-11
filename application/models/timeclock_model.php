<?

class Timeclock_model extends CI_Model 
{
	public $errors = array();
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    /*function _user_owns_customer($customer_id,$owner_id){
    	log_message('error', 'timeclock_model->_user_owns_customer is not implemented.');
    	return true;
    }*/
    public function list_jobs($owner_id){
    	$this->db->where('owner_id',$owner_id);
    	$q = $this->db->get('times_entered')->result_array();
    	return $q;
    }
    public function get_current_job($owner_id){
    	$this->db->where('datetime_finished',null);
    	$q = $this->db->get('times_entered')->row_array();
    	return $q;
    }
    public function get_job($job_id,$owner_id){
    	$this->db->where('owner_id',$owner_id);
    	$this->db->where('id',$job_id);
    	$q = $this->db->get('times_entered')->row_array();
    	return $q;
    }
    public function update_job($job_id, $job,$owner_id){
    	$update_array = array();
    	if($job['work_comments']){$update_array['work_comments'] = $job['work_comments'];}
    	if($job['work_description']){$update_array['work_description'] = $job['work_description'];};
    	if($job['finished?']){$update_array['datetime_finished'] = date ("Y-m-d H:i:s",time());}
    	$this->db->where('id',$job_id);
    	$this->db->where('owner_id',$owner_id);
    	$this->db->update('times_entered',$update_array);
    	return true;
    }
<<<<<<< HEAD
    public function get_customers($owner_id){
    	$q = $this->db->query("select distinct customer_name from times_entered")->result_array();
      $customers = array();
      foreach($q as $customer_row){
        $customers[] = $customer_row['customer_name'];
      }
      return $customers;

    }
=======
>>>>>>> origin/master
   	public function start_job($customer_name,$work_type,$job_number,$work_description,$work_comments,$owner_id){
   		$this->load->helper('date');


   		//end the last job.
   		$this->db->trans_start();
   		$update = array('datetime_finished'=>date ("Y-m-d H:i:s",time()));
   		$this->db->where('owner_id',$owner_id);
   		$this->db->where('datetime_finished',null);
   		$this->db->update('times_entered',$update);

   		$insert = array();
   		
   		$insert['customer_name'] = $customer_name;
   		$insert['work_type'] = $work_type;
   		$insert['job_number'] = $job_number;
   		$insert['work_description'] = $work_description;
   		$insert['work_comments'] = $work_comments;
   		$insert['owner_id'] = $owner_id;
   		$insert['datetime_started'] = date ("Y-m-d H:i:s",time());
   		$this->db->insert('times_entered',$insert);
   		$this->db->trans_complete();
   		return true;
   	}
   	public function finish_job($id){
   		
   	}
}