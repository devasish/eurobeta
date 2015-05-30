<div class="uacModules form">
    <?php echo $this->Form->create('UacModule'); ?>
    <fieldset>
        <legend><?php echo __('Edit Uac Module'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('controller');
        echo $this->Form->input('action');
        ?>
    </fieldset>
    <fieldset>
        <legend><?php echo __('Uac Permissions'); ?></legend>
        <?php
        $roles = Configure::read('ROLES');
        $c = 0;
        foreach ($roles as $role_id => $role_name) {
            echo $this->Form->input('UacPermission.'. $c .'.role', array('value' => $role_id, 'div' => FALSE, 'type' => 'hidden'));
            echo $this->Form->input('UacPermission.'. $c .'.permitted', array('type' => 'checkbox', 'div' => FALSE, 'label' => $role_name));
             echo $this->Form->input('UacPermission.'. $c .'.id', array('type' => 'hidden', 'div' => FALSE));
            $c++;
            echo '<br/>';
        }
        ?>
    </fieldset>

    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UacModule.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('UacModule.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Uac Modules'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Uac Permissions'), array('controller' => 'uac_permissions', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Uac Permission'), array('controller' => 'uac_permissions', 'action' => 'add')); ?> </li>
    </ul>
</div>
