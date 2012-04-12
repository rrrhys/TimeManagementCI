<?

class Finance_model extends CI_Model 
{
	public $errors = array();
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_balance($owner_id,$branch_name="default"){
      $this->db->where('owner_id',$owner_id);
      $this->db->where('branch_name',$branch_name);
      $q = $this->db->get('cash_table')->row_array();
      if($q){
        return $q['cash_amount'];
      }
      else{
        return 0;
      }
    }
    public function get_movements($owner_id,$how_many=50,$branch_name="default"){
      $this->db->where('owner_id',$owner_id);
      $this->db->where('branch_name',$branch_name);
      $q = $this->db->get('transaction_log',$how_many,0)->result_array();
      return $q;
    }
    public function add_branch_if_not_exists($owner_id,$branch_name="default"){
      $this->db->where('owner_id',$owner_id);
      $this->db->where('branch_name',$branch_name);
      $q = $this->db->get('cash_table')->row_array();
      if(!$q){
        $insert = array();
        $insert['owner_id'] = $owner_id;
        $insert['branch_name'] = $branch_name;
        $this->db->insert('cash_table',$insert);
      }
      return true;
    }
    public function cash_movement($owner_id,$cash_amount,$reference,$branch_name="default"){
        $this->add_branch_if_not_exists($owner_id);
       $transaction_log = array();
       $transaction_log['cash_amount'] = $cash_amount;
       $transaction_log['reference'] = $reference;
       $transaction_log['branch_name'] = $branch_name;
       $transaction_log['owner_id'] = $owner_id;
       $this->db->trans_start();
       $this->db->insert('transaction_log',$transaction_log);
       $this->db->where('owner_id',$owner_id);
       $this->db->where('branch_name',$branch_name);
       $q = $this->db->get('cash_table')->row_array();
       if($q){
         $new_balance = $q;
         $new_balance['cash_amount'] += $cash_amount;
      $this->db->where('id',$new_balance['id']);
      $this->db->update('cash_table',$new_balance);
         $this->db->trans_complete();
         return true;
       }else{
         $this->db->trans_rollback();
         $this->errors[] = "Transaction failed.";
         return false;
       }
       

    }
    public function cash_allocated($owner_id,$cash_amount,$cash_description,$branch_name="default"){
       $transaction_log = array();
       $transaction_log['cash_amount'] = $cash_amount;
       $transaction_log['reference'] = $reference;
       $transaction_log['branch_name'] = $branch_name;
       $transaction_log['status'] = "pending";
       $this->db->trans_start();
       $this->db->insert('transaction_log',$transaction_log);
       $this->db->where('owner_id',$owner_id);
       $this->db->where('branch_name',$branch_name);
       $q = $this->db->get('cash_table')->row_array();
       if($q){
         $new_balance = $q;
         $new_balance['cash_allocated'] += $cash_amount;
         $this->db->trans_complete();
       }else{
         $this->db->trans_rollback();
       }
             
    }
}