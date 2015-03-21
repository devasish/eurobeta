<div class="users form">
<h2><?php echo __('Edit User'); ?></h2>    
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<!--<legend><?php echo __('Edit User'); ?></legend>-->
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('role', array('options' => Configure::read('ROLES')));
		echo $this->Form->input('status', array('options' => Configure::read('STATUS')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">	
	<ul>

		<li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>'.'&nbsp;&nbsp;'. __('Delete User'), array('action' => 'delete', $this->Form->value('User.id')), array('escape'=>FALSE), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link('<i class="fa fa-list"></i>'.'&nbsp;&nbsp;'. __('Users List'), array('action' => 'index'), array('escape'=>FALSE)); ?></li>
                <li><?php echo $this->Html->link('<i class="fa fa-edit"></i>'.'&nbsp;&nbsp;'. __('Edit User'), array('action' => 'edit', $this->Form->value('User.id')), array('escape'=>FALSE)); ?> </li>
                <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>'.'&nbsp;&nbsp;'. __('New User'), array('action' => 'add'), array('escape'=>FALSE)); ?></li>
	</ul>
</div>


