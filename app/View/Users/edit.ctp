<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>' . '&nbsp;&nbsp;' . __('Delete User'), array('action' => 'delete', $this->Form->value('User.id')), array('escape' => FALSE), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('Users List'), array('action' => 'index'), array('escape' => FALSE)); ?></li>
        <li><?php echo $this->Html->link('<i class="fa fa-edit"></i>' . '&nbsp;&nbsp;' . __('Edit User'), array('action' => 'edit', $this->Form->value('User.id')), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>' . '&nbsp;&nbsp;' . __('New User'), array('action' => 'add'), array('escape' => FALSE)); ?></li>
    </ol>
</div><!--/.row-->
<br/><br/>
<div class="row">
    <div class="col-lg-12">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo __('Edit User'); ?>                         
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <?php echo $this->Form->create('User'); ?>
                            <?php echo $this->Form->input('id'); ?>
                            <div class="form-group">
                                <?php echo $this->Form->input('username', array('class'=>'form-control')); ?>
                            </div>                            
                            <div class="form-group">
                                <?php echo $this->Form->input('role', array('options' => Configure::read('ROLES'), 'empty'=>true, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('status', array('options' => Configure::read('STATUS'), 'empty'=>true, 'class'=>'form-control')); ?>
                            </div>   
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
            </div>
    </div>
</div>
