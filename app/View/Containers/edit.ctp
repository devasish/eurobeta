<div class="containers form">
<?php echo $this->Form->create('Container'); ?>
	<fieldset>
		<legend><?php echo __('Edit Container'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('container_no');
		echo $this->Form->input('seal_no');
		echo $this->Form->input('empty_tare_wt');
		echo $this->Form->input('type', array('label' => 'Type', 'options' => array('0' => '--Select--','1' => '20FT','2' => '40FT-HQ', '3' => '40FT-GB')));
		echo $this->Form->input('vp_ctn', array('label' => 'Select Ctn/VacPack', 'options' => array('0' => '--Select--','1' => 'CTN','2' => 'VacPack')));
		echo $this->Form->input('status', array('options' => array('0' => 'Open', '1' => 'In Progress', '2' => 'Closed')));
//		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Container.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Container.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Containers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
