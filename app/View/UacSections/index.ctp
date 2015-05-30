<div class="uacSections index">
	<h2><?php echo __('Uac Sections'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('uac_module_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($uacSections as $uacSection): ?>
	<tr>
		<td><?php echo h($uacSection['UacSection']['id']); ?>&nbsp;</td>
		<td><?php echo h($uacSection['UacSection']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($uacSection['UacModule']['name'], array('controller' => 'uac_modules', 'action' => 'view', $uacSection['UacModule']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $uacSection['UacSection']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $uacSection['UacSection']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $uacSection['UacSection']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $uacSection['UacSection']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Uac Section'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Uac Modules'), array('controller' => 'uac_modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Module'), array('controller' => 'uac_modules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uac Permissions'), array('controller' => 'uac_permissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Permission'), array('controller' => 'uac_permissions', 'action' => 'add')); ?> </li>
	</ul>
</div>
