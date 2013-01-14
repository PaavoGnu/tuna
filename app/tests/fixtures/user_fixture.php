<?php
/* User Fixture generated on: 2010-11-05 23:11:25 : 1288995745 */
class UserFixture extends CakeTestFixture {
	var $name = 'User';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'user_real_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'entity_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'unique'),
		'user_password' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'user_enabled' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'user_name_UNIQUE' => array('column' => 'user_name', 'unique' => 1), 'entity_id_UNIQUE' => array('column' => 'entity_id', 'unique' => 1), 'fk_users_entities' => array('column' => 'entity_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'user_name' => 'Lorem ipsum dolor ',
			'user_real_name' => 'Lorem ipsum dolor sit amet',
			'entity_id' => 1,
			'user_password' => 'Lorem ipsum dolor sit amet',
			'user_enabled' => 1
		),
	);
}
?>