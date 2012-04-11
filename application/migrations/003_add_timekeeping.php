<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_timekeeping extends CI_Migration {

	public function up(){
		$this->dbforge->add_field(array(
			'id'=>array('type'=>'INT',
						'constraint'=>5,
						'unsigned'=>TRUE,
						'auto_increment'=>TRUE),
			'customer_id'=>array('type'=>'INT',
						'constraint'=>5,
						'unsigned'=>TRUE),
			'work_type'=>array('type'=>'varchar',
						'constraint'=>'100'),
			'work_description'=>array('type'=>'varchar',
						'constraint'=>'500','null'=>true),
			'work_comments'=>array('type'=>'varchar',
						'constraint'=>'500','null'=>true),
			'job_number'=>array('type'=>'varchar',
						'constraint'=>'50'),
			'datetime_started'=>array('type'=>'datetime','null'=>true),
			'datetime_finished'=>array('type'=>'datetime','null'=>true),
			'owner_id'=>array('type'=>'INT',
								'constraint'=>5)
			));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('times_entered');
	}
	public function down(){
		$this->dbforge->drop_table('times_entered');
	}
}