<div class="uacModules form">
<?php echo $this->Form->create('UacModule'); ?>
	<fieldset>
		<legend><?php echo __('Edit Uac Module'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UacModule.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('UacModule.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Uac Modules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Uac Sections'), array('controller' => 'uac_sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Section'), array('controller' => 'uac_sections', 'action' => 'add')); ?> </li>
	</ul>
</div>
