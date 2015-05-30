<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::uses('Common', 'Lib');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'pages',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        )
    );
    
    public function permitted($module = NULL, $section = NULL) {
        $univAllowed = array('users' => array('login' => 1, 'logout' => 1));
        if (!empty($univAllowed[$module]) && !empty($univAllowed[$module][$section])) {
            return TRUE;
        }
        $this->loadModel('UacPermission');
        $p = $this->UacPermission->getPermissions($this->Session->read('Auth.User.role'));
        $flag = FALSE;
        if (empty($section) && !empty($module)) {
            if (!empty($p[$module])) {
                $flag = TRUE;
            }
        }
        
        if (!empty($section)) {
            if (!empty($p[$module]) && !empty($p[$module][$section]) && $p[$module][$section] == 1) {
                $flag = TRUE;
            }
        }
        
        return $flag;
    }

    public function beforeFilter() {
        $controller = $this->request->params['controller'];
        $action     = $this->request->params['action'];
        if (!$this->permitted($controller, $action)) {
            throw new NotFoundException(__(NOT_ALLOWED));
        }
    }

}
