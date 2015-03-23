<div class="users form">
    <h2><?php echo __('Add User'); ?></h2>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <!--<legend><?php echo __('Add User'); ?></legend>-->
        <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array('options' => Configure::read('ROLES'), 'empty'=>true));
        echo $this->Form->input('status', array('options' => Configure::read('STATUS'), 'empty'=>true));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>'.'&nbsp;&nbsp;'. __('Users List'), array('action' => 'index'), array('escape'=>FALSE)); ?></li>
    </ul>
</div>
