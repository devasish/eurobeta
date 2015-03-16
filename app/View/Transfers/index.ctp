<div class="transfers index">
	<h2><?php echo __('Transfers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('sap_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sap_code'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('ctn_per_pallet'); ?></th>
			<th><?php echo $this->Paginator->sort('net_wt'); ?></th>
			<th><?php echo $this->Paginator->sort('remarks'); ?></th>
			<th><?php echo $this->Paginator->sort('serial_no'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transfers as $transfer): ?>
	<tr>
		<td><?php echo h($transfer['Transfer']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transfer['Sap']['id'], array('controller' => 'saps', 'action' => 'view', $transfer['Sap']['id'])); ?>
		</td>
		<td><?php echo h($transfer['Transfer']['sap_code']); ?>&nbsp;</td>
		<td><?php echo h($transfer['Transfer']['description']); ?>&nbsp;</td>
		<td><?php echo h($transfer['Transfer']['ctn_per_pallet']); ?>&nbsp;</td>
		<td><?php echo h($transfer['Transfer']['net_wt']); ?>&nbsp;</td>
		<td><?php echo h($transfer['Transfer']['remarks']); ?>&nbsp;</td>
		<td><?php echo h($transfer['Transfer']['serial_no']); ?>&nbsp;</td>
		<td><?php echo h($transfer['Transfer']['created']); ?>&nbsp;</td>
		<td><?php echo h($transfer['Transfer']['modified']); ?>&nbsp;</td>
		<td><?php echo h($transfer['Transfer']['status']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transfer['User']['id'], array('controller' => 'users', 'action' => 'view', $transfer['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transfer['Transfer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transfer['Transfer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transfer['Transfer']['id']), array(), __('Are you sure you want to delete # %s?', $transfer['Transfer']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transfer'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Saps'), array('controller' => 'saps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sap'), array('controller' => 'saps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
