<div class="uacPermissions view">
<h2><?php echo __('Uac Permission'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($uacPermission['UacPermission']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uac Section'); ?></dt>
		<dd>
			<?php echo $this->Html->link($uacPermission['UacSection']['name'], array('controller' => 'uac_sections', 'action' => 'view', $uacPermission['UacSection']['id'])); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Uac Module'); ?></dt>
		<dd>
			<?php echo $this->Html->link($uacPermission['UacSection']['uac_module_id'], array('controller' => 'uac_sections', 'action' => 'view', $uacPermission['UacSection']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
                        <?php 
                            $conf_roles = Configure::read('ROLES');
                            $role = $conf_roles[$uacPermission['UacPermission']['role']];
                        ?>
			<?php echo $role; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Permitted'); ?></dt>
		<dd>
			<?php echo h($uacPermission['UacPermission']['permitted'] == 0 ? 'Not Permitted' : 'Permitted'); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remarks'); ?></dt>
		<dd>
			<?php echo h($uacPermission['UacPermission']['remarks']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Uac Permission'), array('action' => 'edit', $uacPermission['UacPermission']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Uac Permission'), array('action' => 'delete', $uacPermission['UacPermission']['id']), array(), __('Are you sure you want to delete # %s?', $uacPermission['UacPermission']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Uac Permissions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Permission'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uac Sections'), array('controller' => 'uac_sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uac Section'), array('controller' => 'uac_sections', 'action' => 'add')); ?> </li>
	</ul>
</div>
