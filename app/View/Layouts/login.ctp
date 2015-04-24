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
    <body class="login-bg">           
                <?php echo $this->fetch('content'); ?>

                <?php echo $this->Session->flash(); ?>
        
        
        <?php
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('bootstrap-datepicker');
        ?>
        
	<script type="text/javascript">
            $(document).ready(function() {
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
                
                });
	</script>
        <!--<?php  echo $this->element('sql_dump'); ?>-->
    </body>
</html>
