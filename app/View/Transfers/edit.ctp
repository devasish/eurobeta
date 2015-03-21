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

		<li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>'.'&nbsp;&nbsp;'. __('Delete Transfer'), array('action' => 'delete', $this->Form->value('Transfer.id')), array('escape'=>FALSE), __('Are you sure you want to delete # %s?', $this->Form->value('Transfer.id'))); ?></li>
		<li><?php echo $this->Html->link('<i class="fa fa-list"></i>'.'&nbsp;&nbsp;'. __('Transfers List'), array('action' => 'index'), array('escape'=>FALSE)); ?></li>
                <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>'.'&nbsp;&nbsp;'. __('New Transfer'), array('action' => 'add'), array('escape'=> FALSE)); ?></li>
	</ul>
</div>
