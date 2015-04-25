<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>'.'&nbsp;&nbsp;'. __('List of Customers'), array('action' => 'index'), array('escape'=>FALSE)); ?></li>
    </ol>
</div><!--/.row-->
<br/><br/>
<div class="row">
    <div class="col-lg-12">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo __('New Customer'); ?>                         
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <?php echo $this->Form->create('Customer'); ?>
                            <div class="form-group">
                                <?php echo $this->Form->input('name', array('class'=>'form-control')); ?>
                            </div>                            
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
            </div>
    </div>
</div>

