<div class="palletChecklists view">
<h2><?php echo __('Pallet Checklist'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($palletChecklist['PalletChecklist']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Container'); ?></dt>
		<dd>
			<?php echo $this->Html->link($palletChecklist['Container']['id'], array('controller' => 'containers', 'action' => 'view', $palletChecklist['Container']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sap'); ?></dt>
		<dd>
			<?php echo $this->Html->link($palletChecklist['Sap']['id'], array('controller' => 'saps', 'action' => 'view', $palletChecklist['Sap']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sap Code'); ?></dt>
		<dd>
			<?php echo h($palletChecklist['PalletChecklist']['sap_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sap Desc'); ?></dt>
		<dd>
			<?php echo h($palletChecklist['PalletChecklist']['sap_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Cust Wt'); ?></dt>
		<dd>
			<?php echo h($palletChecklist['PalletChecklist']['product_cust_wt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Of Pallet'); ?></dt>
		<dd>
			<?php echo h($palletChecklist['PalletChecklist']['no_of_pallet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empty Pallet Wt'); ?></dt>
		<dd>
			<?php echo h($palletChecklist['PalletChecklist']['empty_pallet_wt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empty Ctn Wt'); ?></dt>
		<dd>
			<?php echo h($palletChecklist['PalletChecklist']['empty_ctn_wt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Net Product Wt'); ?></dt>
		<dd>
			<?php echo h($palletChecklist['PalletChecklist']['net_product_wt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Net Wt Per Ctn'); ?></dt>
		<dd>
			<?php echo h($palletChecklist['PalletChecklist']['net_wt_per_ctn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gross Wt Per Ctn'); ?></dt>
		<dd>
			<?php echo h($palletChecklist['PalletChecklist']['gross_wt_per_ctn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diff'); ?></dt>
		<dd>
			<?php echo h($palletChecklist['PalletChecklist']['diff']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($palletChecklist['PalletChecklist']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($palletChecklist['User']['id'], array('controller' => 'users', 'action' => 'view', $palletChecklist['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pallet Checklist'), array('action' => 'edit', $palletChecklist['PalletChecklist']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pallet Checklist'), array('action' => 'delete', $palletChecklist['PalletChecklist']['id']), array(), __('Are you sure you want to delete # %s?', $palletChecklist['PalletChecklist']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pallet Checklists'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pallet Checklist'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Containers'), array('controller' => 'containers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Container'), array('controller' => 'containers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saps'), array('controller' => 'saps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sap'), array('controller' => 'saps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pallet Loads'), array('controller' => 'pallet_loads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pallet Load'), array('controller' => 'pallet_loads', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Pallet Loads'); ?></h3>
	<?php if (!empty($palletChecklist['PalletLoad'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Pallet Checklist Id'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Wt With Pallet'); ?></th>
		<th><?php echo __('Wt Per Ctn'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($palletChecklist['PalletLoad'] as $palletLoad): ?>
		<tr>
			<td><?php echo $palletLoad['id']; ?></td>
			<td><?php echo $palletLoad['pallet_checklist_id']; ?></td>
			<td><?php echo $palletLoad['quantity']; ?></td>
			<td><?php echo $palletLoad['wt_with_pallet']; ?></td>
			<td><?php echo $palletLoad['wt_per_ctn']; ?></td>
			<td><?php echo $palletLoad['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pallet_loads', 'action' => 'view', $palletLoad['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pallet_loads', 'action' => 'edit', $palletLoad['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pallet_loads', 'action' => 'delete', $palletLoad['id']), array(), __('Are you sure you want to delete # %s?', $palletLoad['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pallet Load'), array('controller' => 'pallet_loads', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
