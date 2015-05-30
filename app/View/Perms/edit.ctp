<div class="perms form">
<?php echo $this->Form->create('Perm'); ?>
	<fieldset>
		<legend><?php echo __('Edit Perm'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('role');
		echo $this->Form->input('controller');
		echo $this->Form->input('action');
		echo $this->Form->input('permitted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Perm.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Perm.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Perms'), array('action' => 'index')); ?></li>
	</ul>
</div>
