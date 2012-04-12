<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_finance_table extends CI_Migration {

	public function up(){
			$this->dbforge->add_field(array(
			'id'=>array('type'=>'INT',
						'constraint'=>5,
						'unsigned'=>TRUE,
						'auto_increment'=>TRUE),
			'branch_name'=>array('type'=>'varchar',
						'constraint'=>'100'),
			'owner_id'=>array('type'=>'INT',
								'constraint'=>5)
			));
		$this->dbforge->add_field("cash_amount  decimal(9,2) NOT NULL DEFAULT 0");
		$this->dbforge->add_field("last_changed  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('cash_table');

		$this->dbforge->add_field('id');
			$this->dbforge->add_field(array(
			'id'=>array('type'=>'INT',
						'constraint'=>5,
						'unsigned'=>TRUE,
						'auto_increment'=>TRUE),
			'branch_name'=>array('type'=>'varchar',
						'constraint'=>'100'),
			'reference'=>array('type'=>'varchar',
						'constraint'=>'200'),
			'owner_id'=>array('type'=>'INT',
								'constraint'=>5)
			));	
		$this->dbforge->add_field("cash_amount  decimal(9,2) NOT NULL DEFAULT 0");		$this->dbforge->add_field("date_created  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->create_table('transaction_log');
	

	}
	public function down(){
		$this->dbforge->drop_table('cash_table');
		$this->dbforge->drop_table('transaction_log');
	}
}