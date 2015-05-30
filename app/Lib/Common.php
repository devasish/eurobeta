<?php

class Common {

    public $components = array('Session');

    function alwd($module, $section) {
        $perm = $this->Session->read('Auth.User.Perm');
        return true;
    }

}
