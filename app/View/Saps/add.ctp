<div class="row">
    <ol class="breadcrumb action-link">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><?php echo $this->Html->link('<i class="fa fa-list"></i>'.'&nbsp;&nbsp;'. __('List Saps'), array('action' => 'index'), array('escape'=>FALSE)); ?></li>
    </ol>
</div><!--/.row-->
<br/><br/>
<div class="row">
    <div class="col-lg-12">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo __('Create New Sap'); ?>                         
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <?php echo $this->Form->create('Sap'); ?>
                            <div class="form-group">
                                <?php echo $this->Form->input('sapcode', array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('description', array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('net_wt', array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('gross_wt', array('value' => 0, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('empty_ctn_wt', array('value' => 0, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('cbm', array('value' => 0, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('ctn_per_pallet', array('value' => 0, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('status', array('options' => Configure::read('STATUS'), 'empty'=>TRUE, 'class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('customer_id', array('class'=>'form-control', 'type'=>'hidden')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('customer_name', array('class'=>'form-control', 'type'=>'text')); ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
            </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#SapCustomerName').autocomplete({
            source : SITE_URL + 'customers/prediction',
            select : function (event, ui) {
                $('#SapCustomerId').val(ui.item.id);
                console.log(ui);
            }
        });
    })
</script>