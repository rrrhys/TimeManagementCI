<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_base_tables extends CI_Migration {

	public function up(){
		$this->dbforge->add_field(array(
			'id'=>array('type'=>'INT',
			'constraint'=>5,
			'unsigned'=>TRUE,
			'auto_increment'=>TRUE),
			'name'=>array('type'=>'VARCHAR',
			'constraint'=>'100'),
			'owner_id'=>array('type'=>'INT',
			'constraint'=>5)));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('customers');
	}
	public function down(){
		$this->dbforge->drop_table('customers');
	}
}