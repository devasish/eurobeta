<div class="uacPermissions form">
<?php echo $this->Form->create('UacPermission'); ?>
	<fieldset>
		<legend><?php echo __('Edit Uac Permission'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('uac_section_id');
		echo $this->Form->input('role');
		echo $this->Form->input('permitted');
		echo $this->Form->input('remarks');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UacPermission.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('UacPermission.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Uac Permissions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Uac Sections'), array('controller' => 'uac_sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Section'), array('controller' => 'uac_sections', 'action' => 'add')); ?> </li>
	</ul>
</div>
