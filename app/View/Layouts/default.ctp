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

        echo $this->Html->css('bootstrap');
        echo $this->Html->css('custom');
        echo $this->Html->css('bootstrap-table');
        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('box');
        echo $this->Html->css('datepicker3');
        echo $this->Html->css('styles');
        echo $this->Html->css('jquery-ui.min');

        echo $this->Html->script('jquery-1.11.2.min');
        echo $this->Html->script('jquery-ui.min');
        echo $this->Html->script('jquery-barcode.min');
        echo $this->Html->script('print');
        echo $this->Html->script('common');
        echo $this->Html->script('common_flash');


        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <script type="text/javascript">
            var SITE_URL = '<?= SITE_URL ?>';
        </script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span><?php echo $cakeDescription; ?></span> Admin</a>
                    <?php if ($this->Session->read('Auth.User.id')): ?>
                        <ul class="user-menu">
                            <li class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php print ucfirst($this->Session->read('Auth.User.username')); ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>' . '&nbsp;&nbsp;' . __('Profile'), array('controller' => 'users', 'action' => 'view', $this->Session->read('Auth.User.id')), array('escape' => FALSE)); ?></li>                                
                                    <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-log-out"></span>' . '&nbsp;&nbsp;' . __('Logout'), array('controller' => 'users', 'action' => 'logout'), array('escape' => false)); ?></li>
                                </ul>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        <?php if ($this->Session->read('Auth.User.id')): ?>
            <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
                <form role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
                <ul class="nav menu">

                    <li class="<?php echo (($this->params['controller'] === 'pages') && ($this->params['action'] == 'index') ) ? 'active' : '' ?>">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-dashboard"></span>' . '&nbsp;' . 'Dashboard', array('controller' => 'pages', 'action' => 'index'), array('escape' => FALSE)); ?>
                    </li>

                    <li class="parent <?php echo (($this->params['controller'] === 'saps') && ($this->params['action'] == 'index') ) ? 'active' : '' ?>">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . '&nbsp;' . 'Saps' . '<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span>', array('controller' => 'saps', 'action' => 'index'), array('escape' => FALSE)); ?>               
                        <ul class="children collapse" id="sub-item-1">
                            <li>
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'New Sap', array('controller' => 'saps', 'action' => 'add'), array('escape' => FALSE)); ?>
                            </li>                        
                        </ul>
                    </li>
                    <li class="parent <?php echo (($this->params['controller'] === 'transfers') && ($this->params['action'] == 'index') ) ? 'active' : '' ?>">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-stats"></span>' . '&nbsp;' . 'Transfers' . '<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span>', array('controller' => 'transfers', 'action' => 'index'), array('escape' => FALSE)); ?>                    
                        <ul class="children collapse" id="sub-item-2">
                            <li>
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Make Transfer', array('controller' => 'transfers', 'action' => 'add'), array('escape' => FALSE)); ?>
                            </li>                        					
                        </ul>
                    </li>
                    <li class="parent <?php echo (($this->params['controller'] === 'containers') && ($this->params['action'] == 'index') ) ? 'active' : '' ?>">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-info-sign"></span>' . '&nbsp;' . 'Loading Advice' . '<span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span>', array('controller' => 'containers', 'action' => 'index'), array('escape' => FALSE)); ?>                    
                        <ul class="children collapse" id="sub-item-3">
                            <li>
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Add New Cointainer', array('controller' => 'containers', 'action' => 'add'), array('escape' => FALSE)); ?>
                            </li>                        
                        </ul>
                    </li>
                    <li class="parent">
                        <a href="javascript:void(0)">
                            <span class="glyphicon glyphicon-registration-mark"></span> Reports<span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
                        </a>
                        <ul class="children collapse" id="sub-item-5">
                            <li>
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Loading Report', array('controller' => 'reports', 'action' => 'loading'), array('escape' => FALSE)); ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'CTN Loading Report', array('controller' => 'reports', 'action' => 'ctn_loading_report'), array('escape' => FALSE)); ?>
                            </li> 
                            <li>
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Loading Analysis', array('controller' => 'reports', 'action' => 'loading_analysis'), array('escape' => FALSE)); ?>
                            </li> 
                        </ul>
                    </li>    
                    <li role="presentation" class="divider"></li>
                    <li class="parent <?php echo (($this->params['controller'] === 'users') && ($this->params['action'] == 'index') ) ? 'active' : '' ?>">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>' . '&nbsp;' . 'Users' . '<span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> ', array('controller' => 'users', 'action' => 'index'), array('escape' => FALSE)); ?>
                        <ul class="children collapse" id="sub-item-4">
                            <li>
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Create New User', array('controller' => 'users', 'action' => 'add'), array('escape' => FALSE)); ?>
                            </li>                        
                        </ul>
                    </li>
                    <li role="presentation" class="divider"></li>
                    <li class="parent">
                        <a href="javascript:void(0)">
                            <span class="glyphicon glyphicon-adjust"></span>Control Panel<span data-toggle="collapse" href="#sub-item-6" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
                        </a>
                        <ul class="children collapse" id="sub-item-6">
                            <li>
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'New Customer', array('controller' => 'customers', 'action' => 'add'), array('escape' => FALSE)); ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'List of Customer', array('controller' => 'customers', 'action' => 'index'), array('escape' => FALSE)); ?>
                            </li>					
                        </ul>
                    </li>
                </ul>
                <div class="attribution">&copy; euro sme sdn bhd  <b style="color: #006dcc"><?php echo date('Y'); ?></b></div>
            </div><!--/.sidebar-->
        <?php endif; ?>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

            <?php echo $this->fetch('content'); ?>

            <?php echo $this->Session->flash(); ?>

        </div>

        <?php
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('bootstrap-datepicker');
        ?>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#transferDate').datepicker({
                });

                !function($) {
                    $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
                        $(this).find('em:first').toggleClass("glyphicon-minus");
                    });
                    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
                }(window.jQuery);

                $(window).on('resize', function() {
                    if ($(window).width() > 768)
                        $('#sidebar-collapse').collapse('show')
                })
                $(window).on('resize', function() {
                    if ($(window).width() <= 767)
                        $('#sidebar-collapse').collapse('hide')
                })

            });
        </script>
        <!--<?php echo $this->element('sql_dump'); ?>-->
    </body>
</html>
