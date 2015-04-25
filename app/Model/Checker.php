<?php
App::uses('AppModel', 'Model');
/**
 * Checker Model
 *
 */
class Checker extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'checker_name' => array(
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
