<?

class Auth_model extends CI_Model 
{
	public $errors = array();
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function _hash_password($password){
    $shapassword = sha1($password . "708324ee-c68e-4f73-a790-4db3e97cfb6d");
    return $shapassword;
    }
    public function _email_taken($email_address){
    	$this->db->where('email_address',$email_address);
    	$q = $this->db->get('users')->row_array();
    	return $q == true;
    }
    public function register($email_address,$password,$password_confirmation){
    	$this->load->helper('email');
    	if($password != $password_confirmation){
    		$this->errors[] = "Passwords did not match.";
    		return false;
    	}
    	if(strlen($password) < 6){
    		$this->errors[] = "Password is too short (must be 6 characters or more)";
    		return false;
    	}
    	if(!valid_email($email_address)){
    		$this->errors[] = "Email address is invalid.";
    		return false;
    	}
    	if($this->_email_taken($email_address)){
    		$this->errors[] = "An account already exists with that email. Did you <a href='/auth/forgot_password/>'forget your password</a>?";
    		return false;
    	}

    	$insert = array('email_address'=>$email_address,
    					'password'=>$this->_hash_password($password),
    					'active'=>1);
    	$this->db->insert('users',$insert);
    	return true;

    }
    public function login($email_address, $password){
	
		$shapassword = $this->_hash_password($password);
		$where = array( 'email_address'=>$email_address,
						'password'=>$shapassword,
						'active'=>'1');
		$this->db->where($where);
		$q = $this->db->get('users')->row_array();
		//try by token
		
		if($q)
		{
		$grav_hash = md5(strtolower(trim($q['email_address'])));
		$this->session->set_userdata(array(
		'email_address'=>$q['email_address'],
		'id'=>$q['id'],
		'auth_level'=>$q['auth_level'],
		'gravatar_url'=>"http://www.gravatar.com/avatar/".$grav_hash));
		return true;
		
		}
		else
		{
			$this->errors[] = "Username and password combination not found.";
		return false;

		}
	}
	public function logout(){
		$this->session->unset_userdata('email_address');
		$this->session->unset_userdata('auth_level');
		$this->session->unset_userdata('id');
		return true;
	}
	/*function set_password($email_address,$old_password,$new_password){
		
		$update = array();
		$update['password'] = sha1($new_password. "4e12f4496e6712.41343661");
		$this->db->where('email_address',$email_address);
		$this->db->where('password',sha1($old_password. "4e12f4496e6712.41343661"));
		$this->db->update('users',$update);
		return $this->db->affected_rows();
	}
	function set_password_with_hash($reset_hash,$new_password){
		
		$update = array();
		$update['password'] = sha1($new_password. "4e12f4496e6712.41343661");
		$update['forgot_password_token']=null;
		$this->db->where('forgot_password_token',$reset_hash);
		$this->db->update('users',$update);
		$rows_affected = $this->db->affected_rows();
		return $this->db->affected_rows();
	}
	function old_pass_correct($old_password,$email_address)
	{
		$this->db->where('password',sha1($old_password. "4e12f4496e6712.41343661"));
		$this->db->where('email_address',$email_address);
		$q = $this->db->get('users')->result_array();

		return count($q) == 1;
	}
    function create_account($email_address, $password, $timezone, $order_id = null){
		$retval = array('result'=>'fail','id'=>'','messages'=>'');
		
		$this->db->where('order_id',$order_id);
		$shipping_address = $this->db->get('shipping_address')->row_array();
		
            $new_id = get_uuid();
            $insert = array();
            $insert['id'] = $new_id;
            $insert['email_address'] = $email_address;
            $insert['password']= $this->_hash_password($password);
            $insert['timezone'] = $timezone;
            $insert['activation_key'] = get_uuid();
			$insert['active_address_id'] = $shipping_address['id'];
        $this->db->insert('users',$insert);
        
		
        
        $this->_send_activation_email($new_id);
		$retval['result'] = "success";
		$retval['id'] = $insert['id'];
        return $retval;
    }
	 public function _reset_rate_limit()
	{
	$this->session->unset_userdata('attempts');
	}
	public function _rate_limit()
	{
	
		if(!$this->session->userdata('attempts'))
		{
			$this->session->set_userdata('attempts',0);
		}
		$attempts = $this->session->userdata('attempts');
		$this->session->set_userdata('attempts',$attempts+1);
		if($attempts >= 3)
		{
		//sleep(0.5 * $attempts * $attempts);
		}
	}
	
	function _send_activation_email($new_id){
		$host = $_SERVER['HTTP_HOST'];
		
		$this->db->where('id',$new_id);
		$user_account = $this->db->get('users')->row_array();
			$email = $this->content->get_page_merged("activation_email",
													array('activation_link'=>"$host/user/activate_account/". $user_account['activation_key']));
					$this->email_model->queue_email($this->config->config['generic_email'],
													$user_account['email_address'],
													$email['title'],
													$email['description'],
													"", 
													true);
		return true;
	}
	public function activate($activation_key){
		$this->db->where('activation_key',$activation_key);
		$update['active'] = '1';
		$this->db->update('users',$update);
		$this->db->where('activation_key',$activation_key);
		$q = $this->db->get('users')->result_array();
		return count($q) == 1;
	}

	function forgot_password($email_address){
		$forgot_password_hash = gen_uuid();
		$this->db->where('email_address',$email_address);
		$this->db->update('users',array('forgot_password_token'=>$forgot_password_hash));
		$records_affected = $this->db->affected_rows();
		return array('records_affected'=>$records_affected,'hash'=>$forgot_password_hash);
	}*/
}