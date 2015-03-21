<div class="palletChecklists index">
	<h2><?php echo __('Pallet Checklists'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('container_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sap_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sap_code'); ?></th>
			<th><?php echo $this->Paginator->sort('sap_desc'); ?></th>
			<th><?php echo $this->Paginator->sort('product_cust_wt'); ?></th>
			<th><?php echo $this->Paginator->sort('no_of_pallet'); ?></th>
			<th><?php echo $this->Paginator->sort('empty_pallet_wt'); ?></th>
			<th><?php echo $this->Paginator->sort('empty_ctn_wt'); ?></th>
			<th><?php echo $this->Paginator->sort('net_product_wt'); ?></th>
			<th><?php echo $this->Paginator->sort('net_wt_per_ctn'); ?></th>
			<th><?php echo $this->Paginator->sort('gross_wt_per_ctn'); ?></th>
			<th><?php echo $this->Paginator->sort('diff'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($palletChecklists as $palletChecklist): ?>
	<tr>
		<td><?php echo h($palletChecklist['PalletChecklist']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($palletChecklist['Container']['id'], array('controller' => 'containers', 'action' => 'view', $palletChecklist['Container']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($palletChecklist['Sap']['id'], array('controller' => 'saps', 'action' => 'view', $palletChecklist['Sap']['id'])); ?>
		</td>
		<td><?php echo h($palletChecklist['PalletChecklist']['sap_code']); ?>&nbsp;</td>
		<td><?php echo h($palletChecklist['PalletChecklist']['sap_desc']); ?>&nbsp;</td>
		<td><?php echo h($palletChecklist['PalletChecklist']['product_cust_wt']); ?>&nbsp;</td>
		<td><?php echo h($palletChecklist['PalletChecklist']['no_of_pallet']); ?>&nbsp;</td>
		<td><?php echo h($palletChecklist['PalletChecklist']['empty_pallet_wt']); ?>&nbsp;</td>
		<td><?php echo h($palletChecklist['PalletChecklist']['empty_ctn_wt']); ?>&nbsp;</td>
		<td><?php echo h($palletChecklist['PalletChecklist']['net_product_wt']); ?>&nbsp;</td>
		<td><?php echo h($palletChecklist['PalletChecklist']['net_wt_per_ctn']); ?>&nbsp;</td>
		<td><?php echo h($palletChecklist['PalletChecklist']['gross_wt_per_ctn']); ?>&nbsp;</td>
		<td><?php echo h($palletChecklist['PalletChecklist']['diff']); ?>&nbsp;</td>
		<td><?php echo h($palletChecklist['PalletChecklist']['status']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($palletChecklist['User']['id'], array('controller' => 'users', 'action' => 'view', $palletChecklist['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $palletChecklist['PalletChecklist']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $palletChecklist['PalletChecklist']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $palletChecklist['PalletChecklist']['id']), array(), __('Are you sure you want to delete # %s?', $palletChecklist['PalletChecklist']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pallet Checklist'), array('action' => 'add')); ?></li>
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
