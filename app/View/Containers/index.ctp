<div class="containers index">
	<h2><?php echo __('Containers'); ?></h2>
        <div class="filters">
            <ul>
            <li><?php $url = array('controller' => 'Containers', 'action' => 'index'); ?></li>
            <li><?php echo $this->Form->create('Filter', array('url' => $url)); ?></li>
            <li><?php echo $this->Form->input('value', array('class' => 'date', 'label' => false, 'placeholder' => 'Search')); ?></li>
            <li><?php echo $this->Form->input('field', array('options' => array('id' => 'ID', 'container_no' => 'Container No', 'seal_no' => 'Seal No', 'type' => 'Type', 'status' => 'Status'),  'label' => false)); ?></li>
            <li><?php echo $this->Form->end('Filter'); ?></li>
            </ul>    
        </div>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('container_no'); ?></th>
			<th><?php echo $this->Paginator->sort('seal_no'); ?></th>
			<th><?php echo $this->Paginator->sort('empty_tare_wt'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('Container_type'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('modified'); ?></th>-->
			<!--<th><?php echo $this->Paginator->sort('user_id'); ?></th>-->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($containers as $container): ?>
	<tr>
		<td><?php echo h($container['Container']['id']); ?>&nbsp;</td>
		<td><?php echo h($container['Container']['container_no']); ?>&nbsp;</td>
		<td><?php echo h($container['Container']['seal_no']); ?>&nbsp;</td>
		<td><?php echo h($container['Container']['empty_tare_wt']); ?>&nbsp;</td>
                <td><?php
                foreach(Configure::read('CONT_TYPES') as $k => $v){
                        if($k == $container['Container']['type']) {
                            echo h($v);
                        }
                    }             
                ?>&nbsp;</td>
		<td><?php
                    foreach(Configure::read('CONT_VP_CTN') as $k => $v){
                        if($k == $container['Container']['vp_ctn']) {
                            echo h($v);
                        }
                    }
                ?>&nbsp;</td>
		<td><?php
                    foreach(Configure::read('CONT_STATUS') as $k => $v){
                        if($k == $container['Container']['status']) {
                            echo h($v);
                        }
                    }
                ?>&nbsp;</td>
		<td><?php echo h($container['Container']['created']); ?>&nbsp;</td>
		<!--<td><?php echo h($container['Container']['modified']); ?>&nbsp;</td>-->
<!--		<td>
			<?php echo $this->Html->link($container['User']['id'], array('controller' => 'users', 'action' => 'view', $container['User']['id'])); ?>
		</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $container['Container']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $container['Container']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $container['Container']['id']), array(), __('Are you sure you want to delete # %s?', $container['Container']['id'])); ?>
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
		<li><?php echo $this->Html->link('<i class="fa fa-plus"></i>'.'&nbsp;&nbsp;'. __('New Container'), array('action' => 'add'), array('escape'=>FALSE)); ?></li>
	</ul>
</div>
