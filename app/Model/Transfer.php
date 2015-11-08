<?php
App::uses('AppModel', 'Model');
/**
 * Transfer Model
 *
 * @property Sap $Sap
 * @property User $User
 */
class Transfer extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'sap_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sap_code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ctn_per_pallet' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'net_wt' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'transfer_date' => array(
//			'numeric' => array(
//				'rule' => array('date'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
		),
                'remarks' => array(
//			'notEmpty' => array(
//				//'rule' => array(),
//				//'message' => 'Your custom message here',
//				'allowEmpty' => true,
//				'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
		),
		'serial_no' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'serial_index' => array(
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
		'Sap' => array(
			'className' => 'Sap',
			'foreignKey' => 'sap_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Editor' => array(
			'className' => 'User',
			'foreignKey' => 'modified_by',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        /**
         * Report data by per product id 
         * @param type $date
         * @return type
         */
        public function report_1_data($params = array()) {
            $where = '';
            $where .= !empty($params['cal_from']) ? ' AND transfer_date >= "' . $params['cal_from'].'"' : '';
            $where .= !empty($params['cal_to']) ? ' AND transfer_date <= "' . $params['cal_to'].' 23:59:59"' : '';
            $where .= !empty($params['factory']) ? ' AND users.role = ' . $params['factory'] : '';
            $where .= !empty($params['sapcode']) ? ' AND sap_code = "' . $params['sapcode'].'"' : '';
            $where .= !empty($params['description']) ? ' AND description LIKE "%' . $params['description'].'%"' : '';
            $sql_morning = "(SELECT "
                    . " sap_id,"
                    . " SUM(ctn_per_pallet) AS total_ctn_per_pallet_m, "
                    . " ROUND(SUM(net_wt),2) AS total_net_wt_m"
                    . " FROM transfers "
                    . " INNER JOIN users on transfers.user_id=users.id "
                    . " WHERE 1 " . $where . " AND shift = 0 "
                    . " GROUP BY sap_id) AS morning ";
            
            $sql_night = "(SELECT "
                    . " sap_id,"
                    . " SUM(ctn_per_pallet) AS total_ctn_per_pallet_n, "
                    . " ROUND(SUM(net_wt),2) AS total_net_wt_n"
                    . " FROM transfers "
                    . " INNER JOIN users on transfers.user_id=users.id "
                    . " WHERE 1 " . $where . " AND shift = 1 "
                    . " GROUP BY sap_id) AS night ";
            
            $sql = "SELECT "
                    . " sap.sapcode, 
                        sap.description, 
                        sap.net_wt, 
                        sap.id, 
                        IFNULL(total_ctn_per_pallet_m, 0) AS total_ctn_per_pallet_m, 
                        IFNULL(total_net_wt_m, 0) AS total_net_wt_m, 
                        IFNULL(total_ctn_per_pallet_n, 0) AS total_ctn_per_pallet_n, 
                        IFNULL(total_net_wt_n, 0) AS total_net_wt_n"
                    . " FROM " . $sql_morning . " "
                    . " LEFT JOIN " . $sql_night . " ON morning.sap_id = night.sap_id "
                    . " LEFT JOIN saps AS sap ON morning.sap_id = sap.id"
                    . " UNION "
                    . " SELECT "
                    . " sap.sapcode, 
                        sap.description, 
                        sap.net_wt, 
                        sap.id, 
                        IFNULL(total_ctn_per_pallet_m, 0) AS total_ctn_per_pallet_m, 
                        IFNULL(total_net_wt_m, 0) AS total_net_wt_m, 
                        IFNULL(total_ctn_per_pallet_n, 0) AS total_ctn_per_pallet_n, 
                        IFNULL(total_net_wt_n, 0) AS total_net_wt_n"
                    . " FROM " . $sql_morning . " "
                    . " RIGHT JOIN " . $sql_night . " ON morning.sap_id = night.sap_id "
                    . " LEFT JOIN saps AS sap ON night.sap_id = sap.id"
                    ;
            $data = $this->query($sql);
            return $data;
        }
        
        public function report_3_data($params = array()) {
            $where = '';
            $where .= !empty($params['cal_from']) ? ' AND transfer_date >= "' . $params['cal_from'].'"' : '';
            $where .= !empty($params['cal_to']) ? ' AND transfer_date <= "' . $params['cal_to'].' 23:59:59"' : '';
            $where .= !empty($params['serial_no']) ? ' AND serial_no = "' . $params['serial_no'].'"' : '';
            $where .= !empty($params['sapcode']) ? ' AND sap_code = "' . $params['sapcode'].'"' : '';
            
            $sql = "SELECT "
                    . " sap_code,
                        serial_no, 
                        transfer_date, 
                        loaded_serial_no,
                        pallet_loads.created"                          
                    . " FROM transfers "
                    . " LEFT JOIN pallet_loads on transfers.serial_no = pallet_loads.loaded_serial_no "  
                    . " WHERE 1 " . $where  
                    ;
            $data = $this->query($sql); 
            return $data;
            
            
        }
}
