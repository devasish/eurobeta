<div class="uacSections form">
<?php echo $this->Form->create('UacSection'); ?>
	<fieldset>
		<legend><?php echo __('Add Uac Section'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('uac_module_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Uac Sections'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Uac Modules'), array('controller' => 'uac_modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Module'), array('controller' => 'uac_modules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uac Permissions'), array('controller' => 'uac_permissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Permission'), array('controller' => 'uac_permissions', 'action' => 'add')); ?> </li>
	</ul>
</div>
