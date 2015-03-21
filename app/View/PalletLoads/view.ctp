<div class="palletLoads view">
<h2><?php echo __('Pallet Load'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($palletLoad['PalletLoad']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pallet Checklist'); ?></dt>
		<dd>
			<?php echo $this->Html->link($palletLoad['PalletChecklist']['id'], array('controller' => 'pallet_checklists', 'action' => 'view', $palletLoad['PalletChecklist']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($palletLoad['PalletLoad']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wt With Pallet'); ?></dt>
		<dd>
			<?php echo h($palletLoad['PalletLoad']['wt_with_pallet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wt Per Ctn'); ?></dt>
		<dd>
			<?php echo h($palletLoad['PalletLoad']['wt_per_ctn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($palletLoad['User']['id'], array('controller' => 'users', 'action' => 'view', $palletLoad['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pallet Load'), array('action' => 'edit', $palletLoad['PalletLoad']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pallet Load'), array('action' => 'delete', $palletLoad['PalletLoad']['id']), array(), __('Are you sure you want to delete # %s?', $palletLoad['PalletLoad']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pallet Loads'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pallet Load'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pallet Checklists'), array('controller' => 'pallet_checklists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pallet Checklist'), array('controller' => 'pallet_checklists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
