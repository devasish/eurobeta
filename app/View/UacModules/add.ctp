<div class="uacModules form">
<?php echo $this->Form->create('UacModule'); ?>
	<fieldset>
		<legend><?php echo __('Add Uac Module'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Uac Modules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Uac Sections'), array('controller' => 'uac_sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Section'), array('controller' => 'uac_sections', 'action' => 'add')); ?> </li>
	</ul>
</div>
