<div class="perms view">
<h2><?php echo __('Perm'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($perm['Perm']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($perm['Perm']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controller'); ?></dt>
		<dd>
			<?php echo h($perm['Perm']['controller']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($perm['Perm']['action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Permitted'); ?></dt>
		<dd>
			<?php echo h($perm['Perm']['permitted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Perm'), array('action' => 'edit', $perm['Perm']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Perm'), array('action' => 'delete', $perm['Perm']['id']), array(), __('Are you sure you want to delete # %s?', $perm['Perm']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Perms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Perm'), array('action' => 'add')); ?> </li>
	</ul>
</div>
