<div class="palletLoads form">
<?php echo $this->Form->create('PalletLoad'); ?>
	<fieldset>
		<legend><?php echo __('Edit Pallet Load'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PalletLoad.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('PalletLoad.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pallet Loads'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pallet Checklists'), array('controller' => 'pallet_checklists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pallet Checklist'), array('controller' => 'pallet_checklists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
