<div class="uacPermissions form">
<?php echo $this->Form->create('UacPermission'); ?>
	<fieldset>
		<legend><?php echo __('Add Uac Permission'); ?></legend>
	<?php
		echo $this->Form->input('uac_module_id');
		echo $this->Form->input('role', array('options' => Configure::read('ROLES')));
		echo $this->Form->input('permitted', array('type' => 'checkbox'));
		echo $this->Form->input('remarks');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Uac Permissions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Uac Modules'), array('controller' => 'uac_modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Module'), array('controller' => 'uac_modules', 'action' => 'add')); ?> </li>
	</ul>
</div>
