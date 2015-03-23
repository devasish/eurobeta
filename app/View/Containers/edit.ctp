<div class="containers form">
<?php echo $this->Form->create('Container'); ?>
	<fieldset>
		<legend><?php echo __('Edit Container'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('container_no');
		echo $this->Form->input('seal_no');
		echo $this->Form->input('empty_tare_wt');
		echo $this->Form->input('type', array('options' => Configure::read('CONT_TYPES')));
		echo $this->Form->input('vp_ctn', array('options' => Configure::read('CONT_VP_CTN')));
		echo $this->Form->input('status', array('options' => Configure::read('CONT_STATUS'), 'empty' => true));
//		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>'.'&nbsp;&nbsp;'. __('Delete Container'), array('action' => 'delete', $this->Form->value('Container.id')), array('escape' => FALSE), __('Are you sure you want to delete # %s?', $this->Form->value('Container.id'))); ?></li>
		<li><?php echo $this->Html->link('<i class="fa fa-list"></i>'.'&nbsp;&nbsp;'. __('Containers List'), array('action' => 'index'), array('escape'=>FALSE)); ?></li>
                <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>'.'&nbsp;&nbsp;'. __('New Container'), array('action' => 'add'), array('escape'=>FALSE)); ?></li>
	</ul>
</div>
