<?php
/* MeasureUnit Fixture generated on: 2010-11-06 13:11:34 : 1289047594 */
class MeasureUnitFixture extends CakeTestFixture {
	var $name = 'MeasureUnit';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'measure_unit_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'measure_unit_abbreviation' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'measure_unit_abbreviation_UNIQUE' => array('column' => 'measure_unit_abbreviation', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'measure_unit_name' => 'Lorem ipsum dolor sit amet',
			'measure_unit_abbreviation' => 'Lorem ip'
		),
	);
}
?>