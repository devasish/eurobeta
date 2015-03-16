<div class="transfers view">
<h2><?php echo __('Transfer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sap'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transfer['Sap']['id'], array('controller' => 'saps', 'action' => 'view', $transfer['Sap']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sap Code'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['sap_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ctn Per Pallet'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['ctn_per_pallet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Net Wt'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['net_wt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remarks'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['remarks']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Serial No'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['serial_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transfer['User']['id'], array('controller' => 'users', 'action' => 'view', $transfer['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transfer'), array('action' => 'edit', $transfer['Transfer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transfer'), array('action' => 'delete', $transfer['Transfer']['id']), array(), __('Are you sure you want to delete # %s?', $transfer['Transfer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transfers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saps'), array('controller' => 'saps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sap'), array('controller' => 'saps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>