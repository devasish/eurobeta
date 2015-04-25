<?php
App::uses('AppModel', 'Model');
/**
 * Loader Model
 *
 */
class Loader extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'loader_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
