<div class="palletLoads form">
<?php echo $this->Form->create('PalletLoad'); ?>
	<fieldset>
		<legend><?php echo __('Add Pallet Load'); ?></legend>
	<?php
		echo $this->Form->input('pallet_checklist_id');
		echo $this->Form->input('quantity');
		echo $this->Form->input('wt_with_pallet');
		echo $this->Form->input('wt_per_ctn');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pallet Loads'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pallet Checklists'), array('controller' => 'pallet_checklists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pallet Checklist'), array('controller' => 'pallet_checklists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
