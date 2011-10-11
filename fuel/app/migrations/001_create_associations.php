<?php

namespace Fuel\Migrations;

class Create_associations {

	public function up()
	{
		\DBUtil::create_table('associations', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'code' => array('constraint' => 20, 'type' => 'varchar'),
			'name' => array('constraint' => 80, 'type' => 'varchar'),
			'address' => array('constraint' => 255, 'type' => 'varchar'),
			'phone' => array('constraint' => 20, 'type' => 'varchar'),
			'mobile' => array('constraint' => 20, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('associations');
	}
}