<div class="uacModules form">
<?php echo $this->Form->create('UacModule'); ?>
	<fieldset>
		<legend><?php echo __('Add Uac Module'); ?></legend>
	<?php
		echo $this->Form->input('controller');
		echo $this->Form->input('action');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Uac Modules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Uac Permissions'), array('controller' => 'uac_permissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Permission'), array('controller' => 'uac_permissions', 'action' => 'add')); ?> </li>
	</ul>
</div>
