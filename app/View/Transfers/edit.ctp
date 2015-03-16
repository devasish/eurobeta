<div class="transfers form">
<?php echo $this->Form->create('Transfer'); ?>
	<fieldset>
		<legend><?php echo __('Edit Transfer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('sap_id');
		echo $this->Form->input('sap_code');
		echo $this->Form->input('description');
		echo $this->Form->input('ctn_per_pallet');
		echo $this->Form->input('net_wt');
		echo $this->Form->input('remarks');
		echo $this->Form->input('serial_no');
		echo $this->Form->input('status');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Transfer.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Transfer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Transfers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Saps'), array('controller' => 'saps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sap'), array('controller' => 'saps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
