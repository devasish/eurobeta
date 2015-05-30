<div class="uacSections view">
<h2><?php echo __('Uac Section'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($uacSection['UacSection']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($uacSection['UacSection']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uac Module'); ?></dt>
		<dd>
			<?php echo $this->Html->link($uacSection['UacModule']['name'], array('controller' => 'uac_modules', 'action' => 'view', $uacSection['UacModule']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Uac Section'), array('action' => 'edit', $uacSection['UacSection']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Uac Section'), array('action' => 'delete', $uacSection['UacSection']['id']), array(), __('Are you sure you want to delete # %s?', $uacSection['UacSection']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Uac Sections'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Section'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uac Modules'), array('controller' => 'uac_modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Module'), array('controller' => 'uac_modules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uac Permissions'), array('controller' => 'uac_permissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Permission'), array('controller' => 'uac_permissions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Uac Permissions'); ?></h3>
	<?php if (!empty($uacSection['UacPermission'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Uac Section Id'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Permitted'); ?></th>
		<th><?php echo __('Remarks'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($uacSection['UacPermission'] as $uacPermission): ?>
		<tr>
			<td><?php echo $uacPermission['id']; ?></td>
			<td><?php echo $uacPermission['uac_section_id']; ?></td>
			<td><?php echo $uacPermission['role']; ?></td>
			<td><?php echo $uacPermission['permitted']; ?></td>
			<td><?php echo $uacPermission['remarks']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'uac_permissions', 'action' => 'view', $uacPermission['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'uac_permissions', 'action' => 'edit', $uacPermission['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'uac_permissions', 'action' => 'delete', $uacPermission['id']), array(), __('Are you sure you want to delete # %s?', $uacPermission['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Uac Permission'), array('controller' => 'uac_permissions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
