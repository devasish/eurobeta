<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>' . '&nbsp;&nbsp;' . __('Delete'), array('action' => 'delete', $this->Form->value('UacModule.id')), array('escape' => FALSE), __('Are you sure you want to delete # %s?', $this->Form->value('UacModule.id'))); ?></li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('List Uac Modules'), array('action' => 'index'), array('escape' => FALSE)); ?></li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('List Uac Permissions'), array('controller' => 'uac_permissions', 'action' => 'index'), array('escape' => FALSE)); ?> </li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>' . '&nbsp;&nbsp;' . __('New Uac Permission'), array('controller' => 'uac_permissions', 'action' => 'add'), array('escape' => FALSE)); ?> </li>
    </ol>
</div><!--/.row-->
<br/><br/>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('Edit Uac Module'); ?>                         
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <?php echo $this->Form->create('UacModule'); ?>
                    <?php echo $this->Form->input('id'); ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('controller', array('class' => 'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('action', array('class' => 'form-control')); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('Edit Uac Permissions'); ?>                         
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="form-group check-label">
                        <?php
                        $roles = Configure::read('ROLES');
                        $c = 0;
                        foreach ($roles as $role_id => $role_name) {
                            echo $this->Form->input('UacPermission.' . $c . '.role', array('value' => $role_id, 'div' => FALSE, 'type' => 'hidden'));
                            echo $this->Form->input('UacPermission.' . $c . '.permitted', array('type' => 'checkbox', 'div' => FALSE, 'label' => $role_name));
                            echo $this->Form->input('UacPermission.' . $c . '.id', array('type' => 'hidden', 'div' => FALSE));
                            $c++;
                            echo '<br/>';
                        }
                        ?>
                    </div>                            
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
