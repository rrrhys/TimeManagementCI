<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users_table extends CI_Migration {

	public function up(){
		$this->dbforge->add_field(array(
			'id'=>array('type'=>'INT',
						'constraint'=>5,
						'unsigned'=>TRUE,
						'auto_increment'=>TRUE),
			'email_address'=>array('type'=>'VARCHAR',
								'constraint'=>'100'),
			'password'=>array('type'=>'varchar',
								'constraint'=>'100'),
			'active'=>array('type'=>'TINYINT',
								'default'=>'0'),
			'auth_level'=>array('type'=>'TINYINT',
								'default'=>'0')
			));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');
	}
	public function down(){
		$this->dbforge->drop_table('users');
	}
}