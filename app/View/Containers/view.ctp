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
		<dt><?php echo __('Empty Tare WT'); ?></dt>
		<dd>
			<?php echo h($container['Container']['empty_tare_wt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
                    <?php
                    foreach(Configure::read('CONT_TYPES') as $k => $v){
                        if($k == $container['Container']['type']) {
                            echo h($v);
                        }
                    }
                    ?>
                &nbsp;
		</dd>
		<dt><?php echo __('Container Type'); ?></dt>
		<dd>
                    <?php
                    foreach(Configure::read('CONT_VP_CTN') as $k => $v){
                        if($k == $container['Container']['vp_ctn']) {
                            echo h($v);
                        }
                    }
                    ?>
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
                    <?php
                    foreach(Configure::read('CONT_STATUS') as $k => $v){
                        if($k == $container['Container']['status']) {
                            echo h($v);
                        }
                    }
                    ?>
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
		<li><?php echo $this->Html->link('<i class="fa fa-edit"></i>'.'&nbsp;&nbsp;'. __('Edit Container'), array('action' => 'edit', $container['Container']['id']), array('escape' => FALSE)); ?> </li>
		<li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>'.'&nbsp;&nbsp;'. __('Delete Container'), array('action' => 'delete', $container['Container']['id']), array('escape' => FALSE), __('Are you sure you want to delete # %s?', $container['Container']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list"></i>'.'&nbsp;&nbsp;'. __('Containers List'), array('action' => 'index'), array('escape'=>FALSE)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus"></i>'.'&nbsp;&nbsp;'. __('New Container'), array('action' => 'add'), array('escape'=>FALSE)); ?> </li>
	</ul>
</div>
