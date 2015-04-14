<?php

App::uses('AppController', 'Controller');

class ReportsController extends AppController {

    public $components = array('Paginator');

    /**
     * Loading Report F1, F3 and combined
     */
    public function loading() {
        $this->loadModel('Sap');
        $this->loadModel('PalletChecklist');

        $this->paginate = array(
            'fields' => array(
                'Sap.sapcode',
                'Sap.description',
                'ROUND(SUM(net_product_wt), 2) as total_net_product_wt',
                'SUM(no_of_ctn) AS total_no_of_ctn',
                '(ROUND(SUM(net_wt_per_ctn) / COUNT(sap_id), 2)) AS avg_net_wt_per_ctn',
                'ROUND(SUM(diff), 2) AS total_diff',
                'ROUND((SUM(net_wt_per_ctn) - SUM(product_cust_wt)) / SUM(product_cust_wt) *100, 2) AS total_diff_perc',
            ),
            'recursive' => 0,
            'conditions' => array(),
            'group' => array('PalletChecklist.sap_id'),
            'limit' => 20
        );

        $this->set('palletLoads', $this->Paginator->paginate('PalletChecklist'));
    }

    public function ctn_loading_report () {
        
    }
    
    public function ctn_loading_report_data () {
        $this->layout = 'ajax';
        $this->loadModel('PalletChecklist');
        
        $sap_code = $this->request->data['sapcode'];
        
        $res = $this->PalletChecklist->find('all', 
                array('conditions' => array('sap_code' => $sap_code)));
        
        
        $s = array();
        
//        if (!empty($res)) {
//            foreach ($res as $key => $row) {
//                $s[$key]['label'] = $row['Sap']['sapcode'];
//                $s[$key]['value'] = $row['Sap']['sapcode'];
////                $s[$key]['data'] = $row;
//            }
//        }
        
        $this->set('arr', $res);
        
    }
}
