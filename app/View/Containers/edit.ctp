<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>' . '&nbsp;&nbsp;' . __('Delete Container'), array('action' => 'delete', $this->Form->value('Container.id')), array('escape' => FALSE), __('Are you sure you want to delete # %s?', $this->Form->value('Container.id'))); ?></li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('Containers List'), array('action' => 'index'), array('escape' => FALSE)); ?></li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>' . '&nbsp;&nbsp;' . __('New Container'), array('action' => 'add'), array('escape' => FALSE)); ?></li>
    </ol>
</div><!--/.row-->
<br/><br/>
<div class="row">
    <div class="col-lg-12">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo __('Add New Container'); ?>                         
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <?php echo $this->Form->create('Container'); ?>
                            <?php echo $this->Form->input('id'); ?>
                            <div class="form-group">
                                <?php echo $this->Form->input('container_no', array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('seal_no', array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('empty_tare_wt', array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('type', array('options' => Configure::read('CONT_TYPES'), 'empty' => true, 'class'=>'form-control')); ?>
                            </div>                            
                            <div class="form-group">
                                <?php echo $this->Form->input('vp_ctn', array('options' => Configure::read('CONT_VP_CTN'), 'empty' => true, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('status', array('options' => Configure::read('CONT_STATUS'), 'empty' => true, 'class'=>'form-control')); ?>
                            </div>                            
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
            </div>
    </div>
</div>
