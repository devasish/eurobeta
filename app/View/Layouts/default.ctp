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
        echo $this->Html->css('menu');
        echo $this->Html->css('jquery-ui.min');

        echo $this->Html->script('jquery-1.11.2.min');
        echo $this->Html->script('jquery-ui.min');
        echo $this->Html->script('jquery-barcode.min');
        echo $this->Html->script('print');
        echo $this->Html->script('common');
        echo $this->Html->script('common_flash');
        echo $this->Html->script('highcharts');


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
                        <?php $perms = $this->Session->read('Auth.User.Perm'); ?>
                        <nav id="primary_nav_wrap"><!-- Main Menu starts -->
                            <ul>
                                <?php if (!empty($perms['pages']['index'])) : ?>
                                    <li class="<?php echo (($this->params['controller'] === 'pages') && ($this->params['action'] == 'index') ) ? 'active' : '' ?>">
                                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-dashboard"></span>' . '&nbsp;&nbsp;' . 'Dashboard', array('controller' => 'pages', 'action' => 'index'), array('escape' => FALSE)); ?>
                                    </li>
                                <?php endif; ?>

                                <?php if (!empty($perms['saps'])): ?>    
                                    <li class="parent <?php echo (($this->params['controller'] === 'saps') && ($this->params['action'] == 'index') ) ? 'active' : '' ?>">
                                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . '&nbsp;&nbsp;' . 'Saps', array('controller' => 'saps', 'action' => 'index'), array('escape' => FALSE)); ?>
                                        <?php if (!empty($perms['saps']['add'])): ?>
                                            <ul>
                                                <li>
                                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'New Sap', array('controller' => 'saps', 'action' => 'add'), array('escape' => FALSE)); ?>
                                                </li>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endif; ?>

                                <?php if (!empty($perms['transfers'])): ?>
                                    <li class="parent <?php echo (($this->params['controller'] === 'transfers') && ($this->params['action'] == 'index') ) ? 'active' : '' ?>">
                                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-stats"></span>' . '&nbsp;&nbsp;' . 'Transfers', array('controller' => 'transfers', 'action' => 'index'), array('escape' => FALSE)); ?>
                                        <?php if (!empty($perms['transfers']['add'])): ?>
                                            <ul>
                                                <li>
                                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Make Transfer', array('controller' => 'transfers', 'action' => 'add'), array('escape' => FALSE)); ?>
                                                </li>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endif; ?>
                                <?php if (!empty($perms['containers'])): ?>
                                <li class="parent <?php echo (($this->params['controller'] === 'containers') && ($this->params['action'] == 'index') ) ? 'active' : '' ?>">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-info-sign"></span>' . '&nbsp;&nbsp;' . 'Loading Advice', array('controller' => 'containers', 'action' => 'index'), array('escape' => FALSE)); ?>
                                    <?php if (!empty($perms['containers']['add'])): ?>
                                    <ul>
                                        <li>
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Add New Cointainer', array('controller' => 'containers', 'action' => 'add'), array('escape' => FALSE)); ?>
                                        </li>
                                    </ul>
                                    <?php endif; ?>
                                </li>
                                <?php endif; ?>
                                
                                <?php if (!empty($perms['reports'])): ?>
                                <li><a href="javascript:void(0)">
                                        <span class="glyphicon glyphicon-registration-mark"></span>&nbsp;&nbsp;Reports
                                    </a>
                                    <ul>
                                        <?php if (!empty($perms['reports']['containers'])) : ?>
                                        <li>
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Containers', array('controller' => 'reports', 'action' => 'containers'), array('escape' => FALSE)); ?>
                                        </li>
                                        <?php endif; ?>
                                        <?php if (!empty($perms['reports']['loading'])) : ?>
                                        <li>
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Loading Report', array('controller' => 'reports', 'action' => 'loading'), array('escape' => FALSE)); ?>
                                        </li>
                                        <?php endif; ?>
                                        <?php if (!empty($perms['reports']['loading_vplus_vminus'])) : ?>
                                        <li>
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Loading (V+ & V-) ', array('controller' => 'reports', 'action' => 'loading_vplus_vminus'), array('escape' => FALSE)); ?>
                                        </li>
                                        <?php endif; ?>
                                        <?php if (!empty($perms['reports']['ctn_loading_report'])) : ?>
                                        <li>
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'CTN Loading Report', array('controller' => 'reports', 'action' => 'ctn_loading_report'), array('escape' => FALSE)); ?>
                                        </li>
                                        <?php endif; ?>
                                        <?php if (!empty($perms['reports']['loading_analysis'])) : ?>
                                        <li>
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Loading Analysis', array('controller' => 'reports', 'action' => 'loading_analysis'), array('escape' => FALSE)); ?>
                                        </li>
                                        <?php endif; ?>
                                        <?php if (!empty($perms['reports']['transfer_report_1'])) : ?>
                                        <li>
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Transfer Report 1', array('controller' => 'reports', 'action' => 'transfer_report_1'), array('escape' => FALSE)); ?>
                                        </li>
                                        <?php endif; ?>
                                        <?php if (!empty($perms['reports']['transfer_report_2'])) : ?>
                                        <li>
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Transfer Report 2', array('controller' => 'reports', 'action' => 'transfer_report_2'), array('escape' => FALSE)); ?>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                                <?php endif; ?>
                                <?php if (!empty($perms['users'])) : ?>
                                <li class="parent <?php echo (($this->params['controller'] === 'users') && ($this->params['action'] == 'index') ) ? 'active' : '' ?>">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>' . '&nbsp;&nbsp;' . 'Users', array('controller' => 'users', 'action' => 'index'), array('escape' => FALSE)); ?>
                                    <?php if (!empty($perms['users']['add'])) : ?>
                                    <ul>
                                        <li>
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Create New User', array('controller' => 'users', 'action' => 'add'), array('escape' => FALSE)); ?>
                                        </li>                        
                                    </ul>
                                    <?php endif; ?>
                                </li>
                                <?php endif; ?>
                                <?php if (!empty($perms['users'])) : ?>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="glyphicon glyphicon-adjust"></span>&nbsp;&nbsp;Control Panel 
                                    </a>
                                    <ul>                                        
                                        <li>
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'List of Customer', array('controller' => 'customers', 'action' => 'index'), array('escape' => FALSE)); ?>
                                        </li>                                        
                                        <li>
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Loaders List', array('controller' => 'loaders', 'action' => 'index'), array('escape' => FALSE)); ?>
                                        </li>                                        
                                        <li>
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-share-alt"></span>' . '&nbsp;' . 'Checkers List', array('controller' => 'checkers', 'action' => 'index'), array('escape' => FALSE)); ?>
                                        </li>
                                    </ul>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </nav><!-- Main Menu end -->

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
        <!--<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">-->
        <div class="col-sm-12 col-sm-offset-0 col-lg-12 col-lg-offset-0 main">

            <?php echo $this->fetch('content'); ?>

            <?php echo $this->Session->flash(); ?>

        </div>

        <?php
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('bootstrap-datepicker');
        ?>

        <script type="text/javascript">
            $(document).ready(function () {
                !function ($) {
                    $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
                        $(this).find('em:first').toggleClass("glyphicon-minus");
                    });
                    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
                }(window.jQuery);

                $(window).on('resize', function () {
                    if ($(window).width() > 768)
                        $('#sidebar-collapse').collapse('show')
                })
                $(window).on('resize', function () {
                    if ($(window).width() <= 767)
                        $('#sidebar-collapse').collapse('hide')
                })

            });
        </script>
        <script>
            function exportTableToCSV($table, filename) {

                var $rows = $table.find('tr[no-export!="y"]:has(td)'),
                        // Temporary delimiter characters unlikely to be typed by keyboard
                        // This is to avoid accidentally splitting the actual contents
                        tmpColDelim = String.fromCharCode(11), // vertical tab character
                        tmpRowDelim = String.fromCharCode(0), // null character

                        // actual delimiter characters for CSV format
                        colDelim = '","',
                        rowDelim = '"\r\n"',
                        // Grab text from table into CSV formatted string
                        csv = '"' + $rows.map(function (i, row) {
                            var $row = $(row), $cols = $row.find('td');

                            return $cols.map(function (j, col) {
                                var $col = $(col), text = $col.text();

                                return text.replace('"', '""'); // escape double quotes

                            }).get().join(tmpColDelim);

                        }).get().join(tmpRowDelim)
                        .split(tmpRowDelim).join(rowDelim)
                        .split(tmpColDelim).join(colDelim) + '"',
                        // Data URI
                        csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

                $(this)
                        .attr({
                            'download': filename,
                            'href': csvData,
                            'target': '_blank'
                        });
            }
        </script> 
        <!--<?php echo $this->element('sql_dump'); ?>-->
    </body>
</html>
