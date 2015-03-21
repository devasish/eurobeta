<div class="containers index">
	<h2><?php echo __('Containers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('container_no'); ?></th>
			<th><?php echo $this->Paginator->sort('seal_no'); ?></th>
			<th><?php echo $this->Paginator->sort('empty_tare_wt'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('vp_ctn'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($containers as $container): ?>
	<tr>
		<td><?php echo h($container['Container']['id']); ?>&nbsp;</td>
		<td><?php echo h($container['Container']['container_no']); ?>&nbsp;</td>
		<td><?php echo h($container['Container']['seal_no']); ?>&nbsp;</td>
		<td><?php echo h($container['Container']['empty_tare_wt']); ?>&nbsp;</td>
		<td><?php echo h($container['Container']['type']); ?>&nbsp;</td>
		<td><?php echo h($container['Container']['vp_ctn']); ?>&nbsp;</td>
		<td><?php echo h($container['Container']['status']); ?>&nbsp;</td>
		<td><?php echo h($container['Container']['created']); ?>&nbsp;</td>
		<td><?php echo h($container['Container']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($container['User']['id'], array('controller' => 'users', 'action' => 'view', $container['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $container['Container']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $container['Container']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $container['Container']['id']), array(), __('Are you sure you want to delete # %s?', $container['Container']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Container'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>