<div class="uacModules view">
<h2><?php echo __('Uac Module'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($uacModule['UacModule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($uacModule['UacModule']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Uac Module'), array('action' => 'edit', $uacModule['UacModule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Uac Module'), array('action' => 'delete', $uacModule['UacModule']['id']), array(), __('Are you sure you want to delete # %s?', $uacModule['UacModule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Uac Modules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Module'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uac Sections'), array('controller' => 'uac_sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Section'), array('controller' => 'uac_sections', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Uac Sections'); ?></h3>
	<?php if (!empty($uacModule['UacSection'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Uac Module Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($uacModule['UacSection'] as $uacSection): ?>
		<tr>
			<td><?php echo $uacSection['id']; ?></td>
			<td><?php echo $uacSection['name']; ?></td>
			<td><?php echo $uacSection['uac_module_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'uac_sections', 'action' => 'view', $uacSection['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'uac_sections', 'action' => 'edit', $uacSection['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'uac_sections', 'action' => 'delete', $uacSection['id']), array(), __('Are you sure you want to delete # %s?', $uacSection['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Uac Section'), array('controller' => 'uac_sections', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
