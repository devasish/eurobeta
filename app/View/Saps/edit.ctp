<div class="saps form">
<?php echo $this->Form->create('Sap'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sap'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('sapcode');
		echo $this->Form->input('description');
		echo $this->Form->input('net_wt');
		echo $this->Form->input('gross_wt');
		echo $this->Form->input('empty_ctn_wt');
		echo $this->Form->input('cbm');
		echo $this->Form->input('ctn_per_pallet');
		echo $this->Form->input('status', array('options' => Configure::read('STATUS')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>'.'&nbsp;&nbsp;'. __('Delete Sap'), array('action' => 'delete', $this->Form->value('Sap.id')), array('escape'=>FALSE), __('Are you sure you want to delete # %s?', $this->Form->value('Sap.id'))); ?></li>
		<li><?php echo $this->Html->link('<i class="fa fa-list"></i>'.'&nbsp;&nbsp;'. __('Saps List'), array('action' => 'index'), array('escape'=>FALSE)); ?></li>
	</ul>
</div>
