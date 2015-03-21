<div class="containers view">
<h2><?php echo __('Container'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($container['Container']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Container No'); ?></dt>
		<dd>
			<?php echo h($container['Container']['container_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seal No'); ?></dt>
		<dd>
			<?php echo h($container['Container']['seal_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empty Tare Wt'); ?></dt>
		<dd>
			<?php echo h($container['Container']['empty_tare_wt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($container['Container']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vp Ctn'); ?></dt>
		<dd>
			<?php echo h($container['Container']['vp_ctn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($container['Container']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($container['Container']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($container['Container']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($container['User']['id'], array('controller' => 'users', 'action' => 'view', $container['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Container'), array('action' => 'edit', $container['Container']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Container'), array('action' => 'delete', $container['Container']['id']), array(), __('Are you sure you want to delete # %s?', $container['Container']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Containers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Container'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>