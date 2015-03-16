<div class="saps index">
	<h2><?php echo __('Saps'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('sapcode'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('net_wt'); ?></th>
			<th><?php echo $this->Paginator->sort('gross_wt'); ?></th>
			<th><?php echo $this->Paginator->sort('empty_ctn_wt'); ?></th>
			<th><?php echo $this->Paginator->sort('cbm'); ?></th>
			<th><?php echo $this->Paginator->sort('ctn_per_pallete'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($saps as $sap): ?>
	<tr>
		<td><?php echo h($sap['Sap']['id']); ?>&nbsp;</td>
		<td><?php echo h($sap['Sap']['sapcode']); ?>&nbsp;</td>
		<td><?php echo h($sap['Sap']['description']); ?>&nbsp;</td>
		<td><?php echo h($sap['Sap']['net_wt']); ?>&nbsp;</td>
		<td><?php echo h($sap['Sap']['gross_wt']); ?>&nbsp;</td>
		<td><?php echo h($sap['Sap']['empty_ctn_wt']); ?>&nbsp;</td>
		<td><?php echo h($sap['Sap']['cbm']); ?>&nbsp;</td>
		<td><?php echo h($sap['Sap']['ctn_per_pallete']); ?>&nbsp;</td>
		<td><?php echo h($sap['Sap']['created']); ?>&nbsp;</td>
		<td><?php echo h($sap['Sap']['modified']); ?>&nbsp;</td>
		<td><?php echo h($sap['Sap']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sap['Sap']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sap['Sap']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sap['Sap']['id']), array(), __('Are you sure you want to delete # %s?', $sap['Sap']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Sap'), array('action' => 'add')); ?></li>
	</ul>
</div>
