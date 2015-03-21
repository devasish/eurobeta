<div class="palletChecklists form">
<?php echo $this->Form->create('PalletChecklist'); ?>
	<fieldset>
		<legend><?php echo __('Add Pallet Checklist'); ?></legend>
	<?php
		echo $this->Form->input('container_id');
		echo $this->Form->input('sap_id');
		echo $this->Form->input('sap_code');
		echo $this->Form->input('sap_desc');
		echo $this->Form->input('product_cust_wt');
		echo $this->Form->input('no_of_pallet');
		echo $this->Form->input('empty_pallet_wt');
		echo $this->Form->input('empty_ctn_wt');
		echo $this->Form->input('net_product_wt');
		echo $this->Form->input('net_wt_per_ctn');
		echo $this->Form->input('gross_wt_per_ctn');
		echo $this->Form->input('diff');
		echo $this->Form->input('status');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pallet Checklists'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Containers'), array('controller' => 'containers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Container'), array('controller' => 'containers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saps'), array('controller' => 'saps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sap'), array('controller' => 'saps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pallet Loads'), array('controller' => 'pallet_loads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pallet Load'), array('controller' => 'pallet_loads', 'action' => 'add')); ?> </li>
	</ul>
</div>
