<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>' . '&nbsp;&nbsp;' . __('Delete'), array('action' => 'delete', $this->Form->value('Loader.id')), array('escape' => FALSE), __('Are you sure you want to delete # %s?', $this->Form->value('Loader.id'))); ?></li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('List Loaders'), array('action' => 'index'), array('escape' => FALSE)); ?></li>
    </ol>
</div><!--/.row-->
<br/><br/>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('Edit Loader'); ?>                         
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <?php echo $this->Form->create('Loader'); ?>
                    <?php echo $this->Form->input('id'); ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('loader_name', array('class' => 'form-control')); ?>
                    </div>                            
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>