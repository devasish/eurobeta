<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'Euro Beta-V1');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');
        echo $this->Html->css('font-awesome/css/font-awesome.min');
//        echo $this->Html->css('default');
        echo $this->Html->css('jquery-ui.min');

        echo $this->Html->script('jquery-1.11.2.min');
        echo $this->Html->script('jquery-ui.min');
        echo $this->Html->script('jquery-barcode.min');
        echo $this->Html->script('print');


        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <script type="text/javascript">
            var SITE_URL = '<?= SITE_URL ?>';
        </script>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1 style="display: inline-block"><?php echo $this->Html->link($cakeDescription, ''); ?></h1> 
                <div class="logout"><?php echo $this->Html->link('<i class="fa fa-power-off"></i>', array('controller' => 'users', 'action' => 'logout'), array('escape' => false)); ?></div></div>

            <div class="main-nav">
                <ul>
                    <li><?php echo $this->Html->link('Saps', array('controller' => 'saps', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link('Transfers', array('controller' => 'transfers', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link('Loading Advices', array('controller' => 'containers', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link('Pallet Checklist', array('controller' => 'pallet_checklists', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?></li>
                </ul>
            </div>
            <div id="content">
                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">
            </div>
        </div>
        <?php // echo $this->element('sql_dump'); ?>
    </body>
</html>
