<div class="uacModules index">
	<h2><?php echo __('Uac Modules'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($uacModules as $uacModule): ?>
	<tr>
		<td><?php echo h($uacModule['UacModule']['id']); ?>&nbsp;</td>
		<td><?php echo h($uacModule['UacModule']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $uacModule['UacModule']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $uacModule['UacModule']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $uacModule['UacModule']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $uacModule['UacModule']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Uac Module'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Uac Sections'), array('controller' => 'uac_sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Section'), array('controller' => 'uac_sections', 'action' => 'add')); ?> </li>
	</ul>
</div>
