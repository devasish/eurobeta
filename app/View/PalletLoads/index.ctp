<div class="palletLoads index">
	<h2><?php echo __('Pallet Loads'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('pallet_checklist_id'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('wt_with_pallet'); ?></th>
			<th><?php echo $this->Paginator->sort('wt_per_ctn'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($palletLoads as $palletLoad): ?>
	<tr>
		<td><?php echo h($palletLoad['PalletLoad']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($palletLoad['PalletChecklist']['id'], array('controller' => 'pallet_checklists', 'action' => 'view', $palletLoad['PalletChecklist']['id'])); ?>
		</td>
		<td><?php echo h($palletLoad['PalletLoad']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($palletLoad['PalletLoad']['wt_with_pallet']); ?>&nbsp;</td>
		<td><?php echo h($palletLoad['PalletLoad']['wt_per_ctn']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($palletLoad['User']['id'], array('controller' => 'users', 'action' => 'view', $palletLoad['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $palletLoad['PalletLoad']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $palletLoad['PalletLoad']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $palletLoad['PalletLoad']['id']), array(), __('Are you sure you want to delete # %s?', $palletLoad['PalletLoad']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Pallet Load'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pallet Checklists'), array('controller' => 'pallet_checklists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pallet Checklist'), array('controller' => 'pallet_checklists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
