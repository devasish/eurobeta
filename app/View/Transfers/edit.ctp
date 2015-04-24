<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>' . '&nbsp;&nbsp;' . __('Delete Transfer'), array('action' => 'delete', $this->Form->value('Transfer.id')), array('escape' => FALSE), __('Are you sure you want to delete # %s?', $this->Form->value('Transfer.id'))); ?></li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>' . '&nbsp;&nbsp;' . __('Transfers List'), array('action' => 'index'), array('escape' => FALSE)); ?></li>
        <li><?php echo $this->Html->link('<i class="fa fa-plus"></i>' . '&nbsp;&nbsp;' . __('New Transfer'), array('action' => 'add'), array('escape' => FALSE)); ?></li>
    </ol>
</div><!--/.row-->
<br/><br/>
<div class="row">
    <div class="col-lg-12">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo __('Make Transfer'); ?>                         
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <?php echo $this->Form->create('Transfer'); ?>
                            <?php echo $this->Form->input('id'); ?>
                            <div class="form-group">
                                <?php echo $this->Form->input('sap_id', array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('sap_code', array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('description', array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('ctn_per_pallet', array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('net_wt', array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <label>Transfer Date</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?php echo $this->Form->input('transfer_date', array('class'=>'form-control pull-right', 'id'=>'transferDate', 'type'=>'text', 'label'=>FALSE)); ?>  
                                </div><!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('remarks', array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('serial_no', array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('status', array('options'=> Configure::read('STATUS'),'class'=>'form-control')); ?>
                            </div> 
                            <div class="form-group">
                                <?php echo $this->Form->input('user_id', array('class'=>'form-control')); ?>
                            </div> 
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
            </div>
    </div>
</div>