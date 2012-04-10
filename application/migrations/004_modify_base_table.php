<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Modify_base_table extends CI_Migration {

	public function up(){
		$arr = array('customer_id'=>array(
				'name'=>'customer_name',
				'type'=>'text',
				'constraint'=>100));
		$this->dbforge->modify_column('times_entered',$arr);

	}
	public function down(){
		$arr = array('customer_name'=>array('type'=>'INT',
						'constraint'=>5,
						'unsigned'=>TRUE));
				$this->dbforge->modify_column('times_entered',$arr);
	}
}