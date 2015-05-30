<div class="uacPermissions index">
	<h2><?php echo __('Uac Permissions'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table table-hover table-striped table-condensed">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('uac_module_id'); ?></th>
			<th><?php echo $this->Paginator->sort('role'); ?></th>
			<th><?php echo $this->Paginator->sort('permitted'); ?></th>
			<th><?php echo $this->Paginator->sort('remarks'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($uacPermissions as $uacPermission): ?>
	<tr>
		<td><?php echo h($uacPermission['UacPermission']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($uacPermission['UacModule']['name'], array('controller' => 'uac_modules', 'action' => 'view', $uacPermission['UacModule']['id'])); ?>
		</td>
		<td>
                    <?php 
                    $roles = Configure::read('ROLES');
                    echo h($roles[$uacPermission['UacPermission']['role']]); 
                    ?>&nbsp;
                </td>
		<td><?php echo h($uacPermission['UacPermission']['permitted'] ? 'Yes' : 'No'); ?>&nbsp;</td>
		<td><?php echo h($uacPermission['UacPermission']['remarks']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $uacPermission['UacPermission']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $uacPermission['UacPermission']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $uacPermission['UacPermission']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $uacPermission['UacPermission']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Uac Permission'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Uac Modules'), array('controller' => 'uac_modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Module'), array('controller' => 'uac_modules', 'action' => 'add')); ?> </li>
	</ul>
</div>
