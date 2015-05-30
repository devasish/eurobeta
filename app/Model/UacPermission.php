<?php
App::uses('AppModel', 'Model');
/**
 * UacPermission Model
 *
 * @property UacSection $UacSection
 */
class UacPermission extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'uac_section_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'role' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'permitted' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'UacSection' => array(
			'className' => 'UacSection',
			'foreignKey' => 'uac_section_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        public function get($role) {
            $q = "SELECT UM.*, UP.*, US.*  
                FROM uac_modules AS UM 
                INNER JOIN uac_sections AS US ON US.uac_module_id = UM.id 
                INNER JOIN uac_permissions AS UP ON UP.uac_section_id = US.id 
                WHERE 1
                AND UP.role = '".$role."'
                AND UP.permitted = 1
                ";
            
            
            $result = $this->query($q);
            $permissions = array();
            foreach ($result as $key => $arr) {
                $permissions[$arr['UM']['slug']][$arr['US']['slug']] = $arr['UP']['permitted'];
            }
            
            return $permissions;
        }
}
