<div class="transfers index">
	<h2><?php echo __('Transfers'); ?></h2>
        <div class="filters">
            <ul> 
                <li><?php $url = array('controller' => 'Transfers', 'action' => 'index'); ?></li>
                <li><?php echo $this->Form->create('Filter', array('url' => $url)); ?></li>
                <li><?php echo $this->Form->input('value', array('class' => 'date', 'label' => false, 'placeholder' => 'Search')); ?></li>
                <li><?php echo $this->Form->input('field', array('options' => array('id' => 'ID','sap_code' => 'Sapcode', 'description' => 'Description', 'sap_id' => 'Sap ID', 'serial_no' => 'Serial No'),  'label' => false)); ?></li>
                <li><?php echo $this->Form->input('created_by', array('empty' => 'All Users',  'label' => false, 'options' => $users)); ?></li>
                <li><?php echo $this->Form->end('Filter'); ?></li>
            </ul>
        </div>  
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('serial_no'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('sap_id'); ?></th>-->
			<th><?php echo $this->Paginator->sort('sap_code'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('ctn_per_pallet'); ?></th>
			<th><?php echo $this->Paginator->sort('net_wt'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('remarks'); ?></th>-->
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('modified'); ?></th>-->
			<!--<th><?php echo $this->Paginator->sort('status'); ?></th>-->
			<th><?php echo 'Created By'; ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transfers as $transfer): ?>
	<tr>
		<td><?php echo h($transfer['Transfer']['id']); ?>&nbsp;</td>
                <td><?php echo h($transfer['Transfer']['serial_no']); ?>&nbsp;</td>
<!--		<td>
			<?php echo $this->Html->link($transfer['Sap']['id'], array('controller' => 'saps', 'action' => 'view', $transfer['Sap']['id'])); ?>
		</td>-->
		<td><?php echo h($transfer['Transfer']['sap_code']); ?>&nbsp;</td>
		<td><?php echo h($transfer['Transfer']['description']); ?>&nbsp;</td>
		<td><?php echo h($transfer['Transfer']['ctn_per_pallet']); ?>&nbsp;</td>
		<td><?php echo h($transfer['Transfer']['net_wt']); ?>&nbsp;</td>
		<!--<td><?php echo h($transfer['Transfer']['remarks']); ?>&nbsp;</td>-->
		<td><?php echo h($transfer['Transfer']['created']); ?>&nbsp;</td>
		<!--<td><?php echo h($transfer['Transfer']['modified']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($transfer['Transfer']['status']); ?>&nbsp;</td>-->
		<td>
			<?php echo $this->Html->link($transfer['User']['username'], array('controller' => 'users', 'action' => 'view', $transfer['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transfer['Transfer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transfer['Transfer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transfer['Transfer']['id']), array(), __('Are you sure you want to delete # %s?', $transfer['Transfer']['id'])); ?>
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
		<li><?php echo $this->Html->link('<i class="fa fa-plus"></i>'.'&nbsp;&nbsp;'. __('New Transfer'), array('action' => 'add'), array('escape'=> FALSE)); ?></li>
	</ul>
</div>
