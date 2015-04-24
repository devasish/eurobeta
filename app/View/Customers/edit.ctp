<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>' . '&nbsp;&nbsp;' . __('Delete Customer'), array('action' => 'delete', $this->Form->value('Customer.id')), array('escape'=>FALSE), __('Are you sure you want to delete # %s?', $this->Form->value('Customer.id'))); ?></li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('List of Customers'), array('action' => 'index'), array('escape'=>FALSE)); ?></li>        
    </ol>
</div><!--/.row-->
<br/><br/>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('Edit Sap'); ?>                         
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <?php echo $this->Form->create('Customer'); ?>
                    <?php echo $this->Form->input('id'); ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
                    </div>                            
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>