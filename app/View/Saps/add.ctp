<div class="saps form">
<?php echo $this->Form->create('Sap'); ?>
	<fieldset>
		<legend><?php echo __('Add Sap'); ?></legend>
	<?php
		echo $this->Form->input('sapcode');
		echo $this->Form->input('description');
		echo $this->Form->input('net_wt');
		echo $this->Form->input('gross_wt', array('value' => 0));
		echo $this->Form->input('empty_ctn_wt', array('value' => 0));
		echo $this->Form->input('cbm', array('value' => 0));
		echo $this->Form->input('ctn_per_pallet', array('value' => 0));
		echo $this->Form->input('status', array('options' => array("1" => "Active", '0' => "Inactive")));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Saps'), array('action' => 'index')); ?></li>
	</ul>
</div>
