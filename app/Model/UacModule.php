<?php

App::uses('AppModel', 'Model');

/**
 * UacModule Model
 *
 * @property UacPermission $UacPermission
 */
class UacModule extends AppModel {
    
    public $displayField = 'name';
    public $virtualFields = array(
        'name' => "CONCAT(UacModule.controller, '/', UacModule.action)"
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'controller' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'action' => array(
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

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'UacPermission' => array(
            'className' => 'UacPermission',
            'foreignKey' => 'uac_module_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    
}
