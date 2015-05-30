<div class="perms form">
<?php echo $this->Form->create('Perm'); ?>
	<fieldset>
		<legend><?php echo __('Add Perm'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Perms'), array('action' => 'index')); ?></li>
	</ul>
</div>
